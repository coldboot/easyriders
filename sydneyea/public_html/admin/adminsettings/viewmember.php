<?php include('header.php');

	$SortBy	= $_REQUEST['sortby'];
	$filterpaid=$_REQUEST['filterpaid'];
	$filteraccept=$_REQUEST['filteraccept'];
	$whereclause="";

	if(($SortBy == "") || ($SortBy == "all"))
	{
		$SortList = "";
	}
	else
	{
		$SortList = $SortBy;
	}
	if ($filterpaid == "yes" || $filterpaid == "no")
	{
		$whereclause .= " AND `varPaid` = '$filterpaid'";
	}
	if ($filteraccept == "yes" || $filteraccept == "no")
	{
		$whereclause .= " AND `varAcceptTerms` = '$filteraccept'";
	}


    $flag=$_REQUEST['flag'];
    $memberid=$_REQUEST['memberid'];

	#For Display the Result
	$rflag	=	$_GET['rflag'];
	$rType	=	$_GET['rtype'];
	$Update_Member = "";
	if($flag == "paid")
	{
		$paiddate = date('Y-m-d');
		$Update_Member	=	"UPDATE ".MEMBER." SET `varPaid`='yes', `varPaidDate`='$paiddate' WHERE `intmemberid`='$memberid'";
		$rflag	=	"success";
		$rType	=	"paid";
	}
	elseif($flag == "notpaid")
	{
		$paiddate = "0000-00-00";
		$Update_Member	=	"UPDATE ".MEMBER." SET `varPaid`='no', `varPaidDate`='$paiddate' WHERE `intmemberid`='$memberid'";
		$rflag	=	"success";
		$rType	=	"notpaid";
	}
	elseif($flag == "delete")
	{
		$Update_Member	=	"DELETE FROM ".MEMBER." WHERE `intmemberid`='$memberid'";
		$rflag	=	"success";
		$rType	=	"delete";
	}
	if ($Update_Member != "")
	{
		$Result_Member	=	mysql_query($Update_Member);
		if (!$Result_Member)
		{
			$rflag	=	"fail";
			$rDisp = 'Invalid query: ' . mysql_error() . '\n';
			$rDisp .= 'Whole query: ' . $Update_Member;
		}
	}

 	// $pagqry="SELECT * FROM ".MEMBER." WHERE `varFirstname` LIKE '$SortList%' ";
 	$pagqry="SELECT * FROM ".MEMBER." WHERE `varFirstname` LIKE '$SortList%' $whereclause order by intmemberid DESC";


	$R_Check	= mysql_query($pagqry) or die(mysql_error());
	$C_Check	= mysql_num_rows($R_Check);
	$total		= mysql_num_rows($R_Check);

	 $page = $_GET['page'];
	 $limit = $Fetch['intRows'];
//$limit = 2;

	$pager  = getPagerData($total, $limit, $page);
	$offset = $pager->offset;
	$limit  = $pager->limit;
	$limit  = $total;
	$page   = $pager->page;

 	// $limqry		= "SELECT * FROM ".MEMBER." WHERE `varFirstname` LIKE '$SortList%' order by intmemberid DESC  limit $offset,$limit ";
 	$limqry     = "SELECT * FROM ".MEMBER." WHERE `varFirstname` LIKE '$SortList%' $whereclause order by intmemberid DESC  limit $offset,$limit ";
	$R_Check1	= mysql_query($limqry);

?>
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<h3>View Member | <a href="viewmemberlist.php">View Member List</a></h3>
				</div>

			<table width="100%" >
			  <tr  align="center">
    <td colspan="8">
    	<table width="85%" cellpadding="2" cellspacing="2">
			<form name="view_cat" action="" method="POST" >
			<TR>
			  <TD width="15%" align="left" class="white"><b>Filter by First Name</b></TD>
		      <td width="3%">&nbsp;</td>
			  <td  width="14%"align="left"><input type="text" class="inputbox1" name="sortby"></td>
		      <td width="3%">&nbsp;</td>
			  <td width="7%" align="right" class="white"><b>Paid</b></td>
			  <td width="12%" ><select name="filterpaid">
				<option value="all" <?php if ($filterpaid == "all") { echo 'selected="selected"'; } ?> >all</option>
				<option value="no" <?php if ($filterpaid == "no") { echo 'selected="selected"'; } ?> >no</option>
				<option value="yes" <?php if ($filterpaid == "yes") { echo 'selected="selected"'; } ?> >yes</option>
				</select>
			  </td>
			  <td width="12%" align="right" class="white"><b>Accepted Terms</b></td>
			  <td width="12%" ><select name="filteraccept">
				<option value="all" <?php if ($filteraccept == "all") { echo 'selected="selected"'; } ?> >all</option>
				<option value="no" <?php if ($filteraccept == "no") { echo 'selected="selected"'; } ?> >no</option>
				<option value="yes" <?php if ($filteraccept == "yes") { echo 'selected="selected"'; } ?> >yes</option>
				</select>
			  </td>
			<td width="12%"><input type="submit" value="filter" name="submit" class="btn ui-state-default ui-corner-all">	</td>
			<td width="10%"><?php echo "Count = $total"; ?> </td>
		  </TR>
		  <tr>
			<td colspan="10">&nbsp;</td>
		  </tr>
		  </form>
		</table>
	</td>
  </tr>

  <tr>
           <td colspan="8" align="center">
					   <?php
						echo "<a class=\"leftlinks\" href=\"viewmember.php?sortby=all\">All</a>";?>
									  &nbsp;&nbsp;&nbsp;
									  <?php 		for($ASCII = 65; $ASCII <= 90 ; $ASCII++)
						{
						  echo "<a class=\"leftlinks\" href=\"viewmember.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";
						}
					 ?>		 	</td>
  </tr>

  <tr><td>&nbsp;</td></tr>
  	  <?php
  	# Display the Result(Status)
  	if($rflag == "success")
  	{
		if($rType == "add")
			$rDisp	=	"User Details Successfully Added";
		elseif($rType == "paid")
			$rDisp	=	"User Marked as Paid";
		elseif($rType == "notpaid")
			$rDisp	=	"User Marked as Not Paid";
		elseif($rType == "delete")
			$rDisp	=	"User Details Deleted Successfully";
		elseif($rType == "update")
			$rDisp	=	"User Details Updated Successfully";
	}
  	echo "<tr>";
	echo "<td colspan=\"7\" align=\"center\" class=\"information\">";
	if($rflag == "fail")
	{
		echo "<div class=\"response-msg error ui-corner-all\">";
	} else
	{
		echo "<div class=\"response-msg success ui-corner-all\">";
	}
	echo $rDisp;
	echo"</div></td>";
  	echo "</tr>";
  ?>
  </table>


						<div class="hastable">

					<form name="myform" class="" method="post" action="">




						<table>
						<thead>


					<? if ($total== 0)
					 {
                    echo('<tr><td colspan="12" align="center"><center><span class = "red">Member List Not Found!</span><center></td></tr>');
                    }
                     else
                     {
                    echo ('
                     <tr>
							<th width="34" align="right">Id</th>
						    <th width="100" align="left">First Name</th>
						    <th width="100" align="left">Last Name</th>
						    <th width="100" align="left">Ride Name</th>
							<th width="30" align="left">Status</th>
							<th width="30" align="left">Accepted?</th>
							<th width="50" align="left">Insurance</th>
							<th width="30" align="center">View</th>
						    <th width="30" align="center">Edit</th>
						    <th width="30" align="center">Delete</th>
							<th width="30" align="left">Paid?</th>
				    </tr> ');

                           }
                    ?>




						</thead>
						<tbody>
				<?php
				if($total!="")
				{
					$i=$offset ;
					while($fetch_cat = mysql_fetch_array($R_Check1)){
											  $i++;

					?>
						<tr>
							<td align="center"><center><?php echo $fetch_cat['intmemberid'];?></center></td>
						    <td align="left"><?php echo $fetch_cat['varFirstname'];?></td>
						    <td align="left"><?php echo $fetch_cat['varLastname'];?></td>
						    <td align="left"><?php echo $fetch_cat['varRidename'];?></td>
						    <td align="left"><?php echo $fetch_cat['varStatus'];?></td>
						    <td align="left"><?php echo $fetch_cat['varAcceptTerms'];?></td>
						    <td align="left"><?php echo $fetch_cat['varInsurance'];?></td>
							<td align="center"><a href="viewmemberhistory.php?memberid=<?php echo $fetch_cat['intmemberid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="View More Information"><span class="ui-icon ui-icon-folder-open"></span></a></td>
							<td align="center"><a href="addmember.php?memberid=<?php echo $fetch_cat['intmemberid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit This Member" ><span class="ui-icon ui-icon-pencil"></span></a></td>
						    <td align="center"><a href="viewmember.php?flag=delete&amp;memberid=<?php echo $fetch_cat['intmemberid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip"  title="Delete"><span class="ui-icon ui-icon-circle-close" onClick="return calldel('Do You Want To Delete This Member?');"></span></a></td>

						    <td align="center">
								<?php if($fetch_cat['varPaid'] == "yes") { ?>
									<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Mark Not Paid" href="viewmember.php?flag=notpaid&amp;memberid=<?php echo $fetch_cat['intmemberid'];?>">
									<span class="ui-icon ui-icon-check"></span></a>
								<?php } else { ?>
									<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Mark Paid" href="viewmember.php?flag=paid&amp;memberid=<?php echo $fetch_cat['intmemberid'];?>">
									<span class="ui-icon ui-icon-close"></span></a>
								<?php } ?>
							</td>

					      </tr>
						  <?php
						  }
						  } ?>

						</tbody>

						</table>


<?php
					if($limit < $total)
					{
					echo'<table width="61%"  border="0" align="left" cellpadding="3" cellspacing="3">
          <tr>
            <td width="97%" align="right" class="test">';
							if ($page == 1)
							{
								echo "";
							}
							else
							{
								echo "<a href=\"viewmember.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>";
							}
							for ($i = 1; $i <= $pager->numPages; $i++)
							{
								echo " | ";
								if ($i == $pager->page)
								{
									echo "<span class='Hint1'>"."$i"."</span>";
								}
								else
								{
									echo "<a href=\"viewmember.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>";
								}
							}

							if ($i > 1)
							{
								echo " | ";
							}
							if ($page == $pager->numPages)
							{
								echo "";
							}
							else
							{
								echo "<a href=\"viewmember.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
							}
					}	echo'</td>
  </tr>
</table>';
					?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
<?php include('sidebar.php'); ?>
	</div>
	<div class="clearfix"></div>
<?php include('footer.php'); ?>
</body>
</html>

<script language="javascript" type="text/javascript">
function calldel(m)
{
  if(!confirm(m))
  {
    return false;
  }
  else
  return true;
}
function calldelno(m)
{

  if(alert(m))
  {
    return false;
  }
 return false;
}
</script>
<script type="text/javascript">
var xmlHttp

function ajaxfeature2(str1,str2)
{
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
  alert ("Your browser does not support AJAX!");
  return;
}

var url="ajaxfeature2.php";
url=url+"?proid="+str1;
url=url+"&check="+str2;
xmlHttp.onreadystatechange=featurechanged;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function featurechanged()
{
if (xmlHttp.readyState==4)
{
	var result=xmlHttp.responseText;
	alert(result);
}
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {  alert ("Your browser does not support AJAX!");

  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}</script>

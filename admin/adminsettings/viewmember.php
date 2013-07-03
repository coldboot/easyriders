<?php include('header.php'); 
	$SortBy	= $_REQUEST['sortby'];
     $rflag=$_REQUEST['rflag'];	
	$rtype=$_REQUEST['rtype'];	

	if(($SortBy == "") || ($SortBy == "all")) { echo $SortList = ""; } else { $SortList = $SortBy; }


    $flag=$_REQUEST['flag'];
    $memberid=$_REQUEST['memberid'];
  	
	#For Display the Result
	$rflag	=	$_GET['rflag'];	
	$rType	=	$_GET['rtype'];	
	
	if($flag == "active")
	{
		 $Update_Member	=	"UPDATE ".MEMBER." SET `varStatus`='Active' WHERE `intmemberid`='$memberid'";
		$Result_Member	=	mysql_query($Update_Member);
		$rflag	=	"success";
		$rType	=	"active";
	}
	elseif($flag == "deactive")
	{
	
		$Update_Member	=	"UPDATE ".MEMBER." SET `varStatus`='DeActive' WHERE `intmemberid`='$memberid'";
		$Result_Member	=	mysql_query($Update_Member);
		$rflag	=	"success";
		$rType	=	"deactive";
	}
		elseif($flag == "delete")
	{
		$Delete_Member	=	"DELETE FROM ".MEMBER." WHERE `intmemberid`='$memberid'";
		$Result_Member	=	mysql_query($Delete_Member);
		$rflag	=	"success";
		$rType	=	"delete";
	}

 	$pagqry="SELECT * FROM ".MEMBER." WHERE `varFirstname` LIKE '$SortList%' ";
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

 	$limqry		= "SELECT * FROM ".MEMBER." WHERE `varFirstname` LIKE '$SortList%' order by intmemberid DESC  limit $offset,$limit ";
	$R_Check1	= mysql_query($limqry);

?>
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<h3>View Member | <a href="viewmemberlist.php">View Member List</a></h3>
				</div>
	  
			<table width="548">	
			  <tr  align="center"> 
    <td width="504" colspan="8"><table width="85%" cellpadding="2" cellspacing="2">
	<form name="view_cat" action="" method="POST" >
	<TR>
	<TD width="39%" align="right" class="white">
	 <b>Search by Name</b></TD>
	<td width="2%">&nbsp;	</td>
	<td align="left" width="16%">
		<input type="text" class="inputbox1" name="sortby">	</td>
		<td width="43%">	<input type="submit" value="search" name="submit" class="btn ui-state-default ui-corner-all">	</td>
	</TR>
	<tr>
	<td>&nbsp;</td>
	
	</tr>
	</form>
	</table></td>
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
	  elseif($rType == "active")
	  	$rDisp	=	"User Details Successfully Actived";
	  elseif($rType == "deactive")
	  	$rDisp	=	"User Details Successfully De-Actived";
		 elseif($rType == "delete") 
	  	$rDisp	=	"User Details Deleted Successfully";
	  elseif($rType == "update")
	  	$rDisp	=	"User Details Updated Successfully";
	  echo "<tr>";
		echo "<td colspan=\"7\" align=\"center\" class=\"information\">"; if($rType == "delete") { 
		echo "<div class=\"response-msg error ui-corner-all\">"; }else { 
		echo "<div class=\"response-msg success ui-corner-all\">"; }echo $rDisp;
		echo"</div></td>";
	  echo "</tr>";
  }  
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
							<th width="30" align="left">Accepted</th> 
							<th width="30" align="left">Paid</th> 
							<th width="50" align="left">Insurance</th> 
							<th width="30" align="center">View</th> 
						    <th width="30" align="center">Action</th> 
						    <th width="30" align="center">Edit</th> 
						    <th width="30" align="center">Delete</th>
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
						    <td align="left"><?php echo $fetch_cat['varPaid'];?></td> 
						    <td align="left"><?php echo $fetch_cat['varInsurance'];?></td> 
							<td style="padding-left:20px;"><a href="viewmemberhistory.php?memberid=<?php echo $fetch_cat['intmemberid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="View More Information"><span class="ui-icon ui-icon-folder-open"></span></a></td>
							
							    <td align="center" style="padding-left:20px;"><?php if($fetch_cat['varStatus'] == "DeActive") { ?>
								<div align="center"><a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="DeActivate" href="viewmember.php?flag=active&amp;memberid=<?php echo $fetch_cat['intmemberid'];?>&page=<?php echo $_GET['page'];?>">
								<span class="ui-icon ui-icon-locked"></span></a></div>
								<?php } else { ?>
								<div align="center">
								<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Activate" href="viewmember.php?flag=deactive&amp;memberid=<?php echo $fetch_cat['intmemberid'];?>&page=<?php echo $_GET['page'];?>">
								<span class="ui-icon ui-icon-unlocked"></span></a></div><?php } ?>
								</td> 
								
								   <td align="center" style="padding-left:20px;">
							<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit This Member" href="addmember.php?memberid=<?php echo $fetch_cat['intmemberid'];?>&page=<?php echo $_GET['page'];?>"><span class="ui-icon ui-icon-pencil"></span></a>
							
							</td> 
																
						   
							
						    <td align="center" style="padding-left:20px;">
							<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" href="viewmember.php?flag=delete&amp;memberid=<?php echo $fetch_cat['intmemberid'];?>&page=<?php echo $_GET['page'];?>" title="Delete"><span class="ui-icon ui-icon-circle-close" onClick="return calldel('Do You Want To Delete This Member?');"></span></a>
							
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

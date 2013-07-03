<?php 

     include('header.php'); 
	
	$SortBy	= $_REQUEST['sortby'];
    $rflag=$_REQUEST['rflag'];	
	$rtype=$_REQUEST['rtype'];	

	if(($SortBy == "") || ($SortBy == "all")) { echo $SortList = ""; } else { $SortList = $SortBy; }


    $flag=$_REQUEST['flag'];
    $memberid=$_REQUEST['memberid'];
  	
	#For Display the Result
	$rflag	=	$_GET['rflag'];	
	$rType	=	$_GET['rtype'];	
	
	/*if($flag == "active")
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
	}*/

 	$pagqry="SELECT * FROM `tbl_side_statistics` WHERE `date` >= (CURDATE()-INTERVAL 29 DAY)";
	/*$loginweek = $selectmem." WHERE `signupdate` >= (CURDATE()-INTERVAL 6 DAY) ";
	$loginmonth = $selectmem." WHERE `signupdate` >= (CURDATE()-INTERVAL 29 DAY) ";
	*/
	$R_Check	= mysql_query($pagqry) or die(mysql_error());
	$C_Check	= mysql_num_rows($R_Check);
	$total		= mysql_num_rows($R_Check);	
	
	 $page = $_GET['page']; 
	 $limit = $Fetch['intRows']; 
//$limit = 2; 

	$pager  = getPagerData($total, $limit, $page); 
	$offset = $pager->offset; 
	$limit  = $pager->limit; 
	$page   = $pager->page; 	

 	$limqry		= "SELECT * FROM `tbl_side_statistics` WHERE `date` >= (CURDATE()-INTERVAL 29 DAY) order by id DESC  limit $offset,$limit ";
	$R_Check1	= mysql_query($limqry);

?>
	<!--<div id="welcome" title="Welcome to Shopsteria">
<p><strong>Here admin can View the Added category names. On this page admin can able to edit,delete and change the status of the category details.</strong></p>
	</div>-->
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<a name="viewcat"></a>	<h3>Weekly User Statistics</h3>
				</div>
			
				<?php /*?>		<!--
						<?php if($total == 0) { ?>
	  <div class="response-msg error ui-corner-all">
			<span>Error message</span>
			Category List Not Found!
	  </div><?php } ?>--><?php */?>
	  
	  
			<table width="548">	
			  <tr  align="center"> 
    <td width="504" colspan="8">&nbsp;<!--<table width="85%" cellpadding="2" cellspacing="2">
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
	</table>--></td>
  </tr>
 
  <!--<tr>
           <td colspan="8" align="center">
					   <?php
						echo "<a class=\"leftlinks\" href=\"viewmember.php?sortby=all\">All</a>";?>
									  &nbsp;&nbsp;&nbsp;
									  <?php 		for($ASCII = 65; $ASCII <= 90 ; $ASCII++)
						{				
						  echo "<a class=\"leftlinks\" href=\"viewmember.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";
						}	
					 ?>		 	</td>
  </tr>-->
	
  <!--<tr><td>&nbsp;</td></tr>-->
  	 <?php /*?> <?php
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
  ?> <?php */?>
  </table>
				
						
						<div class="hastable">
											
					<form name="myform" class="" method="post" action="">
					
					
					
					
						<table> 
						<thead>
					
									
					<? if ($total== 0)
					 {
                    echo('<tr><td colspan="6" align="center"><center><span class = "red">User List Not Found!</span><center></td></tr>');
                    }
                     else
                     {
                    echo ('
                     <tr>
							<th width="34" align="center">S.No</th>
						    <th width="50" align="left">IP Address</th> 
							<th width="50" align="center">CountryCode</th> 
						    <th width="50" align="center">CountryName</th>  
						    <th width="50" align="center">RegionName</th>
							<th width="50" align="center">City</th>
							<th width="50" align="center">Latitude</th>
							<th width="50" align="center">Longitude</th>
							<th width="50" align="center">Date</th>
							</tr> ');

                           }
                    ?>
							
					
						
						 
						</thead> 
						<tbody> 
				<?php
					$i=$offset ;
					while($fetch_cat = mysql_fetch_array($R_Check1)){
											  $i++;

					?>
						<tr>
							<td align="center"><center><?php echo $i;?></center></td> 
						    <td><strong><center><?php echo $fetch_cat['ip'];?></center></strong></td> 
							<td><strong><center><?php echo $fetch_cat['CountryCode'];?></center></strong></td>
							<td><strong><center><?php echo $fetch_cat['CountryName'];?></center></strong></td>
							<!--<td><strong><center><?php echo $fetch_cat['RegionCode'];?></center></strong></td>-->
							<td><strong><center><?php echo $fetch_cat['RegionName'];?></center></strong></td>
							<td><strong><center><?php echo $fetch_cat['City'];?></center></strong></td>
							<td><strong><center><?php echo $fetch_cat['Latitude'];?></center></strong></td>
							<td><strong><center><?php echo $fetch_cat['Longitude'];?></center></strong></td>
							<!--<td><strong><center><?php echo $fetch_cat['Gmtoffset'];?></center></strong></td>-->
							<!--<td><strong><center><?php echo $fetch_cat['TimezoneName'];?></center></strong></td>-->
							<td><strong><center><?php echo $fetch_cat['date'];?></center></strong></td>
					      </tr> 
						  <?php 
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
								echo "<a href=\"view_monthly_statistics.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 
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
									echo "<a href=\"view_monthly_statistics.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 
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
								echo "<a href=\"view_monthly_statistics.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
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
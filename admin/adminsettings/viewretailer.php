<?php 
include('header.php'); 
	$SortBy	= $_REQUEST['sortby'];


if(isset($_REQUEST))
	extract($_REQUEST);
	
		if(($SortBy == "") || ($SortBy == "all")) { echo $SortList = ""; } else { $SortList = $SortBy; }

  	
if($flag == "active")
{
	$Update_Member	=	"UPDATE ".RETAIL." SET `status`='Active' WHERE `sid`='$sid'";
	$Result_Member	=	mysql_query($Update_Member) or die(mysql_error());
	$rflag	=	"success";
	$rtype	=	"active";
}
elseif($flag == "deactive")
{
	$Update_Member	=	"UPDATE ".RETAIL." SET `status`='DeActive' WHERE `sid`='$sid'";
	$Result_Member	=	mysql_query($Update_Member); 
	$rflag	=	"success";
	$rtype	=	"deactive";
}
elseif($flag == "delete")
{
	$Delete_Member	=	"DELETE FROM ".RETAIL." WHERE `sid`='$sid'";
	$Result_Member	=	mysql_query($Delete_Member) or die(mysql_error());
	$rflag	=	"success";
	$rtype	=	"delete";
}

$pagqry="SELECT * FROM ".RETAIL." WHERE `firstname` LIKE '$SortList%'";
$R_Check	= mysql_query($pagqry) or die(mysql_error());
$total		= mysql_num_rows($R_Check);	

$limit = $Fetch['intRows']; 

$pager  = getPagerData($total, $limit, $page); 
$offset = $pager->offset; 
$limit  = $pager->limit; 
$page   = $pager->page; 	

$limqry		= "SELECT * FROM ".RETAIL." WHERE `firstname` LIKE '$SortList%'  order by region ASC  limit $offset,$limit ";
$R_Check1	= mysql_query($limqry);

?>

<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<a name="viewcat"></a>	<h3>View Retailer</h3>
				</div>
				<table width="548">	
			  <tr> 
    <td width="504" colspan="8" style="padding-left:50px;"><table width="85%" cellpadding="2" cellspacing="2">
	<form name="view_cat" action="" method="POST" >
	<TR>
	<TD class="white" style="padding-left:50px;">
	 <b><span>Retailer</span></b></TD>
	<td>&nbsp;</td>
	<td align="left" width="16%">
		<input type="text" class="inputbox1" name="sortby">	</td>
		<td width="43%">	<input type="submit" value="search" name="submit" class="btn ui-state-default ui-corner-all">	</td>
	</TR>
	
	</form>
	</table></td>
  </tr>
 <tr>
 <td>&nbsp;</td>
 </tr>
  <tr>
           <td colspan="8" align="center" style="padding-left:55px;">
					   <?php
						echo "<a class=\"leftlinks\" href=\"viewretailer.php?sortby=all\">All</a>";?>
									  &nbsp;&nbsp;&nbsp;
									  <?php 		for($ASCII = 65; $ASCII <= 90 ; $ASCII++)
						{				
						  echo "<a class=\"leftlinks\" href=\"viewretailer.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";
						}	
					 ?>		 	</td>
  </tr>
	
  <tr><td>&nbsp;</td></tr>
				
				
				
				
				
				
				
				
				<?php if($_GET['rflag']=="update"){?>
				<div class="response-msg success ui-corner-all"><span>Your Details Are Successfully Updated!</span></div>
				<?php } ?>
				<?php 	if($rflag == "success")  { ?>
				<div class="response-msg success ui-corner-all">
					<span>
					
					
					

					
						<?php
							# Display the Result(Status)  
							if($rflag == "success") 
							{ 
								if($rtype == "active")
									$rDisp	=	"User Status Successfully Actived";
								if($rtype == "deactive")
									$rDisp	=	"User Status Successfully De-Actived";
								if($rtype == "delete")
									$rDisp	=	"User Deleted Successfully";
								if($rtype == "add")
									$rDisp	=	"User Added Successfully";
								if($rtype == "edit")
									$rDisp	=	"User Edited Successfully";
							}
							echo $rDisp;
						?>
					</span>
				</div><?php }?>
				</table>
								
				<div class="hastable">
					<form name="myform" class="" method="post" action="">
						<table align="center"> 
							<?php if($total == 0) {  ?><thead><tr><td colspan="5" align="center">Retailer List Not Found!</td></tr> </thead> <?php }else { ?>
							<thead>
								<tr>
									<th width="10%" align="center">S.No</th>
						    		<th width="30%" align="left">Retailer Name</th> 
									<th width="30%" >Region</th>
						    		<th width="10%" align="center">Action</th> 
						    		<th width="10%" align="center">Edit</th> 
						    		<th width="10%" align="center">Delete</th>
						  		</tr> 
							</thead> 
							<tbody align="center"> 
								<?php
									$i=$offset;
									while($fetch_cat = mysql_fetch_array($R_Check1)) { $i++; extract($fetch_cat); 
								?>
								<tr>
									<td><center><?php echo $i;?></center></td> 
							
								    <td><center><?php $names=$firstname." ".$lastname; $names1=substr($names,0,20); echo ucfirst($names1);?></center></td>
									<td><center><?php $region1=$regionarray[$region]; $region2=substr($region1,0,10); echo ucfirst($region2);?></center></td>
									
									<td style="padding-left:20px;"><center>
										<?php if($status == "Active") { ?>
                    	          			<a href="viewretailer.php?flag=deactive&amp;page=<?php echo $page; ?>&amp;sid=<?php echo $sid;?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="De-Activate"><span class="ui-icon ui-icon-unlocked"></span></a>
                        	        	<?php } else { ?>
                            	    		<a href="viewretailer.php?flag=active&amp;page=<?php echo $page; ?>&amp;sid=<?php echo $sid;?>"  class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Activate"><span class="ui-icon ui-icon-locked"></span></a><?php } ?>
								</center>	</td> 
						 						 
						 		   	<td align="center" style="padding-left:20px;">
										<a href="addretailer.php?flag=edit&amp;page=<?php echo $page; ?>&amp;sid=<?php echo $fetch_cat['sid'];?>"class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit This Retailer"><span class="ui-icon ui-icon-pencil"></span></a>
									</td> 
							
						    		<td align="center" style="padding-left:20px;">
										<a href="viewretailer.php?flag=delete&amp;page=<?php echo $page; ?>&amp;sid=<?php echo $fetch_cat['sid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete"><span class="ui-icon ui-icon-circle-close" onClick="return calldel('Do You Want To Delete This Retailer?');"></span></a>
									</td> 
								</tr> 
								<?php } ?>
							</tbody>
						</table>						
					</form>

					<table width="61%"  border="0" align="left" cellpadding="3" cellspacing="3">
          				<tr>
            				<td width="97%" align="right" class="test">
							<?php 					
								if($limit < $total)
								{
									if ($page == 1)
										echo ""; 
									else 
										echo "<a href=\"viewretailer.php?page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 
									
									for ($i = 1; $i <= $pager->numPages; $i++) 
									{ 
										echo " | "; 
										if ($i == $pager->page)
											echo "<span class='Hint1'>"."$i"."</span>"; 
										else
											echo "<a href=\"viewretailer.php?page=$i\" class='linksnew'> $i</a>"."</font>"; 
									}
																
									if ($i > 1)
										echo " | "; 
									if ($page == $pager->numPages) 
										echo "";
									else   
										echo "<a href=\"viewretailer.php?page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
								}
							}?>    
							</td>
						</tr>
					</table>

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
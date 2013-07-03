<?php
include('header.php'); 

if(isset($_REQUEST))
	extract($_REQUEST);

if($flag == "active")
{
	$active_gal	=	"UPDATE ".GALLERY." SET `status`='active' WHERE `gid`='$gid'";
	if(mysql_query($active_gal))
	{
		$rflag	=	"success";
		$rtype	=	"active";
	}
}
elseif($flag == "deactive")
{
	$deactive_gal	=	"UPDATE ".GALLERY." SET `status`='deactive' WHERE `gid`='$gid'";
	if(mysql_query($deactive_gal) or die(mysql_error()))
	{
		$rflag	=	"success";
		$rtype	=	"deactive";
	}
}
elseif($flag == "delete")
{
	$delete_gal	=	"DELETE FROM ".GALLERY." WHERE `gid`='$gid'";
	if(mysql_query($delete_gal))
	{
		$rflag	=	"success";
		$rtype	=	"delete";
	}
}







$sel_gal="SELECT * FROM ".GALLERY."";
$R_Check	= mysql_query($sel_gal) or die(mysql_error());
$total		= mysql_num_rows($R_Check);	
	
$pager  = getPagerData($total, $intRows, $page); 
$offset = $pager->offset; 
$limit  = $pager->limit; 
$page   = $pager->page; 	

$limit_gal		= "SELECT * FROM ".GALLERY." ORDER BY `gid` DESC  LIMIT $offset,$limit ";
$res_limit_gal=mysql_query($limit_gal);

?>
<link href="style.css" rel="stylesheet" type="text/css" />


<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title"><h3>View Gallery </h3></div>
				<?php if($rflag=="success"){?>	
				<div class="response-msg success ui-corner-all">
				<?php 
					if($rtype == "active")
						$rDisp	=	"Gallery Status Successfully Actived";
					elseif($rtype == "deactive")
						$rDisp	=	"Gallery  Status Successfully DeActived";
					elseif($rtype == "delete")
						$rDisp	=	"Gallery  Deleted Successfully"; 
					elseif($rtype == "add")
						$rDisp	=	"Gallery  Added Successfully"; 
					elseif($rtype == "edit")
						$rDisp	=	"Gallery  Edited Successfully"; 
				?>
				<span><?php echo $rDisp; ?></span>
				</div>
				<?php } ?>
				<div class="hastable">
					<form name="myform" class="pager-form" method="post" action="">
						<table> 
							<thead> 
							<?php if($total == 0) { ?>
								<tr><td colspan="5" align="center">Gallery List Not Found!</td></tr>
							<?php } else { ?>
								<tr>
									<th width="10%">S.No</th>
						    		<th width="40%">Gallery Image  Name</th> 
							 		<th width="20%">Gallery Image</th> 
						    		<th width="10%">Action</th> 
						    		<th width="10%">Edit</th> 
						    		<th width="10%">Delete</th>
								</tr> 
							</thead> 
							
							<tbody>
							<?php $i=$offset+1;  while($fetch_gal = mysql_fetch_array($res_limit_gal)){ extract($fetch_gal);?>
								<tr valign="middle">
									<td class="center"><center><?php echo $i;?></center></td> 
									
									<td><span  style="margin-left:100px"><?php echo ucfirst($gname);?></span></td> 
									
									<?php 
									list($width,$height,$type,$attripute) = getimagesize(GALLERYLINK."/".$gpath);
									if($width<=100) $width = "" ; else $width="100px";
									if($height<=75) $height = "" ; else $height="75px";		?>							

									<td class="center"><center><img src="<?php echo GALLERYLINK."/".$gpath;?>" border="0" width="<?php echo $width;?>" height="<?php echo $height;?>" align="absmiddle"/></center></td>
									
									<td class="center" style="padding-left:18px;">
										<?php if($status == "active") { ?>
											<a href="viewgallery.php?page=<?php echo $page;?>&amp;flag=deactive&amp;gid=<?php echo $gid;?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Active"><span class="ui-icon ui-icon-unlocked"></span></a></td>
										<?php } else { ?>
											<a href="viewgallery.php?page=<?php echo $page;?>&amp;flag=active&amp;gid=<?php echo $gid;?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Active"><span class="ui-icon ui-icon-locked"></span></a>
										<?php } ?>
									</td> 
									
									<td class="center" style="padding-left:20px;"><a href="addgallery.php?page=<?php echo $page;?>&amp;gid=<?php echo $gid;?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit"><span class="ui-icon ui-icon-pencil"></span></a></td> 
									
									<td class="center" style="padding-left:18px;"><a href="viewgallery.php?page=<?php echo $page;?>&amp;flag=delete&amp;gid=<?php echo $gid;?>"class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete" onClick="return calldel('Do You Want to Delete this Gallery?');"><span class="ui-icon ui-icon-circle-close"  ></span></a></td> 
								</tr> 
							<?php $i++; } } ?>
							</tbody>
						</table>						
					</form>
					
					<table width="61%"  border="0" align="right" cellpadding="3" cellspacing="3">
						<tr>
							<td width="97%" align="right" class="test">
							<?php 					
							if($limit < $total)
							{
								if ($page == 1)  echo ""; 
								
								else  echo "<a href=\"viewgallery.php?&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 
								
								for ($i = 1; $i <= $pager->numPages; $i++) 
								{ 
									echo " | "; 
									if ($i == $pager->page)  	echo "<span class='Hint1'>"."$i"."</span>"; 
									
									else	echo "<a href=\"viewgallery.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 
								} 
								if ($i > 1)  echo " | "; 
								
								if ($page == $pager->numPages)  echo "";
								
								else   echo "<a href=\"viewgallery.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
							}		
							?>    
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
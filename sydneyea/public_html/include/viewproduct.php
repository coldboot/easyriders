<?php include('header.php'); 

$SortBy	= $_REQUEST['sortby'];
$path=PRODUCTIMG;

if(isset($_REQUEST))
	extract($_REQUEST);
	
		if(($SortBy == "") || ($SortBy == "all")) { echo $SortList = ""; } else { $SortList = $SortBy; }


 $flag=$_REQUEST['flag'];
    $id=$_REQUEST['cid'];
  	
	#For Display the Result
	$rflag	=	$_GET['rflag'];	
	$rType	=	$_GET['rtype'];	
	
	if($flag == "active")
	{
		$Update_Member	=	"UPDATE ".PRODUCT." SET `status`='Active' WHERE `intproductid`='$id'";
		$Result_Member	=	mysql_query($Update_Member);
		$rflag	=	"success";
		$rType	=	"active";
	}
	elseif($flag == "deactive")
	{
	
		$Update_Member	=	"UPDATE ".PRODUCT." SET `status`='DeActive' WHERE `intproductid`='$id'";
		$Result_Member	=	mysql_query($Update_Member);
		$rflag	=	"success";
		$rType	=	"deactive";
	}
		elseif($flag == "delete")
	{
		$Delete_Member	=	"DELETE FROM ".PRODUCT." WHERE `intproductid`='$id'";
		$Result_Member	=	mysql_query($Delete_Member);
		$rflag	=	"success";
		$rType	=	"delete";
	}


$pagqry="SELECT * FROM ".PRODUCT." WHERE `productname` LIKE '$SortList%'";
$R_Check	= mysql_query($pagqry) or die(mysql_error());
$total		= mysql_num_rows($R_Check);	

$limit = $Fetch['intRows']; 

$pager  = getPagerData($total, $limit, $page); 
$offset = $pager->offset; 
$limit  = $pager->limit; 
$page   = $pager->page; 	

$limqry		= "SELECT * FROM ".PRODUCT." WHERE `productname` LIKE '$SortList%'  order by intproductid DESC  limit $offset,$limit ";
$R_Check1	= mysql_query($limqry);



	
	/*$pagqry="SELECT * FROM ".PRODUCT."  ";
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

 	$limqry		= "SELECT * FROM ".PRODUCT."  order by `intproductid` ASC  limit $offset,$limit ";
	$R_Check1	= mysql_query($limqry);*/

?>
	<!--<div id="welcome" title="Welcome to Shopsteria">
		<p><strong>Here admin can View the Added category names. On this page admin can able to edit,delete and change the status of the category details.</strong></p>
	</div>-->
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
							<a name="viewpro"></a><h3>View Product </h3>
				</div>
				
				<table width="548">	
			  <tr> 
    <td width="504" colspan="8"><table width="85%" cellpadding="2" cellspacing="2">
	<form name="view_cat" action="" method="POST" >
	<TR><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	         
	<TD width="43%" class="white" align="right" style="padding-left:50px;">
	 <b>Search Product</b></TD>
	
	<td width="16%" >
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
           <td colspan="8" align="center" style="padding-left:47px;">
					   <?php
						echo "<a class=\"leftlinks\" href=\"viewproduct.php?sortby=all\">All</a>";?>
									  &nbsp;&nbsp;&nbsp;
									  <?php 		for($ASCII = 65; $ASCII <= 90 ; $ASCII++)
						{				
						  echo "<a class=\"leftlinks\" href=\"viewproduct.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";
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
	                     if($rType == "active")
	  	                 $rDisp	=	"Product Status Successfully Activated";
	                     elseif($rType == "deactive")
	                     $rDisp	=	"Product  Status Successfully De-Activated";
	                     elseif($rType == "delete")
	  	                 $rDisp	=	"Product  Deleted Successfully"; 
	                      elseif($rType == "add")
	                     $rDisp	=	"Product  Added Successfully"; 
	                     elseif($rType == "edit")
		                 $rDisp	=	"Product  Edited Successfully"; 
                          }
	                      echo $rDisp;
						?>
					</span>
				</div><?php }?>
				</table>
				
				
				
				
			<?php /*?>		<?php 	if($rflag == "success")  { ?>
   	<div class="response-msg success ui-corner-all">
									<span>  <?php
  # Display the Result(Status) 
  if($rflag == "success") 
  { 
	  if($rType == "active")
	  	$rDisp	=	"Product Status Successfully Activated";
	  elseif($rType == "deactive")
	  	$rDisp	=	"Product  Status Successfully De-Activated";
	  elseif($rType == "delete")
	  	$rDisp	=	"Product  Deleted Successfully"; 
	 elseif($rType == "add")
		$rDisp	=	"Product  Added Successfully"; 
	 elseif($rType == "edit")
		$rDisp	=	"Product  Edited Successfully"; 
}
	echo $rDisp;
?></span>
			</div><?php }?><?php */?>

				<div class="hastable">
						<table> 
						<thead> 
						<?php if($total == 0) {  ?>
						<tr>
						  <td colspan="5" align="center">Product List Not Found!</td>
						</tr>
						<?php }else { ?>
						<tr>
							<th width="10%">S.No</th>
						    <th width="20%">Product  Name</th> 
							<th width="25%">Product Image</th>
						    <th width="10%">Action</th> 
						    <th width="10%">Edit</th> 
						    <th width="10%">Delete</th>
						  </tr> 
						</thead> 
						<tbody> 
					<?php
					$i=$offset+1;
					while($fetch_cat = mysql_fetch_array($R_Check1)){
					?>
						<tr>
							<td><center><?php echo $i;?></center></td> 
						    <td><span style="margin-left:40px;"><?php echo ucfirst($fetch_cat['productname']);?></span></td> 
									<?php 
										list($width,$height)=getimagesize($fetch_cat['productimage']);
							if($width>=75)  $width="100px";
							if($height>=75) $height="100px";
						
						
						?>							

											
							
							
					<td class="center"><center><img src="<?php echo $path.$fetch_cat['productimage'];?>" border="0" width="<?php echo $width;?>" height="<?php echo $height;?>" align="absmiddle"/></center></td>
							<td align="center" style="padding-left:25px;">
							<?php if($fetch_cat['status'] == "Active") { ?>
							
                                <a href="viewproduct.php?flag=deactive&amp;cid=<?php echo $fetch_cat['intproductid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Deactive">
								<span class="ui-icon ui-icon-unlocked"></span></a>
                                
                                
								<?php } else { ?><a href="viewproduct.php?flag=active&amp;cid=<?php echo $fetch_cat['intproductid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Active">
								
								<span class="ui-icon ui-icon-locked"></span></a><?php } ?>
								</td>
								 
						    <td align="center" style="padding-left:25px;"><a href="addproduct.php?cid=<?php echo $fetch_cat['intproductid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit This Product">
							<span class="ui-icon ui-icon-pencil"></span>
							<!--	<img src="../../images/reply2.gif" border="0" title="Edit">-->
							</a></td> 
						    <td align="center" style="padding-left:25px;"><a href="viewproduct.php?flag=delete&amp;cid=<?php echo $fetch_cat['intproductid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip"><span class="ui-icon ui-icon-circle-close" onClick="return calldel('Do You Want To Delete This Product?');"></span></a></td> 
					      </tr> 
						  <?php $i++; } ?>
						</tbody>
						</table>
					 <?php } ?>
					
<table width="61%"  border="0" align="right" cellpadding="3" cellspacing="3">
          <tr>
            <td width="97%" align="right" class="test"><?php 					
					if($limit < $total)
					{
							if ($page == 1)
							{
								echo ""; 
							}
							else 
							{       
								echo "<a href=\"viewproduct.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 
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
									echo "<a href=\"viewproduct.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 
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
								echo "<a href=\"viewproduct.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
							}
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
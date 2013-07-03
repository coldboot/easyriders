<?php include('header.php'); 

$SortBy	= $_REQUEST['sortby'];
$path=SUBCATIMAGE;
 $flag=$_REQUEST['flag'];
    $id=$_REQUEST['cid'];
  	
	#For Display the Result
	$rflag	=	$_GET['rflag'];	
	$rType	=	$_GET['rtype'];	
	
	if(($SortBy == "") || ($SortBy == "all")) { echo $SortList = ""; } else { $SortList = $SortBy; }
	
	if($flag == "active")
	{
		 $Update_Member	=	"UPDATE ".SUBCATEGORY." SET `varstatus`='Active' WHERE `scid`='$id'";
		$Result_Member	=	mysql_query($Update_Member);
		$rflag	=	"success";
		$rType	=	"active";
	}
	elseif($flag == "deactive")
	{
	
		$Update_Member	=	"UPDATE ".SUBCATEGORY." SET `varstatus`='DeActive' WHERE `scid`='$id'";
		$Result_Member	=	mysql_query($Update_Member);
		$rflag	=	"success";
		$rType	=	"deactive";
	}
		elseif($flag == "delete")
	{
		$Delete_Member	=	"DELETE FROM ".SUBCATEGORY." WHERE `scid`='$id'";
		$Result_Member	=	mysql_query($Delete_Member);
		$rflag	=	"success";
		$rType	=	"delete";
	}

 	$pagqry="SELECT * FROM ".SUBCATEGORY." WHERE `subcatname` LIKE '$SortList%'";
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

 	$limqry		= "SELECT * FROM ".SUBCATEGORY." WHERE `subcatname` LIKE '$SortList%'   order by scid DESC  limit $offset,$limit ";
	$R_Check1	= mysql_query($limqry);

?>
	<!--<div id="welcome" title="Welcome to Shopsteria">
<p><strong>Here admin can View the Added category names. On this page admin can able to edit,delete and change the status of the category details.</strong></p>
	</div>-->
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<a name="viewcat"></a>	<h3>View Sub Categories</h3>
				</div>
				
				<table width="548">	
			  <tr  align="center"> 
    <td width="504" colspan="8"><table width="85%" cellpadding="2" cellspacing="2">
	<form name="view_cat" action="" method="POST" >
	<tr>
	<td width="40%" align="right" class="white" style="padding-left:85px;">
	<b>SubCategory</b>	</td>
	<td>&nbsp;	</td>
	<td align="left" width="16%">
		<input type="text" class="inputbox1" name="sortby">	</td>
		<td width="43%">	<input type="submit" value="search" name="submit" class="btn ui-state-default ui-corner-all">	</td>
	</tr>
	
	</form>
	</table></td>
  </tr>
 <tr>
 <td>&nbsp;</td>
 </tr>
  <tr>
           <td colspan="8" align="center" style="padding-left:55px;">
					   <?php
						echo "<a class=\"leftlinks\" href=\"viewsubcategory.php?sortby=all\">All</a>";?>
									  &nbsp;&nbsp;&nbsp;
									  <?php 		for($ASCII = 65; $ASCII <= 90 ; $ASCII++)
						{				
						  echo "<a class=\"leftlinks\" href=\"viewsubcategory.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";
						}	
					 ?>		 	</td>
  </tr>
	
  <tr><td>&nbsp;</td></tr>
					<?php 	if($rflag == "success")  { ?>
   	<div class="response-msg success ui-corner-all">
									<span>  <?php
  # Display the Result(Status) 
  if($rflag == "success") 
  { 
	  if($rType == "active")
	  	$rDisp	=	"SubCategory Status Successfully Activated";
	  elseif($rType == "deactive")
	  	$rDisp	=	"SubCategory Status Successfully De-Activated";
	  elseif($rType == "delete")
	  	$rDisp	=	"SubCategory Deleted Successfully"; 
	 elseif($rType == "add")
		$rDisp	=	"SubCategory Added Successfully"; 
	 elseif($rType == "edit")
		$rDisp	=	"SubCategory Edited Successfully"; 
}
	echo $rDisp;
?></span>
			</div><?php }?>
				</table>
				<div class="hastable">
					<form name="myform" class="" method="post" action="">
						<table> 
						<thead> 
						<?php if($total == 0) { ?><tr><td colspan="5" align="center">Sub Category List Not Found!</td></tr><?php } ?>
						<tr>
							<th width="34" align="center">S.No</th>
						    <th width="274" align="left">Sub Category Name</th> 
							<th width="106" align="center">Sub Category Image</th> 
						    <th width="106" align="center">Action</th> 
						    <th width="58" align="center">Edit</th> 
						    <th width="82" align="center">Delete</th>
						  </tr> 
						</thead> 
						<tbody> 
					<?php
					$i=$offset+1;
					while($fetch_cat = mysql_fetch_array($R_Check1)){
					?>
						<tr>
							<td><center><?php echo $i;?></center></td> 
						    <td><center><?php echo $fetch_cat['subcatname'];?></center></td> 
							
<?php 
										list($width,$height)=getimagesize($path.$fetch_cat['catimage']);
							if($width>=75)  $width=75;
							if($height>=75) $height=75;
						
						
						?>
						
					<td class="center"><center><img src="<?php echo $path.$fetch_cat['catimage'];?>" border="0" width="<?php echo $width;?>" height="<?php echo $height;?>" align="absmiddle"/></center></td>							
							
							    <td align="center" style="padding-left:40px;"><?php if($fetch_cat['varStatus'] == "Active") { ?>
                                <a href="viewsubcategory.php?flag=deactive&amp;cid=<?php echo $fetch_cat['scid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="De-Activate">
								<span class="ui-icon ui-icon-unlocked"></span></a>
                                <?php } else { ?>
                                <a href="viewsubcategory.php?flag=active&amp;cid=<?php echo $fetch_cat['scid'];?>"  class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Activate">
								<span class="ui-icon ui-icon-locked"></span></a><?php } ?></td> 
						    <td align="center" style="padding-left:20px;"><a href="addsubcategory.php?cid=<?php echo $fetch_cat['scid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit This SubCategory"><span class="ui-icon ui-icon-pencil"></span></a>
							</td> 
						    <td align="center" style="padding-left:30px;"><a href="viewsubcategory.php?flag=delete&amp;cid=<?php echo $fetch_cat['scid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete"><span class="ui-icon ui-icon-circle-close" onClick="return calldel('Do You Want To Delete This Sub Category?');"></span></a></td> 
					      </tr> 
						  <?php 
						  $i++;
						  } ?>
						</tbody>
						</table>
						<!--<div id="pager">
					
								<a class="btn_no_text btn ui-state-default ui-corner-all first" title="First Page" href="#">
									<span class="ui-icon ui-icon-arrowthickstop-1-w"></span>
								</a>
								<a class="btn_no_text btn ui-state-default ui-corner-all prev" title="Previous Page" href="#">
									<span class="ui-icon ui-icon-circle-arrow-w"></span>
								</a>
							
								<input type="text" class="pagedisplay"/>
								<a class="btn_no_text btn ui-state-default ui-corner-all next" title="Next Page" href="#">
									<span class="ui-icon ui-icon-circle-arrow-e"></span>
								</a>
								<a class="btn_no_text btn ui-state-default ui-corner-all last" title="Last Page" href="#">
									<span class="ui-icon ui-icon-arrowthickstop-1-e"></span>
								</a>
								<select class="pagesize">
									<option value="10" selected="selected">10 results</option>
									<option value="20">20 results</option>
									<option value="30">30 results</option>
									<option value="40">40 results</option>
								</select>								
						</div>-->
					</form>

<table width="61%"  border="0" align="left" cellpadding="3" cellspacing="3">
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
								echo "<a href=\"viewsubcategory.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 
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
									echo "<a href=\"viewsubcategory.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 
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
								echo "<a href=\"viewsubcategory.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
							}
					}		
					?>    
	  </td>
  </tr>
</table>

		  
					
				

				<!--<div class="title title-spacing">
					<h3>Pagination example</h3>
				</div>-->
				<!--<ul class="pagination">
					<li class="previous-off">&laquo;Previous</li>
					<li class="active">1</li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li>...........</li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">9</a></li>

					<li><a href="#">10</a></li>
					<li class="next"><a href="#">Next &raquo;</a></li>
				</ul>-->
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
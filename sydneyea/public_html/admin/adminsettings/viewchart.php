<?php include('header.php'); 

	$SortBy	= $_REQUEST['sortby'];
 	$flag=$_REQUEST['flag'];
    $id=$_REQUEST['cid'];
  	
	#For Display the Result
	$rflag	=	$_GET['rflag'];	
	$rType	=	$_GET['rtype'];	
	
	if(($SortBy == "") || ($SortBy == "all")) { echo $SortList = ""; } else { $SortList = $SortBy; }

	
	if($flag == "active")
	{
		 $Update_User	=	"UPDATE tbl_gigband_chart SET `status`='Active' WHERE `chartid`='$id'";
		$Result_User	=	mysql_query($Update_User) or die(mysql_error());
		$rflag	=	"success";
		$rType	=	"active";
	}
	elseif($flag == "deactive")
	{
	
		$Update_User	=	"UPDATE  tbl_gigband_chart  SET `status`='DeActive' WHERE `chartid`='$id'";
		$Result_User	=	mysql_query($Update_User); 
		$rflag	=	"success";
		$rType	=	"deactive";
	}
		elseif($flag == "delete")
	{
		$Delete_User	=	"DELETE  FROM tbl_gigband_chart  WHERE `chartid`='$id'";
		$Result_User	=	mysql_query($Delete_User) or die(mysql_error());
		$rflag	=	"success";
		$rType	=	"delete";
	}

  	$pagqry="SELECT * FROM  tbl_gigband_chart  WHERE `chartauthor` LIKE '$SortList%'";
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

 	 $limqry		= "SELECT * FROM  tbl_gigband_chart  WHERE `chartauthor` LIKE '$SortList%'  order by chartid DESC  limit $offset,$limit ";
	$R_Check1	= mysql_query($limqry);

?>
	<!--<div id="welcome" title="Welcome to Shopsteria">
<p><strong>Here admin can View the Added category names. On this page admin can able to edit,delete and change the status of the category details.</strong></p>
	</div>-->
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
			<div class="title">
				<a name="viewcat"></a>	<h3>View Chart</h3>
				</div>
			
			<table width="548">	
			  <tr  align="center"> 
    <td width="504" colspan="8"><table width="85%" cellpadding="2" cellspacing="2">
	<form name="view_cat" action="" method="POST" >
	<tr>
	<td width="25%" align="right" class="white" style="padding-left:85px;">
	<b>Chart</b>	</td>
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
						echo "<a class=\"leftlinks\" href=\"viewnews.php?sortby=all\">All</a>";?>
									  &nbsp;&nbsp;&nbsp;
									  <?php 		for($ASCII = 65; $ASCII <= 90 ; $ASCII++)
						{				
						  echo "<a class=\"leftlinks\" href=\"viewnews.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";
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
	  	$rDisp	=	"Category Status Successfully Activated";
	  elseif($rType == "deactive")
	  	$rDisp	=	"Category Status Successfully De-Activated";
	  elseif($rType == "delete")
	  	$rDisp	=	"Category Deleted Successfully"; 
	 elseif($rType == "add")
		$rDisp	=	"Category Added Successfully"; 
	 elseif($rType == "edit")
		$rDisp	=	"Category Edited Successfully"; 
}
	echo $rDisp;
?></span>
			</div><?php }?>
				</table>
				<div class="hastable">
					<form name="myform" class="" method="post" action="">
						<table> 
						 
						<?php if($total == 0) {  ?><thead><tr><td colspan="5" align="center">Chart List Not Found!</td></tr> </thead> <?php }else { ?>                  <thead>
						<tr>
							<th width="34" align="center">S.No</th>
						    <th width="274" align="left">Author Name</th> 
						    <th width="106" align="center">Action</th> 
						    <th width="58" align="center">Edit</th> 
						    <th width="82" align="center">Delete</th>
						  </tr> 
						</thead> 
						<tbody> 
					<?php
					$i=$offset;
					while($fetch_cat = mysql_fetch_array($R_Check1)){$i++;
					?>
						<tr>
							<td align="center" style="padding-left:20px;"><?php echo $i;?></td> 
						    <td style="padding-left:110px;"><?php echo ucfirst($fetch_cat['chartauthor']);?></td> 
							
							    <td align="center" style="padding-left:55px;"><?php if($fetch_cat['status'] == "Active") { ?>
                                <a href="viewchart.php?flag=deactive&amp;cid=<?php echo $fetch_cat['chartid'];?>"  class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="De-Activate">
								<span class="ui-icon ui-icon-unlocked"></span></a>
                                <?php } else { ?>
                                <a href="viewchart.php?flag=active&amp;cid=<?php echo $fetch_cat['chartid'];?>"  class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Activate">
								<span class="ui-icon ui-icon-locked"></span></a><?php } ?></td> 
						 
						 
						    <td align="center" style="padding-left:28px;"><a href="addchart.php?flag=edit&amp;cid=<?php echo $fetch_cat['chartid'];?>"class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit This Category">
							<span class="ui-icon ui-icon-pencil"></span>
							</a>
							
							</td> 
						    <td align="center" style="padding-left:40px;"><a href="viewchart.php?flag=delete&amp;cid=<?php echo $fetch_cat['chartid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete"><span class="ui-icon ui-icon-circle-close" onClick="return calldel('Do You Want To Delete This Chart?');"></span></a></td> 
					      </tr> 
						  <?php 
						
						  } ?>
						</tbody>
						</table>
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
								echo "<a href=\"viewchart.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 
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
									echo "<a href=\"viewchart.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 
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
								echo "<a href=\"viewchart.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
							}
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
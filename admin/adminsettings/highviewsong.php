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
		 $Update_User	=	"UPDATE ".SONGS." SET `varstatus`='Active' WHERE `suserid`='$id'";
		$Result_User	=	mysql_query($Update_User) or die(mysql_error());
		$rflag	=	"success";
		$rType	=	"active";
	}
	elseif($flag == "deactive")
	{
	
		$Update_User	=	"UPDATE ".SONGS." SET `varstatus`='DeActive' WHERE `suserid`='$id'";
		$Result_User	=	mysql_query($Update_User); 
		$rflag	=	"success";
		$rType	=	"deactive";
	}
		elseif($flag == "delete")
	{
		$Delete_User	=	"DELETE FROM ".SONGS." WHERE `suserid`='$id'";
		$Result_User	=	mysql_query($Delete_User) or die(mysql_error());
		$rflag	=	"success";
		$rType	=	"delete";
	}

  	$pagqry="SELECT * FROM ".SONGS." WHERE `filetype`='audio/x-wav' and `creator` LIKE '$SortList%'";
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

	 $limqry		= "SELECT * FROM ".SONGS."  WHERE `filetype`='audio/x-wav' and `creator` LIKE '$SortList%'  order by suserid DESC  limit $offset,$limit ";
	$R_Check1	= mysql_query($limqry);

?>
	<!--<div id="welcome" title="Welcome to Shopsteria">
<p><strong>Here admin can View the Added category names. On this page admin can able to edit,delete and change the status of the category details.</strong></p>
	</div>-->
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
			<div class="title">
				<a name="viewcat"></a>	<h3>View High Quality Songs</h3>
				</div>
			
			<table width="548">	
			  <tr  align="center"> 
    <td width="504" colspan="8"><table width="85%" cellpadding="2" cellspacing="2">
	<form name="view_song" action="" method="POST" >
	<tr>
	<td width="25%" align="right" class="white" style="padding-left:85px;">
	<b>Songs</b>	</td>
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
						echo "<a class=\"leftlinks\" href=\"highviewsong.php?sortby=all\">All</a>";?>
									  &nbsp;&nbsp;&nbsp;
									  <?php 		for($ASCII = 65; $ASCII <= 90 ; $ASCII++)
						{				
						  echo "<a class=\"leftlinks\" href=\"highviewsong.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";
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
	  	$rDisp	=	"Songs Status Successfully Activated";
	  elseif($rType == "deactive")
	  	$rDisp	=	"Songs Status Successfully De-Activated";
	  elseif($rType == "delete")
	  	$rDisp	=	"Songs Deleted Successfully"; 
	 elseif($rType == "add")
		$rDisp	=	"Songs Added Successfully"; 
	 elseif($rType == "edit")
		$rDisp	=	"Songs Edited Successfully"; 
}
	echo $rDisp;
?></span>
			</div><?php }?>
				</table>
				<div class="hastable">
					<form name="myform" class="" method="post" action="">
						<table> 
						 
						<?php if($total == 0) {  ?><thead><tr><td colspan="5" align="center">Song List Not Found!</td></tr> </thead> <?php }else { ?>                  <thead>
						<tr>
							<th width="34" align="center">S.No</th>
						    <th width="150" align="left">Song Name</th> 
							<th width="150">Artist Name</th>
						    <th width="106" align="center">Action</th> 
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
						    <td style="padding-left:110px;"><?php echo ucfirst($fetch_cat['title']);?></td> 
								 <td style="padding-left:110px;"><?php echo ucfirst($fetch_cat['creator']);?></td> 
							
							    <td align="center" style="padding-left:55px;"><?php if($fetch_cat['varstatus'] == "Active") { ?>
                                <a href="highviewsong.php?flag=deactive&amp;cid=<?php echo $fetch_cat['suserid'];?>&page=<?php echo $_GET['page'];?>"  class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="De-Activate">
								<span class="ui-icon ui-icon-unlocked"></span></a>
                                <?php } else { ?>
                                <a href="highviewsong.php?flag=active&amp;cid=<?php echo $fetch_cat['suserid'];?>&page=<?php echo $_GET['page'];?>"  class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Activate">
								<span class="ui-icon ui-icon-locked"></span></a><?php } ?></td> 
					 
						    <td align="center" style="padding-left:40px;"><a href="highviewsong.php?flag=delete&amp;cid=<?php echo $fetch_cat['suserid'];?>&page=<?php echo $_GET['page'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete"><span class="ui-icon ui-icon-circle-close" onClick="return calldel('Do You Want To Delete This song?');"></span></a></td> 
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
								echo "<a href=\"highviewsong.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 
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
									echo "<a href=\"highviewsong.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 
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
								echo "<a href=\"highviewsong.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
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


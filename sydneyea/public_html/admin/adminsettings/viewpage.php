<?php include('header.php'); 
	$SortBy	= $_REQUEST['sortby'];
     $rflag=$_REQUEST['rflag'];	
	$rtype=$_REQUEST['rtype'];	

	if(($SortBy == "") || ($SortBy == "all")) { echo $SortList = ""; } else { $SortList = $SortBy; }


    $flag=$_REQUEST['flag'];
    $pageid=$_REQUEST['pageid'];
  	
	#For Display the Result
	$rflag	=	$_GET['rflag'];	
	$rType	=	$_GET['rtype'];	
	
	if($flag == "active")
	{
		 $Update_Member	=	"UPDATE ".PAGE." SET `status`='Active' WHERE `pageid`='$pageid'";
		$Result_Member	=	mysql_query($Update_Member);
		$rflag	=	"success";
		$rType	=	"active";
	}
	elseif($flag == "deactive")
	{
	
		$Update_Member	=	"UPDATE ".PAGE." SET `status`='DeActive' WHERE `pageid`='$pageid'";
		$Result_Member	=	mysql_query($Update_Member);
		$rflag	=	"success";
		$rType	=	"deactive";
	}
		elseif($flag == "delete")
	{
		$Delete_Member	=	"DELETE FROM ".PAGE." WHERE `pageid`='$pageid'";
		$Result_Member	=	mysql_query($Delete_Member);
		$rflag	=	"success";
		$rType	=	"delete";
	}

 	$pagqry="SELECT * FROM ".PAGE." WHERE `title` LIKE '$SortList%' ";
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

 	$limqry		= "SELECT * FROM ".PAGE." WHERE `title` LIKE '$SortList%' order by pageid DESC  limit $offset,$limit ";
	$R_Check1	= mysql_query($limqry);

?>	<!--<div id="welcome" title="Welcome to Shopsteria">

<p><strong>Here admin can View the Added category names. On this page admin can able to edit,delete and change the status of the category details.</strong></p>

	</div>-->

<div id="page-wrapper">

		<div id="main-wrapper">

			<div id="main-content">

			<div class="title">

				<a name="viewcat"></a>	<h3>View PAGES</h3>

				</div>

			

			<table width="548">	

			  <tr  align="center"> 

    <td width="504" colspan="8"><table width="85%" cellpadding="2" cellspacing="2">

	<form name="view_cat" action="" method="POST" >

	<tr>

	<td width="55%" align="right" class="white" style="padding-left:85px;">

	<b>Search By PAGE's Title:</b>	</td>

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

					  <?php echo "<a class=\"leftlinks\" href=\"viewpage.php?sortby=all\">All</a>";?>
																	  &nbsp;&nbsp;&nbsp;
																	  <?php 	for($ASCII = 65; $ASCII <= 90 ; $ASCII++){				
														  echo "<a class=\"leftlinks\" href=\"viewpage.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";}	?>	 	</td>

  </tr>

	

  <tr><td>&nbsp;</td></tr>

						  <?php
  # Display the Result(Status) 
  if($rflag == "success") 
  { 
	  if($rType == "add")
	  	$rDisp	=	"Page Details Successfully Added";
	  elseif($rType == "active")
	  	$rDisp	=	"Page Details Successfully Activated";
	  elseif($rType == "deactive")
	  	$rDisp	=	"Page Details Successfully DeActivated";
		 elseif($rType == "delete") 
	  	$rDisp	=	"Page Details Deleted Successfully";
	  elseif($rType == "update")
	  	$rDisp	=	"Page Details Updated Successfully";
	  echo "<tr>";
		echo "<td colspan=\"7\" align=\"center\" class=\"information\">"; if($rType == "delete") { 
		echo "<div class=\"response-msg error ui-corner-all\">"; }else { 
		echo "<div class=\"response-msg success ui-corner-all\">"; }echo $rDisp;
		echo"</div></td>";
	  echo "</tr>";
  }  
  ?> </span>

			</div>
				</table>

				<div class="hastable">

					<form name="myform" class="" method="post" action="">

						<table> 

						 

						<?php if($total == 0) {  ?><thead><tr><td colspan="5" align="center">Pages List Not Found!</td></tr> </thead> <?php }else { ?>                  <thead>

						 <tr>
							<th width="34" align="center">S.No</th>
						    <th width="50" align="center">Type</th> 
						    <th width="350" align="left">Page title</th> 
							
						    <th width="50" align="center">Action</th> 
						    <th width="50" align="center">Edit</th> 
						    <th width="50" align="center">Delete</th>
						    </tr>
						</thead> 

						<tbody> 

					<?php

					$i=$offset;

					while($fetch_cat = mysql_fetch_array($R_Check1)){$i++;

					?>

						<tr>

							<td align="center" style="padding-left:20px;"><?php echo $i;?></td> 
							
						   <td align="center" style="padding-left:20px;"><?php echo $fetch_cat['pagetype'];?></td> 
						   
						   <td style="padding-left:30px;"><?php echo ucfirst($fetch_cat['title']);?></td> 
													 
						   <td align="center" style="padding-left:20px;"><?php if($fetch_cat['status'] == "Active") { ?>
                            <a href="viewpage.php?flag=deactive&amp;pageid=<?php echo $fetch_cat['pageid'];?>"  class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="De-Activate">

								<span class="ui-icon ui-icon-unlocked"></span></a>

                                <?php } else { ?>

                                <a href="viewpage.php?flag=active&amp;pageid=<?php echo $fetch_cat['pageid'];?>"  class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Activate">

								<span class="ui-icon ui-icon-locked"></span></a><?php } ?></td> 
								
								
								
								
								
								
								

						 

						 

						    <td align="center" style="padding-left:10px;"><a href="addpage.php?pageid=<?php echo $fetch_cat['pageid'];?>"class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit This Page">

							<span class="ui-icon ui-icon-pencil"></span>

							</a>

							

							</td> 

						    <td align="center" style="padding-left:20px;"><a href="viewpage.php?flag=delete&amp;pageid=<?php echo $fetch_cat['pageid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete"><span class="ui-icon ui-icon-circle-close" onClick="return calldel('Do You Want To Delete This?');"></span></a></td> 

					      </tr> 

						  <?php 

						

						  } }?>

						</tbody>

						</table>

					</form>

<?PHP if($total>$limit) { ?>

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

								echo "<a href=\"viewpage.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 

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

									echo "<a href=\"viewpage.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 

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

								echo "<a href=\"viewpage.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";

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
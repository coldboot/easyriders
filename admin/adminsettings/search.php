<?php include('header.php'); 

	$rflag	=	$_GET['rflag'];	

	$rType	=	$_GET['rtype'];	




 $flag=$_REQUEST['flag'];

$ids=$_REQUEST['cid'];
 //changelevel
 $levels=$_POST['Level'];
 
  if(isset($_POST['go']))
 {
 $g=0;
 foreach($ids as $id)
 {
   $level=$levels[$g];
 if($level=="User")
 {
         $Update_Level	="UPDATE  `tbl_side_user` SET `user_level`='$level' WHERE `intid`='$id'";

		if($Result_Level	=	mysql_query($Update_Level))
		{$rflag	=	"success";
		$rType	=	"level";
		}
}
if($level=="Employee")
 {
$Update_Level	=	"UPDATE `tbl_side_user` SET `user_level`='$level' WHERE `intid`='$id'";

		
		if($Result_Level	=	mysql_query($Update_Level))
		 {$rflag	=	"success";
		$rType	=	"level";
		}
}
if($level=="Client")
 {
$Update_Level	=	"UPDATE `tbl_side_user` SET `user_level`='$level' WHERE `intid`='$id'";

		
		if($Result_Level	=	mysql_query($Update_Level))
		 {$rflag	=	"success";
		$rType	=	"level";
		}
}
$g++;
}
}
//unset($levels);
/* 
 $level=$_POST['Level'];
$Update_Level	=	"UPDATE  adduser SET `Level`='$level' WHERE `intid`='$id'";

		
		if($Result_Level	=	mysql_query($Update_Level))
		 {$rflag	=	"success";
		$rType	=	"level";
		}
*/
	#For Display the Result



	

	if($flag == "active")
{

		$Update_User	=	"UPDATE `tbl_side_user` SET `varStatus`='Active' WHERE `intid`='$ids'";

		if($Result_User	=	mysql_query($Update_User))
		{

		$rflag	=	"success";

		$rType	=	"active";
		}

	}

	elseif($flag == "deactive")

	{

	

		$Update_User	=	"UPDATE `tbl_side_user` SET `varStatus`='DeActive' WHERE `intid`='$ids'";

		if($Result_User	=	mysql_query($Update_User))
		{
		$rflag	=	"success";

		$rType	=	"deactive";
		}

	}

		elseif($flag == "delete")

	{
		
		/*$sel_user			= "SELECT * FROM `tbl_side_user` WHERE `intid` = '$ids '";
		$res_user			= mysql_query($sel_user) or die(mysql_error()."hello");
		$fet_user			=  mysql_fetch_array($res_user);
		$res_id				= $fet_user['resumeid'];
		$del_res			= "DELETE FROM `tbl_iui_upresume` WHERE `rid` = '$res_id'";
		mysql_query($del_res);*/
		
		$Delete_User	=	"DELETE FROM `tbl_side_user` WHERE `intid`='$ids'";

		$Result_User	=	mysql_query($Delete_User);

		$rflag	=	"success";

		$rType	=	"delete";

	}


	
	if(isset($_GET['search']))
	{
	$search=$_GET['search'];
	$pagqry="SELECT * FROM tbl_side_user  WHERE Username LIKE '%$search%'";



	$R_Check	= mysql_query($pagqry) or die(mysql_error());

	$C_Check	= mysql_num_rows($R_Check);

	$total		= mysql_num_rows($R_Check);	
}
else
{
	
	
	
	$pagqry="SELECT * FROM tbl_side_user ";



	$R_Check	= mysql_query($pagqry) or die(mysql_error());

	$C_Check	= mysql_num_rows($R_Check);

	$total		= mysql_num_rows($R_Check);	

	}

	 $page = $_GET['page']; 

	 $limit = $Fetch['intRows']; 

//$limit = 2; 



	$pager  = getPagerData($total, $limit, $page); 

	$offset = $pager->offset; 

	$limit  = $pager->limit; 

	 $page   = $pager->page; 	

	if(isset($_GET['search']))
	{
	$search=$_GET['search'];
	
	//$limqry			="SELECT * FROM tbl_side_user WHERE MATCH(Firstname,Lastname,Username) AGAINST ('%user%') order by intid DESC limit $offset,$limit ";

$limqry		= "SELECT * FROM tbl_side_user  WHERE Username LIKE '%$search%' order by intid DESC  limit $offset,$limit ";

}
else 
$limqry		= "SELECT * FROM tbl_side_user order by intid DESC  limit $offset,$limit ";


	$R_Check1	= mysql_query($limqry);




//$sel="select * from adduser" ; 
//$res=mbnvv;
//$fetch=my;
//$uname=$fetch['uname'];
//$level=$fetch['level'];
?>
	<!--<div id="welcome" title="Welcome to Shopsteria">

		<p><strong>Here admin can View the Added category names. On this page admin can able to edit,delete and change the status of the category details.</strong></p>

	</div>-->

<div id="page-wrapper">

		<div id="main-wrapper">

			<div id="main-content">

				<div class="title">
<table width="100%">
<tr><td>
<h3>View User</h3></td>
<td>
					<div align="right"><?php include("search1.php");?></div>
	</td></tr></table>
						
				</div>

					<?php 	if($rflag == "success")  { ?>

   	<div class="response-msg success ui-corner-all">

									<span>  <?php

  # Display the Result(Status) 

  if($rflag == "success") 

  { 

	  if($rType == "active")

	  	$rDisp	=	"User Status Successfully Actived";

	  elseif($rType == "deactive")

	  	$rDisp	=	"User  Status Successfully DeActived";

	  elseif($rType == "delete")

	  	$rDisp	=	"User  Deleted Successfully"; 

	 elseif($rType == "add")

		$rDisp	=	"User  Added Successfully"; 

	 elseif($rType == "edit")

		$rDisp	=	"User  Edited Successfully"; 
		
	elseif($rType == "level")

		$rDisp	=	"User Level Changed Successfully"; 
			
		
}

	echo $rDisp;

?></span>

			</div><?php }?>



				<div class="hastable">

					<form name="myform" class="pager-form" method="post" action="">

						<table> 

						<thead> 

						<?php if($total == 0) {  ?>

						<tr>

						  <td colspan="5" align="center">User List Not Found!</td>

						</tr>

						<?php }else { ?>

						<tr>

							<th width="40">S.No</th>

						    <th width="230">User Name</th> 
														
						    <th width="40">Action</th> 

						    <th width="40">Edit</th> 

						    <th width="40">Delete</th>

						  </tr> 

						</thead> 

						<tbody> 

					<?php

					$i=$offset;

					if($fetch_cat = mysql_fetch_array($R_Check1)){
					do {
					
                    $i++;
					?>

						<tr>

							<td><div align="center"><?php echo $i;?></div></td> 

						   <td>

						   		<div align="center"><?php echo ucfirst($fetch_cat['Username']);?>

								</div>
							</td> 
							

						    <td>

							<?php if($fetch_cat['varStatus'] == "Active") { ?>

							

                                 <a href="search.php?search=<?php echo $search; ?>&amp;flag=deactive&amp;cid=<?php echo $fetch_cat['intid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Active">

								<span class="ui-icon ui-icon-unlocked"></span></a>

                                

								<?php } else { ?>

                                <a href="search.php?search=<?php echo $search; ?>&amp;flag=active&amp;cid=<?php echo $fetch_cat['intid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Deactive">

								

								<span class="ui-icon ui-icon-locked"></span></a><?php } ?>

								</td>

								 

						    <td><a href="adduser.php?cid=<?php echo $fetch_cat['intid'];?>&level=<?php echo $fetch_cat['Firstname'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit this User">

							<span class="ui-icon ui-icon-pencil"></span>

							<!--	<img src="../../images/reply2.gif" border="0" title="Edit">-->

							</a></td> 

						    <td align="center"><a href="search.php?search=<?php echo $search; ?>&amp;flag=delete&amp;cid=<?php echo $fetch_cat['intid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete this User"><span class="ui-icon ui-icon-circle-close" onClick="return calldel('Do You Want to Delete this User?');"></span></a></td> 

					      </tr> 

						  <?php  
						   }while($fetch_cat = mysql_fetch_array($R_Check1)) ;
  
   }
  else 
  {
  ?>
  <tr><td colspan="5"><b>Sorry, no records were found!</b></td></tr>
  <?php } 
						  ?>

						</tbody>

						</table>

					</form>

					

					

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

								echo '<a href="search.php?search='.$search.'&page=' . ($page - 1) .'" class="linksnew">Prev</a>'; 

							}

							for ($i = 1; $i <= $pager->numPages; $i++) 

							{ 

								echo " | "; 

								if ($i == $pager->page)

								{ 

									echo "<span class='Hint1'>".$i."</span>"; 

								}

								else

								{	 

									echo '<a href="search.php?search='.$search.'&page='.$i.'" class="inksnew">'.$i.'</a>';

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

								echo  '<a href="search.php?search='.$search.'&page=' . ($page + 1) .  ' " class="linksnew">Next</a>';

							}

					}		

					?>    

	  </td>

  </tr>

  <?php
   }
   
   ?>

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

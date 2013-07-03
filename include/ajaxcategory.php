<?php 
/*****************************************************************************
 * Website: SHOPPING COMPARISON
 * Admin Main Page
 *developed on 11/02/2010
 ****************************************************************************/

	//Include Database Connection
	include("../../include/dbconnect.php");
	include("../../include/constants.php");
		//Include session
	include("../../include/session.php");
		//Include session
	include("../../include/functions.php");
	include("../../include/paging.php");
		//Include Editor
	include("../../fckeditor/fckeditor.php");
	
 	$categoryid=$_REQUEST['categoryid'];
echo'<option value="">Choose</option>';
										$select_cat = "SELECT * FROM ".ADDSUBCATEGORY." WHERE `catid`='$categoryid'";
										$result_cat = mysql_query($select_cat);
										while($fetch_cat= mysql_fetch_array($result_cat)){
										if($scatid == $fetch_cat['scid']) 
										{
										$selected = "SELECTED";
										} else {
										$selected = "";
										}
										?>
							<option value="<?php echo $fetch_cat['scid'];?>" <?php echo $selected;?>><?php echo $fetch_cat['subcatname'];?></option>
										<?php } ?>
										
										
									
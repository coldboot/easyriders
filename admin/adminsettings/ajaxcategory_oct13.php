<?php 
	include("../../include/dbconnect.php");
	include("../../include/constants.php");
		
 	extract($_GET);
	if($categoryid =="") echo'<option value="">Choose</option>';
	else echo'<option value="">Choose SubCategory</option>';
	$select_cat = "SELECT * FROM ".SUBCATEGORY." WHERE `catid`='$categoryid'";
	$result_cat = mysql_query($select_cat);
	while($fetch_cat= mysql_fetch_array($result_cat))
	{
		if($scatid == $fetch_cat['scid'])  $selected = "SELECTED";
		else $selected = "";
?>
	<option value="<?php echo $fetch_cat['scid'];?>" <?php echo $selected;?>><?php echo $fetch_cat['subcatname'];?></option>
<?php } ?>
										
										
									
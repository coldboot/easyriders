<?php 
	include("../../include/dbconnect.php");
	include("../../include/constants.php");
		
 	extract($_GET);
	if($categoryid =="") echo'<select id="scatid" name="scatid"><option value="">Choose</option>';
	else echo'<select name="scatid" id="scatid"><option value="">Choose SubCategory</option>';
	$select_cat = "SELECT * FROM ".SUBCATEGORY." WHERE `catid`='".$categoryid."'";
	$result_cat = mysql_query($select_cat);
	while($fetch_cat= mysql_fetch_array($result_cat))
	{
	if($scatid == $fetch_cat['scid'])  $selected = "SELECTED";
	else $selected = "";
	$fetch_cat2=$fetch_cat['subcatname'];
	$fetch_cat3=$fetch_cat['scid'];

	echo "<option value='".$fetch_cat3."'>".$fetch_cat2."</option>";
 } 
 	echo "</select>";
 ?>
										
										
									
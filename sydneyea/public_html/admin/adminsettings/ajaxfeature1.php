<?php 
	include("../../include/dbconnect.php");
	include("../../include/constants.php");
	extract($_GET);
	$sel_fea="SELECT * FROM ".SONGS." WHERE `feature`='true'";
	$res_fea=mysql_query($sel_fea) or die(mysql_error());
	$total=mysql_num_rows($res_fea);
	
	if($check=='true')
	{
		if($total == 8)
			echo "The Featured Products Limit Exceed";
		else
		{
			$upd_fea="UPDATE ".SONGS." SET `feature`='true' WHERE `suserid`='$proid'";
			mysql_query($upd_fea) or die("Update front : ".mysql_error());
			echo "Product Added In Featured List";
		}
	}	
	else
	{
		$upd_fea="UPDATE ".SONGS." SET `feature`='false' WHERE `suserid`='$proid'";
		mysql_query($upd_fea) or die("Update front : ".mysql_error());
		echo "Product Removed in Featured List";
	}	
?>
	
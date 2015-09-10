<?php 
	include("../../include/dbconnect.php");
	include("../../include/constants.php");
	extract($_GET);
	$sel_fea="SELECT * FROM ".SONGS." WHERE `front`='true'";
	$res_fea=mysql_query($sel_fea) or die(mysql_error());
	$total=mysql_num_rows($res_fea);
	
	if($check=='true')
	{
		if($total == 8)
			echo "The Front Pge Products Limit Exceed";
		else
		{
			$upd_fea="UPDATE ".SONGS." SET `front`='true' WHERE `suserid`='$proid'";
			mysql_query($upd_fea) or die("Update front : ".mysql_error());
			echo "Product Added In Front List";
		}
	}	
	else
	{
		$upd_fea="UPDATE ".SONGS." SET `front`='false' WHERE `suserid`='$proid'";
		mysql_query($upd_fea) or die("Update front : ".mysql_error());
		echo "Product Removed in Fornt List";
	}	
?>
	
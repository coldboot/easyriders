<?php 
	include("../../include/dbconnect.php");
	include("../../include/constants.php");
	extract($_GET);
	$sel_fea="SELECT * FROM ".REGISTER." WHERE `feestatus`='true'";
	$res_fea=mysql_query($sel_fea) or die(mysql_error());
	$total=mysql_num_rows($res_fea);
	
	if($check=='true')
	{
		
			$upd_fea="UPDATE ".REGISTER." SET `feestatus`='true' WHERE `Rid`='$proid'";
			mysql_query($upd_fea) or die("Update front : ".mysql_error());
			echo "Product Added In Featured List";
		
	}	
	else
	{
		$upd_fea="UPDATE ".REGISTER." SET `feestatus`='false' WHERE `Rid`='$proid'";
		mysql_query($upd_fea) or die("Update front : ".mysql_error());
		echo "Product Removed in Featured List";
	}	
?>
	
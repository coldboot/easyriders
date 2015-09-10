<?php 
	//include('header.php');
	include("include/dbconnect.php");
	include("include/constants.php");
	
	$selectqrycms="select * from ".CMS." where `varMode` ='aboutus'";
	$selqrycms=mysql_query($selectqrycms) or die("Error:".mysql_error());
	$fetchcms=mysql_fetch_array($selqrycms);
	$metatagDesc=$fetchcms['metatagDesc'];
	$varMetaTitle = $fetchcms['varMetaTitle'];
	$MetatagKey = $fetchcms['MetatagKey'];
	$txtStatement=$fetchcms['txtStatement'];
	$varHeading=$fetchcms['varHeading'];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $MetatagKey; ?>" />
<meta name="description" content="<?php echo $metatagDesc; ?>" />

<title>Welcome to Easy Riders-About Us</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon new.ico" type="image/x-icon">
<link rel="icon" href="/favicon new.ico" type="image/x-icon">
<script src="images/galleryscript.js" type="text/javascript"></script>

  <link id='theme' rel='stylesheet' href='/humane-themes/bold-dark.css'/>
      <script src='/humane.js'></script>


</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="images/midpage_top.png" width="998" height="20" /></td>
          </tr>
          <tr>
            <td class="page_mid"><table width="990" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="240" valign="top"><?php include("sidebar.php"); ?></td>
                <td width="20">&nbsp;</td>
                <td width="730" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                   <!-- <td class="head_big"><?php echo $fetchcms['varHeading'];?></td>-->
					
					    <td class="head_big"><span style="font-size: 20px; font-weight:bold;"><big><?php echo $fetchcms['varHeading'];?></big></span></td>
						
                  </tr>
				     <tr>
                                 <!-- <td><?php echo stripslashes($fetchcms['txtStatement']);?></td>-->
								  
								  
								  	 <td class="body_style"><?php echo stripslashes($fetchcms['txtStatement']);?></td>
                                </tr>
                
                  
                </table></td>
              </tr>
              
            </table></td>
          </tr>
          <tr>
            <td><img src="images/midpage_bottom.png" width="998" height="20" /></td>
          </tr>
        </table></td>
      </tr>
     
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>

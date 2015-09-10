<?php 
	//include('header.php');
	include("include/dbconnect.php");
	include("include/constants.php");
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Easy Riders-Maps</title>
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
                <td width="10">&nbsp;</td>
                <td width="700" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
				  
				   <?php 
		$sel_img=mysql_query("select * from tbl_cycling_adminprofile");
		$fet_img=mysql_fetch_array($sel_img);
		
		
		?>
				  
				  
<!--                    <td class="head_big"><? echo $fet_img['mapspage']; ?></td>
-->					<td class="head_big"><span style="font-size: 20px; font-weight:bold;"><big><?php echo $fet_img['mapspage'];?></big></span></td>
					
					
					
                  </tr>
                  <tr>
                    <td class="hea_small">&nbsp;</td>
                  </tr>
				  
				  	<?php
				 $sel_maps=mysql_query("select * from tbl_cycling_maps where `varstatus`='Active'");
				 while($fet_maps=mysql_fetch_array($sel_maps))
				 { 
				 ?>
                  <tr>
                    <td class="body_style_new_red"><?php echo $fet_maps['mapname']; ?></td>
					
					
                  </tr>
                  <tr>
                    <td class="body_style">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="body_style"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="8"><img src="images/side_1.png" width="8" height="8" /></td>
                          <td class="side_top"></td>
                          <td width="8"><img src="images/side_2.png" width="8" height="8" /></td>
                        </tr>
                        <tr>
                          <td width="8" class="side_left"></td>
                          <td align="center" bgcolor="#FFFFFF"><iframe width="680" height="350" frameborder="0" scrolling="No" marginheight="0" marginwidth="0" src="<?php echo $fet_maps['maplink']; ?>"></iframe>
                              <br />
                              <small>View <a href="<?php echo $fet_maps['maplarge']; ?>" style="color:#0000FF;text-align:left"><?php echo $fet_maps['mapname']; ?></a> in a larger map</small> </td>
                          <td width="8" class="side_right"></td>
                        </tr>
                        <tr>
                          <td width="8"><img src="images/side_3.png" width="8" height="8" /></td>
                          <td class="side_bottom"></td>
                          <td width="8"><img src="images/side_4.png" width="8" height="8" /></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td class="body_style">&nbsp;</td>
                  </tr>
               
                 <?php } ?>
              
              
                  <tr>
                    <td align="center"></td>
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

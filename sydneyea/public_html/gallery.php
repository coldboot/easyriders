<?php 
include("include/dbconnect.php");
include("include/constants.php"); 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Easy Riders-Gallery</title>
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
                <td width="250" valign="top"><?php include("sidebar.php"); ?></td>
                <td width="10">&nbsp;</td>
                <td width="730" valign="top">
                <?php 
		   $menu=$_GET['page'];
		   $gall=$_GET['gallery'];
		   if ($gall=="") { $gall = "MAIN"; }
                 ?>
                
                <!--<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="head_big">Gallery</td>
                  </tr>
                  
                                    <tr>
                                      <td class="body_style">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                       
                                        <tr>
                                          <td> 
										  <div id="dg-image-gallery" class="dg-image-gallery">

										  <?php
										  
										  $select="select * from tbl_cycling_category order by catid ASC";
										  $res=mysql_query($select);
										  $i=0;
										  while($fet=mysql_fetch_array($res))
										  { 
										  
?>
				 
	<div class="dg-image-gallery-image">						  
										
		<img class="dg-image-gallery-thumb" src="deimage1/<?php echo $fet['catimage'];?>">
		
		
		
		<span class="dg-image-gallery-caption bo"><span class="body_style"><?php echo $fet['catDescription'];?></span></span>
		<span class="dg-image-gallery-large-image-path">deimage1/<?php echo $fet['catlargeimage'];?></span>
	</div>
	
	


<?php $i++;} ?></div>

<script type="text/javascript">
var gallery = new DG.ImageGallery({
	el : 'dg-image-gallery',
	autoplay : {
		pause : 2
	}
});
</script>


</td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                        </tr>
                                      </table></td>
                          </tr>
               
                  
                  

                </table>-->
				
				
				<iframe frameborder="0" width="730" height="800" style="background-color:#FFFFFF;" src="/gallery-new.php?gallery=<?php echo $gall;?>"></iframe>
				
				</td>
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

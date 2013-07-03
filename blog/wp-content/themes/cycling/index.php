<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Easy Rider</title>
<link href="<?php bloginfo('template_directory'); ?>/images/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon new.ico" type="image/x-icon">
<link rel="icon" href="/favicon new.ico" type="image/x-icon">

<script src="/videos/scripts/ac_quicktime.js" language="JavaScript" type="text/javascript"></script>
<script src="/videos/scripts/qtp_library.js" language="JavaScript" type="text/javascript"></script>
<link href="/videos/stylesheets/qtp_library.css" rel="StyleSheet" type="text/css" />

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><a href="/"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" width="484" height="74" border="0" /></a></td>
            
           <td><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td><a href="/" class="a"><b>Home</b></a></td>
                <td width="10" align="center" class="white_text">|</td>
		<?php if( !is_user_logged_in() ){ ?>
               	   <td><a href="/blog/wp-login.php" class="a"><b>Login</b></a></td>
                <?php } ?>
		<?php if( is_user_logged_in() ){ ?>
                   <td><a href="/blog/?page_id=135" class="a"><b>Add Posts</b></a></td>
	  	<?php } ?>
              </tr>
            </table></td>
		  </tr>
		  
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#ebebeb"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="10" colspan="3"></td>
            </tr>
          <tr>
            <td width="715" valign="top">
			<?php include("content.php"); ?>  
			
			
			<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="box"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="5" colspan="3" align="center" ></td>
                            </tr>
                            <tr>
                              <td width="54" align="center" class="tag_bg white_text"><span class="black_text"><strong>May</strong></span><br />
                                  <strong>15</strong> </td>
                              <td class="head">&nbsp;&nbsp;Lorem Ipsumv</td>
                              <td align="right" class="body_text_gray">Posted by Aparna comments (4) </td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="234"><img src="<?php bloginfo('template_directory'); ?>/images/ima1.png" width="218" height="134" /></td>
                              <td class="body_text">Lorem ipsum dolor sit amet, consec tetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros.</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="right"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/readmore.png" width="83" height="28" border="0" /></a></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="5"></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border_box">
                            <tr>
                              <td height="30" class="small_text"><strong>Labels:</strong> Environment, Plants, Technology</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="box"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5" colspan="3" align="center" ></td>
                              </tr>
                              <tr>
                                <td width="54" align="center" class="tag_bg white_text"><span class="black_text"><strong>May</strong></span><br />
                                    <strong>15</strong> </td>
                                <td class="head">&nbsp;&nbsp;Lorem Ipsumv</td>
                                <td align="right" class="body_text_gray">Posted by Aparna comments (4) </td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="234"><img src="<?php bloginfo('template_directory'); ?>/images/ima1.png" width="218" height="134" /></td>
                                <td class="body_text">Lorem ipsum dolor sit amet, consec tetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros.</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td align="right"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/readmore.png" width="83" height="28" border="0" /></a></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="5"></td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border_box">
                              <tr>
                                <td height="30" class="small_text"><strong>Labels:</strong> Environment, Plants, Technology</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="box"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5" colspan="3" align="center" ></td>
                              </tr>
                              <tr>
                                <td width="54" align="center" class="tag_bg white_text"><span class="black_text"><strong>May</strong></span><br />
                                    <strong>15</strong> </td>
                                <td class="head">&nbsp;&nbsp;Lorem Ipsumv</td>
                                <td align="right" class="body_text_gray">Posted by Aparna comments (4) </td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="234"><img src="<?php bloginfo('template_directory'); ?>/images/ima1.png" width="218" height="134" /></td>
                                <td class="body_text">Lorem ipsum dolor sit amet, consec tetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros.</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td align="right"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/readmore.png" width="83" height="28" border="0" /></a></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="5"></td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border_box">
                              <tr>
                                <td height="30" class="small_text"><strong>Labels:</strong> Environment, Plants, Technology</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              
            </table>--></td>
            <td>&nbsp;</td>
            <td width="240" valign="top"><table width="240" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="yellow_box">
				
<?php include("sidebar.php"); ?>
				</td>
              </tr>
              
            </table></td>
          </tr>
          <tr>
            <td height="10" colspan="3"></td>
            </tr>
          
        </table></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td class="footer_bg">           <?php include("newfooter.php"); ?>
</td>
  </tr>
</table>
</body>
</html>

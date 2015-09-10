<table width="240" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left"><span class="head">&nbsp;&nbsp;Latest </span><span class="hea_small">Posts</span></td>
      </tr>
      <tr>
        <td>
          <?php 
          $sel = "SELECT * FROM `wp_posts` WHERE `post_type`='post' AND `post_status` = 'publish' order by post_date DESC limit 10";
          $res=mysql_query($sel);
          while($fett=mysql_fetch_array($res))
          { ?>
          <ul class="leftlist">
            <li><a href="/blog/?p=<?php echo $fett['ID']; ?>"><?php echo $fett['post_title']; ?></a></li>
          </ul>
          <?php } ?>
        </td>
      </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="8"><img src="images/side_1.png" width="8" height="8" /></td>
        <td class="side_top"></td>
        <td width="8"><img src="images/side_2.png" width="8" height="8" /></td>
      </tr>
      <tr>
        <td width="8" class="side_left"></td>
        <td bgcolor="#FFFFFF">
          <table width="100%" height="540px" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="header">
                <?php 
                  $sel_last="select * from tbl_cycling_membernew order by RAND() limit 0,1";
                  $res_last=mysql_query($sel_last);
                  $fetch_last=mysql_fetch_array($res_last);
                ?>
                <table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                 <td align="center" class="body_style_white"><strong>Featured Rider</strong></td>
                </tr>
                </table>
              </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
              <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                        <?php 
                          $sel_last="select * from tbl_cycling_membernew order by RAND()";
                          $res_last=mysql_query($sel_last);
                          $fetch_last=mysql_fetch_array($res_last);
                        ?>
                          <table>
                            <tr>
                              <td width="150" height="160" align="center" valign="top">
                                 <?php 
                                   $productimage=$fetch_last['productimage'];
                                   $path="deimage1/";
                                   $pathimage=$path.$productimage;
                                   list($width,$height)=getimagesize($pathimage);
                                   if($width>=140)  $width="140px";
                                   if($height>=150) $height="150px";
                                 ?>
                                 <img src="<?php echo $pathimage;?>" border="0" title="<?php echo $fetch['varFirstname'];?>" alt="<?php echo $productimage;?>" width="<?php echo $width;?>" height="<?php echo $height;?>"/>
                              </td>
                            </tr>
                            <tr>
                               <td valign="top" align="left">
                                 <span class="body_style"><b>Ride Name : </b></span><br />
                                 <span class="body_style"><?php echo $fetch_last['varRidename']; ?> </span>
                               </td>
                            </tr>
                            <tr>
                               <td valign="top" align="left">
                                 <span class="body_style"><b>Type of Bike : </b></span><br />
                                 <span class="body_style"><?php echo substr($fetch_last['varbiketype'],0,40); ?></span>
                               </td>
                            </tr>
                            <tr>
                               <td valign="top" align="left">
                                 <span class="body_style"><b>Biography : </b></span><br />
                                 <span class="body_style"><?php echo substr($fetch_last['varbiography'],0,200); ?></span>
                               </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <a href="profile.php?intmemberid=<?php echo $fetch_last['intmemberid']; ?>"><img src="images/READMORE.png" width="99" height="26" border="0" /></a>
                              </td>
                            </tr>
                          </table>
                  </td>
                </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
        </td>
        <td width="8" class="side_right"></td>
      </tr>
      <tr>
        <td width="8"><img src="images/side_3.png" width="8" height="8" /></td>
        <td class="side_bottom"></td>
        <td width="8"><img src="images/side_4.png" width="8" height="8" /></td>
      </tr>
      </table>
    </td>
  </tr>
</table>
    
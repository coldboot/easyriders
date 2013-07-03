<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="6"></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="365"><a href="index.php"><img src="images/logo.png" width="365" height="52" border="0"  alt="" title=""/></a></td>
        </tr>
      </table></td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><table width="150" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="11"><img src="images/box1.png" width="11" height="13" /></td>
                            <td class="midbox5"></td>
                            <td><img src="images/box2.png" width="11" height="13" /></td>
                          </tr>
                          <tr>
                            <td class="midbox7"></td>
                            <td bgcolor="#112027">
							<?php $sel_admin="select * from tbl_gigband_adminprofile";
								$res_admin=mysql_query($sel_admin);
								$fet_admin=mysql_fetch_array($res_admin);
							echo stripslashes($shoutcast=$fet_admin['shoutcast']);
								
								?>
							<!--<script type="text/javascript" src="http://player.wavestreamer.com/cgi-bin/swf.js?id=S3NDDGECYO8GV6F4"></script>
							<script type="text/javascript" src="http://player.wavestreaming.com/?id=S3NDDGECYO8GV6F4"></script>-->
							<!--<embed src='http://www.shoutcast.com/media/popupPlayer_V19.swf?stationid=http://yp.shoutcast.com/sbin/tunein-station.pls?id=1756658&play_status=1' quality='high' bgcolor='#ffffff' width='290' height='50' name='popupPlayer_V19' align='middle' allowScriptAccess='always' allowFullScreen='true' type='application/x-shockwave-flash' pluginspage='http://www.adobe.com/go/getflashplayer' ></embed>-->
							<!--<object type="application/x-shockwave-flash" data="dewplayer-playlist.swf" id="dewplayerpls" name="dewplayerpls" height="50" width="240">
              <param name="movie" value="dewplayer-playlist.swf" />
              <param value="xml=new.xml" name="flashvars" />
            </object>-->
			
			</td>
                            <td class="midbox8"></td>
                          </tr>
                          <tr>
                            <td><img src="images/box3.png" width="11" height="13" /></td>
                            <td class="midbox6"></td>
                            <td width="11"><img src="images/box4.png" width="11" height="13" /></td>
                          </tr>
                        </table></td>
        </tr>
      </table></td>
    <td valign="top"><form action="searchresults.php" name="search" enctype="multipart/form-data">
        <table width="100" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="304" border="0" align="center" cellpadding="0" cellspacing="0" class="box">
                <tr>
                  <td width="54" class="body_style">Search</td>
                  <td width="193"><input name="textfield" type="text" class="text_filed" id="textfield" /></td>
                  <td width="56" align="left"><input name="image" type="image"  title="" src="images/go.png" alt="" width="40" height="22" border="0"/></td>
                </tr>
                <tr>
                  <td colspan="3" class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <!--<tr>
                        <td width="32"><img src="images/shopping_cart.png" width="30" height="26" /></td>
                        <td>Now Your Cart IS 0 items</td>
                      </tr>-->
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table>
      </form></td>
  </tr>
  <tr>
    <td colspan="3" valign="bottom" height="50"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div id="menu1">
              <ul>
                <li><a href="index.php" class="current"> Home</a></li>
                <li><a href="i-need-music.php" > I&nbsp;need&nbsp;music </a></li>
                <li><a href="i-offer-music.php">I&nbsp;offer&nbsp;music </a></li>
                <!-- <li><a href="labels-and-publishers.php">Labels&nbsp;&&nbsp;publishers</a></li>-->
                <li><a href="play-list.php">Play&nbsp;Lists</a></li>
              </ul>
            </div></td>
          <td align="left"  style="color:#FFFFFF;"><?php 

																										//echo $_SESSION["Session_Username"]; break;

																										@session_start();

																										 if($_SESSION['yemailid']!=""){

																											$id=$_SESSION['yemailid'];

																											//echo $id; break;

																											

                                                        // $intid=base64_decode($_GET['uemail']);

                                                         $sel="select * from `tbl_gigband_register1` where `email`='$id'";

														 

                               $res=mysql_query($sel)or die("error".mysql_error());

							   

                             $fetch=mysql_fetch_array($res);

							// echo $fetch['username']; break;

							 

							 							 

                                                       ?>
            <?php echo $fetch['username'];?><a href="index.php" style="color:#FFFFFF;">
            <?php }else

													    {

													   echo '<a href="index.php" style="color:#FFFFFF;">'."login";

													   }?>
            </a> |
            <?php if($_SESSION["Session_Username"]!=""){?>
            <a href="logout.php" style="color:#FFFFFF;">logout</a>
            <?php }?>
            <?php if($_SESSION["Session_Username"]==""){?>
            <a href="form.php" style="color:#FFFFFF;">Sign up</a>
            <?php }?>
          </td>
		  <td width="40%"></td>
        </tr>
      </table></td>
  </tr>
</table>
</td>
</tr>
<tr>

          <td height="282" valign="top" class="top_banner"><table width="460" border="0" align="left" cellpadding="0" cellspacing="0">

              <tr>

                <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td>&nbsp;</td>

                    </tr>

                    <tr>

                      <td>&nbsp;</td>

                    </tr>

                    <tr>

                      <td valign="top" class="top_box1"><table width="190" border="0" align="center" cellpadding="0" cellspacing="0">

                          <tr>

                            <td height="5" colspan="2" valign="middle" class="small_head"></td>

                          </tr>

                          <tr>

                            <td colspan="2" valign="middle" class="small_head">Looking for music to licence</td>

                          </tr>

                          <tr>

                            <td colspan="2">&nbsp;</td>

                          </tr>

                          <tr>

                            <td colspan="2" class="body_style">Licence music for your TV, Documentary, Film, Advert, Mobile, Website, etc. Search here and find the music you want to license right now.</td>

                          </tr>

                          <tr>

                            <td colspan="2" height="50">&nbsp;</td>

                          </tr>                          

                          <tr>

                            <td class="small_head">Find music</td>

                            <td align="right"><img src="images/arrow.png" width="19" height="18" /></td>

                          </tr>

                        </table></td>

                    </tr>

                  </table></td>

                <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td valign="top">&nbsp;</td>

                    </tr>

                    <tr>

                      <td valign="top">&nbsp;</td>

                    </tr>

                    <tr>

                      <td valign="top" class="top_box2"><table width="190" border="0" align="center" cellpadding="0" cellspacing="0">

                          <tr>

                            <td height="5" colspan="2" valign="middle" class="small_head"></td>

                          </tr>

                          <tr>

                            <td colspan="2" valign="middle" class="small_head">Want to licence your music</td>

                          </tr>

                          <tr>

                            <td colspan="2">&nbsp;</td>

                          </tr>

                          <tr>

                            <td colspan="2" class="body_style1">Whether your a Band,Artists, Songwriter, Label , if you are the owner of the copyright to your music, you can join free now and start earning money licencing your music.</td>

                          </tr>

                          <tr>

                            <td colspan="2" height="30">&nbsp;</td>

                          </tr>  

                          <tr>

                            <td class="small_head">Find Music</td>

                            <td align="right"><img src="images/arrow.png" width="19" height="18" /></td>

                          </tr>

                          <tr>

                            <td colspan="2">&nbsp;</td>

                          </tr>

                        </table></td>

                    </tr>

                  </table></td>

              </tr>
</table>

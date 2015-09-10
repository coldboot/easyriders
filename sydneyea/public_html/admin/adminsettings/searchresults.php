<?php 

include("include/dbconnect.php");
include("include/constants.php");


	$SortBy	= $_REQUEST['sortby'];
    
  	
	if(($SortBy == "") || ($SortBy == "all")) { echo $SortList = ""; } else { $SortList = $SortBy; }

 	
/*	$pagqry="SELECT * FROM ".SONGS." WHERE `title` LIKE '$SortList%'";
	$R_Check	= mysql_query($pagqry) or die(mysql_error());
	$C_Check	= mysql_num_rows($R_Check);
	$total		= mysql_num_rows($R_Check);	
	*/

 	  $limqry		= "SELECT * FROM ".SONGS." WHERE `title` LIKE '$SortList%' order by suserid ASC";
	$R_Check1	= mysql_query($limqry);
	  $total= mysql_num_rows($R_Check1);	 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="135" valign="top" class="top_bg"><?php include("header.php"); ?><!--<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="365"><a href="../../demoyoulicense/demo1/index.html"><img src="../../demoyoulicense/demo1/images/logo.png" width="365" height="52" border="0"  alt="" title=""/></a></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                <td valign="top"><table width="100" border="0" align="right" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                    <tr>
                      <td><table width="304" border="0" align="center" cellpadding="0" cellspacing="0" class="box">
                          <tr>
                            <td width="54" class="body_style">Search</td>
                            <td width="193"><input name="textfield" type="text" class="text_filed" id="textfield" /></td>
                            <td width="56" align="left"><a href="#"><img src="../../demoyoulicense/demo1/images/go.png" width="40" height="22" border="0"  title="" alt=""/></a></td>
                          </tr>
                          <tr>
                            <td colspan="3" class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="32"><img src="../../demoyoulicense/demo1/images/shopping_cart.png" width="30" height="26" /></td>
                                  <td>Now Your Cart IS 0 items</td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td colspan="2" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><div id="menu1">
                          <ul>
                            <li><a href="../../demoyoulicense/demo1/index.html" class="current"> Home</a></li>
                            <li><a href="#"> I&nbsp;need&nbsp;music </a></li>
                            <li><a href="#">I&nbsp;offern&nbsp;music </a></li>
                            <li><a href="#">Labels&nbsp;&&nbsp;publishers</a></li>
                            <li><a href="#">Play&nbsp;Lists</a></li>
                          </ul>
                        </div></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
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
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td class="small_head">Find music</td>
                            <td align="right"><img src="../../demoyoulicense/demo1/images/arrow.png" width="19" height="18" /></td>
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
                            <td  colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="26" colspan="2"></td>
                          </tr>
                          <tr>
                            <td class="small_head">Find Music</td>
                            <td align="right"><img src="../../demoyoulicense/demo1/images/arrow.png" width="19" height="18" /></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
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
		
		-->
		
		
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center"></td>
              </tr>
              <tr>
                <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="217" valign="top"><table width="217" border="0" align="right" cellpadding="0" cellspacing="0">
                          <tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td class="left_top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="30"><img src="images/icon1.png" width="25" height="28" /></td>
                                      <td class="small_head">My account</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td valign="top" bgcolor="#1a3340"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="5"></td>
                                    </tr>
                                    <tr>
                                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td class="box1"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td class="categorylist"><ul>
                                                     <li><a href="details.php">My Details</a></li>
                                                        <li><a href="company.php">Company Information</a></li>
                                                        <li><a href="artists.php">My Artists</a></li>
                                                        <li><a href="viewcart1.php">My Albums</a></li>
                                                        <li><a href="change.php">Change Password</a></li>
                                                        <li><a href="password.php">Password Reminder</a></li>
                                                        <li><a href="feedback.php">Feedback</a></li>
                                                        <li><a href="contracts.php">My Contracts</a></li>
                                                        <li><a href="billingdetails.php">Billing Details</a></li>
                                                        <li><a href="newflash.php">Newsflash</a></li>
                                                        <li><a href="subscription.php">My Subscription</a></li>
                                                        <li><a href="mp3sales.php">MP3 Sales Report</a></li>
                                                        
                                                  </ul></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td height="10"></td>
                                    </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      <td width="15">&nbsp;</td>
                      <td width="750" valign="top"><!--paly list start -->
                        <table width="760" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="images/icon1.png" width="25" height="28" alt="" title="" style="vertical-align:middle;" />Search</td>
                                  <td width="300" align="right" style="padding-right:10px;">&nbsp;</td>
                                </tr>
                              </table></td>
                          </tr>
                          
						  
						  
                          <tr>
                            <td valign="top"><table width="90%" border="0" align="center" cellpadding="1" cellspacing="0">
							<form action="" method="post" name="sea">
                              <tr>
                                <td class="body_style6"></td>
                                </tr>
								<tr>
								<td align="left" style="color:#FFFFFF">
	 					<b>Search : <!--	<td width="2%">&nbsp;	</td>
-->	
		<input type="text" class="inputbox1" name="sortby">	
		<input type="submit" value="search" name="submit">	</td>
		
		</tr></form>
		
		<tr><td>&nbsp;</td></tr>
				
		  <tr>
           <td colspan="8" align="left">
					   <?php
						echo "<a class=\"leftlinks\" href=\"searchresults.php?sortby=all\">All</a>";?>
									  &nbsp;&nbsp;&nbsp;
									  <?php 		for($ASCII = 65; $ASCII <= 90 ; $ASCII++)
						{				
						  echo "<a class=\"leftlinks\" href=\"searchresults.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";
						}	
					 ?>		 	</td>
  </tr>
	
		<!--
                              <tr>
                                <td class="body_style6">Artist profiles remaining: 0  <a href="#" class="click"><strong>Need more artist profiles? </strong></a></td>
                              </tr>-->
							  <tr><td>&nbsp;</td></tr>
                              <tr>
                                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="body_style6">
								
								
									<? if ($total==0)
					 {
                    echo('<tr><td colspan="4" align="center"><strong><span class = "red">List Not Found!</span></strong></td></tr>');
                    }
                     else
                     {
                    echo ('
                     <tr>
						              <th width="50" align="center">S.NO</th>
                                    <th width="204" align="center">SONG NAME</th>
                                    <th width="204" align="center">CREATOR</th>
                                    <th width="150" align="center">ALBUM</th>
									<th width="150" align="center">LICENSE</th>
									

						    </tr> ');

                           }
                    ?>
							
					
				                                 
								 
								 <?php
					$i=0 ;
					while($fetch_cat = mysql_fetch_array($R_Check1)){
											  $i++;

					?>
								 
								 
								 <tr>
								    <td align="left" width="100px;"><center><?php echo $i;?></center></td>
                                    <td align="center" width="100px;"><?php echo $fetch_cat['title'];?></td>
									   <td align="center" width="100px;"><?php echo $fetch_cat['creator'];?></td>
                                   <td align="center" width="100px;"><?php echo $fetch_cat['album'];?></td>
                                 
								   <td align="center" width="100px;"><a href="license.php?suserid=<?php echo $fetch_cat['suserid'];?>">License</a></td>
 
                                   <!-- <td align="center" valign="top">[<a href="#" class="click">View Artist Profile</a>]<br />
                                      <a href="#" class="click">[Edit Artist]</a><br />
                                      <a href="#" class="click">[Get the Widget]</a><br />
                                      <a href="#" class="click">[Promote Artist]</a><br />
                                      <a href="#" class="click">[Change Song Order]</a><br />
                                      <a href="#" class="click">[Newsflash]</a><br />
                                      <a href="#" class="click">[License History]</a><br />
                                      <a href="#" class="click">[Albums]</a><br />
                                      <a href="#" class="click">[Delete]</a></td>-->
                                  </tr>
								  
								  <?php } ?>
                                </table></td>
                              </tr>
                              <tr>
                                <td class="body_style6">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="body_style6">&nbsp;</td>
                              </tr>
                              
                              
                            </table></td>
                          </tr>
                        </table>
                        <!--paly list end -->
                      </td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php include("footer.php"); ?><!--<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="box3">
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center"></td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
              </tr>
              <td align="center"><span class="click"><a href="../../demoyoulicense/demo1/about.html" class="click">About </a>|</span><a href="../../demoyoulicense/demo1/contact.html" class="click"> Contact  |</a> <a href="../../demoyoulicense/demo1/blog.html" class="click">Blog</a> <a href="../../demoyoulicense/demo1/testimonials.html" class="click">| <span class="click">Testimonials </span></a><a href="../../demoyoulicense/demo1/contactus.html" class="click"> </a><a href="../../demoyoulicense/demo1/contact.html" class="click"> | </a><a href="../../demoyoulicense/demo1/partners.html" class="click">Partners | </a><a href="../../demoyoulicense/demo1/team.html" class="click">Team | </a><a href="../../demoyoulicense/demo1/privacypolicy.html" class="click">Privacy Policy | </a><a href="../../demoyoulicense/demo1/upgrade.html" class="click">Upgrade |</a><a href="#" class="click"> |Twitter </a></td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" class="footer_text">Copyright &copy; 2010 GigBand.com .  All rights reserved. / <a href="../../demoyoulicense/demo1/terms-and-conditions.html">Terms and Conditions</a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>--></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>

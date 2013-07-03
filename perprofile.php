<?php

include("include/dbconnect.php");
include("include/constants.php");

if ($userid == "")
{
	$flag="notloggedin";
}
else
{
	$sel_dis_page=mysql_query("select * from tbl_cycling_membernew where `intmemberid`='$userid'");
	$fet_dis_page=mysql_fetch_array($sel_dis_page);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
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
                    <td class="head_big"><span style="font-size: 20px; font-weight:bold;"><big>Profile</big></span></td>





                  </tr>
                      <?php if($flag=="notloggedin"){?>
								<tr>
									<td colspan="2" align="center" style="color:#FF0000; font-weight:bold; font-size:18px;">You must be logged in to View Profile</td>
								</tr>
						<?php } ?>
								<tr><td>&nbsp;</td></tr>


						   <tr>
                                      <td align="right" ><a href="editprofile.php" style=""><img src="images/edit_profile.png" width="91" height="29" border="0" /></a></td>
                          </tr>
                                    <tr>
                                      <td class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                        <tr>
                                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td valign="top">&nbsp;</td>
                                              <td valign="top">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="115" valign="top"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td width="8"><img src="images/side_1.png" width="8" height="8" /></td>
                                                  <td class="side_top"></td>
                                                  <td width="8"><img src="images/side_2.png" width="8" height="8" /></td>
                                                </tr>
                                                <tr>
                                                  <td width="8" class="side_left"></td>
                                                  <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td>

														<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td>&nbsp;</td>
                                                          </tr>
                                                          <tr>
                                                            <td align="center"><img src="deimage1/<?php echo $fet_dis_page['productimage'];?>" width="140" height="150"  class="img_border" title="<?php echo $fet_dis_page['varRidename'];?>" alt="<?php echo $fet_dis_page['productimage'];?>"/></td>





													                                                          </tr>
                                                          <tr>
                                                            <td align="center"><?php echo ucfirst($fet_dis_page['varFirstname']);?></td>
                                                          </tr>
                                                        </table></td>
                                                    </tr>
                                                      <tr>
                                                        <td align="center">&nbsp;</td>
                                                      </tr>
                                                  </table></td>
                                                  <td width="8" class="side_right"></td>
                                                </tr>
                                                <tr>
                                                  <td width="8"><img src="images/side_3.png" width="8" height="8" /></td>
                                                  <td class="side_bottom"></td>
                                                  <td width="8"><img src="images/side_4.png" width="8" height="8" /></td>
                                                </tr>
                                              </table></td>
                                              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                <tr>
                                                  <td><table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td width="8"><img src="images/side_1.png" width="8" height="8" /></td>
                                                      <td class="side_top"></td>
                                                      <td width="8"><img src="images/side_2.png" width="8" height="8" /></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="8" class="side_left"></td>
                                                      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">

																<tr>
                                                                <td class="bodty_text"><strong>First Name</strong></td>
                                                                <td><?php echo $fet_dis_page['varFirstname'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong>Last Name</strong></td>
                                                                <td><?php echo $fet_dis_page['varLastname'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong>Ride Name</strong></td>
                                                                <td><?php echo $fet_dis_page['varRidename'];?>                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td class="body_style6"><strong class="bodty_text">E-mail address</strong></td>
                                                                <td><?php echo $fet_dis_page['varEmail'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong>Username</strong></td>
                                                                <td><?php echo $fet_dis_page['varUsername'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="body_style6"><strong class="bodty_text">Password</strong></td>
                                                                <td><?php echo $fet_dis_page['varPassword'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong>Mobile Number</strong></td>
                                                                <td><?php echo $fet_dis_page['varPhone'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong> How Long Riding</strong></td>
                                                                <td><?php echo $fet_dis_page['varridingtime'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong>How Often Rides Per Week</strong></td>
                                                                <td><?php echo $fet_dis_page['varoftenrides'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong>Type of Bike</strong></td>
                                                                <td><?php echo $fet_dis_page['varbiketype'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong>Biography</strong></td>
                                                                <td><?php echo $fet_dis_page['varbiography'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong>Insurance</strong></td>
                                                                <td><?php echo $fet_dis_page['varInsurance'];?>&nbsp;<?php echo $fet_dis_page['varInsuranceOther'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong>Accepted Terms</strong></td>
                                                                <td><?php echo $fet_dis_page['varAcceptTerms']." ".$fet_dis_page['varAcceptTermsDate'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong>Paid</strong></td>
                                                                <td><?php echo $fet_dis_page['varPaid']." ".$fet_dis_page['varPaidDate'];?></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="bodty_text"><strong>Member Number</strong></td>
                                                                <td><?php echo $fet_dis_page['intmemberid']?></td>
                                                              </tr>
                                                            </table></td>
                                                          </tr>
                                                          <tr>
                                                            <td align="center">&nbsp;</td>
                                                          </tr>
                                                      </table></td>
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
                                                  <td>&nbsp;</td>
                                                </tr>

                                              </table></td>
                                            </tr>
                                          </table></td>
                                        </tr>





                                      </table></td>
                          </tr>
                  <tr>
                    <td align="center"></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                  </tr>
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

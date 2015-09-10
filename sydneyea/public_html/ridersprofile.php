<?php

 include("include/dbconnect.php");

include("include/constants.php");

$intmemberid=$_REQUEST['userid'];

  



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Welcome to Easy Riders-Featured Rider</title>

<link href="images/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon new.ico" type="image/x-icon">
<link rel="icon" href="/favicon new.ico" type="image/x-icon">
<script src="images/galleryscript.js" type="text/javascript"></script>

  <link id='theme' rel='stylesheet' href='/humane-themes/bold-dark.css'/>
      <script src='/humane.js'></script>


<script type="text/javascript">

<!--

function MM_preloadImages() { //v3.0

  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();

    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)

    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}

function MM_swapImgRestore() { //v3.0

  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}

function MM_findObj(n, d) { //v4.01

  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {

    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}

  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];

  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);

  if(!x && d.getElementById) x=d.getElementById(n); return x;

}



function MM_swapImage() { //v3.0

  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)

   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}

//-->

</script>


</head>



<body onload="MM_preloadImages('images/submit1.png','images/cancel2.png')">

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

                    <td class="head_big"><span style="font-size: 20px; font-weight:bold;"><big>Rider's Profile</big></span></td>


	
                  </tr>

                  

                                    <tr>

                                     <!-- <td align="right" ><a href="#"><img src="images/edit_profile.png" width="91" height="29" border="0" /></a></td>-->

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

                                                  <td width="8" class=""></td>

                                                  <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                      <tr>

                                                        <td>

														

													<?php

												$sel="select * from tbl_cycling_membernew where `intmemberid`='$intmemberid'";  

															$res=mysql_query($sel);

															$fetch=mysql_fetch_array($res);

														?>

														

														

														<table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                          <tr>

                                                            <td>&nbsp;</td>		

                                                          </tr>

                                                          <tr>


   
										 
								<td width="150" height="160" align="center" valign="top">
								  <?php 
								   $productimage=$fetch['productimage'];
								   $path="deimage1/";
								   $pathimage=$path.$productimage;
								   list($width,$height)=getimagesize($pathimage);
								   if($width>=140)  $width="140px";
								   if($height>=150) $height="150px";
								  ?>
								  <img src="<?php echo $pathimage;?>" title="<?php echo $fetch['varFirstname'];?>" alt="<?php echo $productimage;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" class="img_border"/>
								</td>
													                                                          </tr>

                                                          <tr>

                                                            <td align="center"><?php echo $fetch['varFirstname'];?></td>

                                                          </tr>

                                                        </table></td>

                                                    </tr>

                                                      <tr>

                                                        <td align="center">&nbsp;</td>

                                                      </tr>

                                                  </table></td>

                                                  <td width="8" class=""></td>

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

                                                                <td class="bodty_text" width="200px"><strong>First Name</strong></td>

                                                                <td><?php echo $fetch['varFirstname'];?></td>

                                                              </tr>

															  <tr><td>&nbsp;</td></tr>

                                                              <tr>

                                                                <td class="bodty_text" width="200px"> <strong>Last Name</strong></td>

                                                                <td><?php echo $fetch['varLastname'];?></td>

                                                              </tr>

														  <tr><td>&nbsp;</td></tr>

                                                              <tr>

                                                                <td class="bodty_text" width="200px"><strong>Ride Name</strong></td>

                                                                <td><?php echo $fetch['varRidename'];?>                                                                </td>

                                                              </tr>

														  <tr><td>&nbsp;</td></tr>

                                                              <tr>

                                                                <td class="bodty_text" width="200px"><strong> How Long Riding(Years)</strong></td>

                                                                <td><?php echo $fetch['varridingtime'];?></td>

                                                              </tr>

															  	<tr><td>&nbsp;</td></tr>

															  

                                                              <tr>

                                                                <td class="bodty_text" width="200px"><strong>How Often Rides Per Week</strong></td>

                                                                <td><?php echo $fetch['varoftenrides'];?></td>

                                                              </tr>

															   	<tr><td>&nbsp;</td></tr>

															  

                                                              <tr>

                                                                <td class="bodty_text" width="200px"><strong>Type of Bike</strong></td>

                                                                <td><?php echo $fetch['varbiketype'];?></td>

                                                              </tr>

															  <tr><td>&nbsp;</td></tr>

															  

                                                              <tr>

                                                                <td class="bodty_text" width="200px"><strong>Biography</strong></td>

                                                                <td><?php echo $fetch['varbiography'];?></td>

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


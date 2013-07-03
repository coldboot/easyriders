<?php

 include("include/dbconnect.php");
	include("include/constants.php");
	include("include/paging.php");
    include("include/functions.php");


	$pagqry="select * from tbl_cycling_membernew WHERE `activeid`='yes'";
	$R_Check	= mysql_query($pagqry) or die(mysql_error());
	$C_Check	= mysql_num_rows($R_Check);
	$total		= mysql_num_rows($R_Check);
	//echo $total; break;
	$page = $_GET['page'];
	$limit = $Fetch['intRows'];
	$limit = 10;
	$pager  = getPagerData($total, $limit, $page);
	$offset = $pager->offset;
	$limit  = $pager->limit;
	$page   = $pager->page;

 	$limqry		= "select * from tbl_cycling_membernew WHERE `activeid`='yes' order by intmemberid DESC  limit $offset,$limit ";
	$R_Check1	= mysql_query($limqry);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Easy Riders-Riders</title>
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


					<td class="head_big"><span style="font-size: 20px; font-weight:bold;"><big><?php echo $fet_img['riderspage'];?></big></span></td>




<!--                    <td class="head_big">Riders</td>
-->                  </tr>

                                    <tr>
                                      <td class="body_style">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td>
										  <?php





  				  					$i=$offset ;
					   while($fetch=mysql_fetch_array($R_Check1))

					{


								 $i++;
										 ?>



										  <table width="100%" border="0" cellspacing="0" cellpadding="0">
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



                                              <td valign="top"><table width="98%" border="0" align="right" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td><b><?php echo ucfirst($fetch['varRidename']);?></b><br />
                                                  <?php echo ucfirst($fetch['varFirstname']);?>&nbsp;<?php echo ucfirst($fetch['varLastname']);?><br />
                                                  <?php echo ucfirst($fetch['varbiography']);?></td>
                                                </tr>
                                                <tr>
                                                  <td align="right"><a href="ridersprofile.php?userid=<?php echo $fetch['intmemberid']; ?>"><img src="images/READMORE.png" width="99" height="26" border="0" /></a></td>
                                                </tr>

                                              </table></td>
                                            </tr>
                                            <tr>
                                              <td colspan="2" valign="top" class="img_border_new">&nbsp;</td>
                                            </tr>
                                          </table>



										  <?php } ?></td>
                                        </tr>

                                            <?php if($limit < $total) { ?>

							  <tr><td>
							  <?php
					if($limit < $total)
					{
					echo'<table width="100%"  border="0" align="left" cellpadding="3" cellspacing="3">
          <tr>
            <td width="97%" align="center" class="test">';
							if ($page == 1)
							{
								echo "";
							}
							else
							{
								echo "<a href=\"riders.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='a'>Prev</a>";
							}
							for ($i = 1; $i <= $pager->numPages; $i++)
							{
								echo " | ";
								if ($i == $pager->page)
								{
									echo "<span class='Hint1'>"."$i"."</span>";
								}
								else
								{
									echo "<a href=\"riders.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>";
								}
							}

							if ($i > 1)
							{
								echo " | ";
							}
							if ($page == $pager->numPages)
							{
								echo "";
							}
							else
							{
								echo "<a href=\"riders.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='a'>Next</a>";
							}
					}	echo'</td>
  </tr>
</table>';
					?>  </td></tr> <?php } ?>


                                      </table>



									  </td>
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

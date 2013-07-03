<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="129" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="484"><a href="index.php"><img src="images/logo.png" width="484" height="74" border="0" /></a></td>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>




				<td align="right">
				 <?php
	   @$sess=$_SESSION["Session_UserId1"];
	  ?>
				  <?php



				   if($sess!=""){


						    $userid=$_SESSION["Session_UserId1"];
                            // $intid=base64_decode($_GET['uemail']);
                            $sel="select * from `tbl_cycling_membernew` where `intmemberid`='$userid'";
							$res=mysql_query($sel)or die("error".mysql_error());
							$fetch=mysql_fetch_array($res);
							$curuser=$fetch['varRidename'];
							 ?>
						  <font color="#FFFFFF" style="font-size:12px;"><a href="perprofile.php?id=<?php echo $fetch['intmemberid']; ?>" style="text-decoration:none; color:#FF0000;"><b>Welcome! &nbsp;<?php echo $curuser;?></a><?php }?></font>

						<?php if($sess!=""){?>
						<a href="logout.php" style="color:#FFFFFF; font-size:12px; text-decoration:none;">,Logout&nbsp;&nbsp;

					</b></a><?php }?>
                  <table border="0" align="right" cellpadding="0" cellspacing="0">

                  <tr>
                    <td><a href="http://www.facebook.com/groups/148883881800393/"><img src="images/facebook.png" width="28" height="29" border="0" /></a></td>

                  </tr>
                </table></td>
              </tr>

              <tr>

                <td align="right">
				 <?php
										   $sel_bann="select * from tbl_cycling_banner where `varStatus`='Active' order by RAND() limit 0,1";
										   $res_bann=mysql_query($sel_bann);
										   while($fetch_bann=mysql_fetch_array($res_bann))
										   { ?>

				<a href="<?php echo $fetch_bann['varlink']; ?>" style="text-decoration:none;"><img src="deimage1/<?php echo $fetch_bann['varBannerimage'];?>" width="468" height="60" border="0"/></a>
				<?php } ?>





				</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
	  <?php
	  @$menu=$_GET['page'];
	  ?>
      <tr>
        <td height="46"><div class="cssmenu">
            <ul>

              <li <?php if($menu=="") { ?> class="current" <?php } ?>><a href="index.php" ><span>Home</span></a></li>
	      <li <?php if($menu=="about") { ?> class="current" <?php } ?>><a href="about.php?page=about" ><span>About&nbsp;Us</span></a></li>
              <li <?php if($menu=="routes") { ?> class="current" <?php } ?>><a href="#"><span>Routes</span></a>
                <ul>
				   <?
					$select=mysql_query("select * from tbl_cycling_page where status = 'Active' and pagetype = 'route' order by title");
					while($fetch=mysql_fetch_array($select)) {
				   ?>
					   <li><a href="pages.php?page=routes&pageid=<? echo $fetch['pageid']; ?>"><span><? echo ucfirst($fetch['title']);?> </span></a></li>
				   <? } ?>
				</ul>
			  </li>

              <li <?php if($menu=="calendar") { ?> class="current" <?php } ?>><a href="calendar.php?page=calendar" ><span>Calendar </span></a></li>
              <li <?php if($menu=="gallery") { ?> class="current" <?php } ?>><a href="gallery.php?page=gallery" ><span>Gallery</span></a>
                <ul>
				   <?
					$select=mysql_query("select * from tbl_cycling_galleries where varStatus ='Active'");
					while($fetch=mysql_fetch_array($select)) {
				   ?>
					  <li><a href="gallery.php?page=gallery&gallery=<? echo $fetch['varGallery']; ?>"><? echo $fetch['varDescription']; ?></a></li>
				   <? } ?>
				</ul>
              </li>
              <li <?php if($menu=="contact") { ?> class="current" <?php } ?>><a href="contact.php?page=contact"  <span>Contact&nbsp;Us </span></a></li>

              <li <?php if($menu=="riders") { ?> class="current" <?php } ?>><a href="riders.php?page=riders" ><span>Riders</span></a></li>

              <li <?php if($menu=="info") { ?> class="current" <?php } ?>><a href="#"><span>More Info</span></a>
                <ul>
		   <?
		    $select=mysql_query("select * from tbl_cycling_page where status = 'Active' and pagetype = 'info'");
		    while($fetch=mysql_fetch_array($select)) {
		   ?>
	           <li><a href="pages.php?page=info&pageid=<? echo $fetch['pageid']; ?>"><span><? echo ucfirst($fetch['title']);?> </span></a></li>
		   <? } ?>
		</ul>
	      </li>
	     <li <?php if($menu=="blog") { ?> class="current" <?php } ?>><a href="/blog/"><span>Blog</span></a></li>

	  <?php if($sess==""){?>
               	<li <?php if($menu=="login") { ?> class="current" <?php } ?>><a href="login.php?page=login" ><span>Login</span></a></li>
          <?php } ?>

	  <?php if($sess!=""){?>
	 	<li <?php if($menu=="forum") { ?> class="current" <?php } ?>><a href="forum.php?page=forum"><span>Forum</span></a></li>
	  <?php } ?>

            </ul>
          </div>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>


      </tr>

	  <td>
	  <script type="text/javascript">
var fadeimages=new Array()
/*fadeimages[0] = ["images/top_banner_new1.png", "", ""];
fadeimages[1] = ["images/ima.jpg", "", ""];
fadeimages[2] = ["images/ima1.jpg", "", ""];
fadeimages[3] = ["images/ima2.jpg", "", ""];*/
<?php $sel=mysql_query("select * from tbl_cycling_image where status='Active'");
$i=0;

		while($fet=mysql_fetch_array($sel))
		{?>
		fadeimages[<?php echo $i;?>] = ["admin/adminsettings/images/<?php echo $fet['addimage'];?>", "", ""];
		<?php $i++;}
		?>

var fadebgcolor="transparent"
var fadearray=new Array()
var fadeclear=new Array()
var dom=(document.getElementById)
var iebrowser=document.all
        </script>

          <script type="text/javascript" language="JavaScript">
//new fadeshow(IMAGES_ARRAY_NAME, slideshow_width, slideshow_height, borderwidth, delay, pause (0=no, 1=yes), optionalRandomOrder)
new fadeshow(fadeimages,1000, 191, 0, 5000, 1, "R")

        </script>

	  </td>

	 <?php /*?> <?php
		$sel_img=mysql_query("select * from tbl_cycling_adminprofile");
		$fet_img=mysql_fetch_array($sel_img);


		?>
      <tr>
        <td align="left"><img src="deimage1/<?php echo $fet_img['productimage']; ?>" width="1000" height="191" /></td>
      </tr><?php */?>




    </table>
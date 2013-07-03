<?php
	//include('header.php');
	include("include/dbconnect.php");
	include("include/constants.php");


	$pageid=$_REQUEST['pageid'];
	$selectqrycms="select * from tbl_cycling_page where `pageid` ='$pageid'";
	$selqrycms=mysql_query($selectqrycms) or die("Error:".mysql_error());
	$fetchcms=mysql_fetch_array($selqrycms);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $MetatagKey; ?>" />
<meta name="description" content="<?php echo $metatagDesc; ?>" />

<title>Easy Riders Forum</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon new.ico" type="image/x-icon">
<link rel="icon" href="/favicon new.ico" type="image/x-icon">
<script src="images/galleryscript.js" type="text/javascript"></script>

<link id='theme' rel='stylesheet' href='/humane-themes/bold-dark.css'/>
<script src='/humane.js'></script>

<?php
if (empty ($_SESSION["Session_UserId1"]))
{ header ('Location: index.php?mess=error'); exit (0); }
?>

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
            <td width="484"><a href="index.php"><img src="images/logo.png" width="484" height="74" border="0" /></a></td>
            <td valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
							 ?>
						  <font color="#FFFFFF" style="font-size:12px;"><a href="perprofile.php?id=<?php echo $fetch['intmemberid']; ?>" style="text-decoration:none; color:#FF0000;"><b>Welcome! &nbsp;<?php echo $fetch['varUsername'];?></a><?php }?></font>

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
        </table>        </td>
      </tr>
	  <?php
	  @$menu=$_GET['page'];
	  ?>
      <tr>
        <td height="46"><div class="cssmenu">
            <ul>

              <li <?php if($menu=="") { ?> class="current" <?php } ?>><a href="index.php" ><span>Home</span></a></li>
	      <li <?php if($menu=="about") { ?> class="current" <?php } ?>><a href="about.php?page=about" ><span>About&nbsp;Us</span></a></li>
              <li <?php if($menu=="maps") { ?> class="current" <?php } ?>><a href="maps.php?page=maps" ><span>Maps</span></a></li>
              <li <?php if($menu=="calendar") { ?> class="current" <?php } ?>><a href="calendar.php?page=calendar" ><span>Calendar </span></a></li>
              <li <?php if($menu=="gallery") { ?> class="current" <?php } ?>><a href="gallery.php?page=gallery" ><span>Gallery</span></a>
                <ul>
	      	  <li><a href="gallery-VD.php?page=gallery&gallery=MAIN">ER&#39;s in action</a></li>
	      	  <li><a href="gallery-VD.php?page=gallery&gallery=VD">VD&#39;s Travelogue</a></li>
		</ul>
              </li>
              <li <?php if($menu=="contact") { ?> class="current" <?php } ?>><a href="contact.php?page=contact"  <span>Contact&nbsp;Us </span></a></li>

              <li <?php if($menu=="riders") { ?> class="current" <?php } ?>><a href="riders.php?page=riders" ><span>Riders</span></a></li>

              <li <?php if($menu=="links") { ?> class="current" <?php } ?>><a href="links.php?page=links" ><span>Links</span></a>
                <ul>
		   <?
		    $select=mysql_query("select * from tbl_cycling_page where status ='Active'");
		    while($fetch=mysql_fetch_array($select)) {
		   ?>
	           <li><a href="pages.php?page=page1111&pageid=<? echo $fetch['pageid']; ?>"><span><? echo ucfirst($fetch['title']);?> </span></a></li>
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
          <td><!-- Google Groups Element -->
<iframe id="groups_embed" src="javascript:void(0);" width="100%" height="600" scrolling="no" frameborder="0"></iframe>
<script type="text/javascript">
  parentUrl = encodeURIComponent(window.location.href);
  parentUrl = parentUrl.match(/https?:\/\/.+/) ? parentUrl : null;
  document.getElementById("groups_embed").src = "https://groups.google.com/forum/embed/?place=forum%2Fsydney-easy-riders&showsearch=true&showtabs=false&theme=default" + (parentUrl ? ("&parenturl=" + parentUrl) : "");
</script>
		 </td>
          </tr>
        </table></td>
      </tr>
  <tr>
    <td><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>


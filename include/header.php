<?php 

include("dbconnect.php");
include("constants.php");
include("functions.php");

			  @$page = $_REQUEST['page'];
			  $page = base64_decode($page);
			  @$cmsid = $_REQUEST['cmsid'];
			  $cmsid = base64_decode($cmsid);


switch($page)
{
			  case "home":
			 $mode =home;
			  break;
			  case "about":
			 $mode =about;
			  break;
			  case "featuredsite":
			 $mode =features;
			  break;
			  case "termsandconditions":
			 $mode =termsandconditions;
			  break;
			  case "privacypolicy":
			 $mode =privacypolicy;
			  break;
			  case "contactus":
			 $mode =contactus;
			  break;

			  default:
			 $mode =home;
			  
}

if(!empty($cmsid))
{
switch($cmsid)
{
			  case "About us":
			 $mode ="About";
			  break;
			  case "Pricelist":
			 $mode ="pricelist";
			  break;
			  case "Our Brands":
			 $mode ="ourbrands";
			  break;
			  case "Specials":
			 $mode ="special";
			  break;
			  case "Catalog":
			 $mode ="Catalog";
			  break;
			  case "Contact":
			 $mode ="Contact";
			  break;
			
			  case "Terms &amp; Conditions":
			 $mode ="termsandconditions";
			  break;

			  case "Privacy Policy":
			 $mode ="privacypolicy";
			  break;

			  case "Advanced Search":
			 $mode ="AdvancedSearch";
			  break;

			  case "Search Terms":
			 $mode ="Search Terms";
			  break;

			  case "Site Map":
			 $mode ="SiteMap";
			  break;

			  case "Artwork Guide":
			 $mode ="artwrok";
			  break;

			  case "How it Works":
			 $mode ="howitworks";
			  break;

			  case "FAQ":
			 $mode ="faq";
			  break;



			  default:
			 $mode =home;
			  
}
}
$result = select(CMS,varMode,$mode);
$fet_cms = mysql_fetch_array($result);
$title = $fet_cms['varTitle'];
$content = $fet_cms['txtStatement'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link href="images/style.css" rel="stylesheet" type="text/css" />

<script src="script/application.js" type="text/javascript"></script>
<script src="script/controls.js" type="text/javascript"></script>
<script src="script/dragdrop.js" type="text/javascript"></script>
<script src="script/prototype.js" type="text/javascript"></script>
<script src="script/effects.js" type="text/javascript"></script>
<script src="script/scroll_effects.js?1278080787" type="text/javascript"></script>
<style type="text/css">

img { border:none; }
#red_stripe_wrapper { width:100%;}
#red_stripe_hdr_wrapper { width:100%;  }

#portfolio_slider { width:998px;  position:relative; }
#portfolio_window { width:848px; height:254px; overflow:hidden; }

.featured_pic { float:left; margin:0 10px 5px 0; border:1px solid #787878; }
.featured_px_pic { border:1px solid #787878; margin:0 0 5px 0; }
.featured_title { font-size:14px; padding:0; font-weight:bold; }
.featured_date { font-size:0.9em; color:#ADADAD; font-weight:normal; }
.featured_author { font-size:0.8em; font-weight:bold; padding:0; }
.featured_author a { font-size:1em; color:#FFF; text-decoration:none; }
.featured_author a:hover { text-decoration:underline; }
.featured_comments { padding:0; }
.featured_summary { font:normal 13px/140% Arial, Verdana, sans-serif; padding-top:8px; }
.featured_more_link { position:absolute; bottom:13px; left:18px; line-height:32px; text-align:center; padding:0; }
.featured_more_link a {color:#FFF; }
.featured_archive_link { position:absolute; bottom:13px; left:136px; line-height:32px; text-align:center; padding:0; }
.featured_archive_link a, .featured_more_link a { display:block; width:112px; background-color:#181818; text-decoration:none; color:#FFF; }
.featured_archive_link a:hover, .featured_more_link a:hover, .featured_px_more_link a:hover, .featured_px_archive_link a:hover { background-color:#393939; }
.featured_px_more_link { position:absolute; bottom:13px; left:18px; line-height:32px; text-align:center; padding:0; }
.featured_px_archive_link { position:absolute; bottom:13px; left:152px; line-height:32px; text-align:center; padding:0; }
.featured_px_archive_link a, .featured_px_more_link a { display:block; width:129px; background-color:#181818; text-decoration:none; color:#FFF; }
.featured_rss { position:absolute; bottom:20px; right:21px; }
.featured_rss img { display:block; }

.profile_pic { float:left; border:1px solid #787878; margin:4px 25px 0 0; }
.staff_link { float:right; padding:5px 15px 0 0; font-size:0.9em; }

#portfolio_listings { width:100%; position:relative; overflow:hidden; }
#portfolio_listings #left_arrow { position:absolute; left:0; top:0px; z-index:50; }
#portfolio_listings #right_arrow { position:absolute; right:0; top:0px; z-index:50;  }
#portfolio_listings .slider_pic, #portfolio_listings .slider_pic_inactive { float:left;  }
#portfolio_listings .slider_pic {  }
#portfolio_listings .slider_pic_inactive { border:none;  }
#featured_project_images { width:10000px; padding-left:75px;overflow:hidden; }


</style>



<?php  //if(isset($_POST['comment'])) {?>
   



		<?php // }?>


</head>


<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="top_left">&nbsp;</td>
    <td valign="top"><table width="998" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top" class="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="419" valign="top"><a href="index.php"><img src="images/logo.png" width="419" height="129"  border="0"/></a></td>
            <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="180" height="20">&nbsp;</td>
                    <td><a href="#" class="a">Sign In</a><span class="line_white_menu">    |</span>    <a href="#" class="a">Create Account</a><span class="line_white_menu">    |</span>    <a href="#" class="a">Contact Us</a></td>
                  </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td height="85"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="25%">&nbsp;</td>
                    <td width="75%"><table width="90%" border="0" align="right" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="53%"><input name="textfield" type="text" class="text_field" id="textfield" /></td>
                        <td width="47%"><img src="images/go.png" width="46" height="27" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="180">&nbsp;</td>
                  <td><span class="yellow">Shopping Cart:</span> <span class="white">now in your cart: 0 items</span></td>
                </tr>
              </table>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td valign="bottom" class="menu_bg"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div id="tabsB">
  <ul>
    <li><a href="index.php?page=<?php echo base64_encode("home"); ?>"><span>Home</span></a></li>
    <li><a href="index.php?page=<?php echo base64_encode("cms"); ?>&amp;cmsid=<?php echo base64_encode("About us"); ?>"><span>About Us</span></a></li>
    <li><a href="index.php?page=<?php echo base64_encode("Products"); ?>" ><span>Products</span></a></li>
    <li><a href="index.php?page=<?php echo base64_encode("cms"); ?>&amp;cmsid=<?php echo base64_encode("Our Brands"); ?>"><span> Our Brands</span></a></li>
    <li><a href="index.php?page=<?php echo base64_encode("cms"); ?>&amp;cmsid=<?php echo base64_encode("Specials"); ?>"><span>Specials</span></a></li>
    <li><a href="index.php?page=<?php echo base64_encode("cms"); ?>&amp;cmsid=<?php echo base64_encode("Catalog"); ?>"><span> Catalog</span></a></li>
	<li><a href="index.php?page=<?php echo base64_encode("cms"); ?>&amp;cmsid=<?php echo base64_encode("Pricelist"); ?>" ><span>Pricelist</span></a></li>
	<li><a href="index.php?page=<?php echo base64_encode("cms"); ?>&amp;cmsid=<?php echo base64_encode("Contact"); ?>" ><span>Contact</span></a></li>
  </ul>
</div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="334" background="images/banner_bg.jpg"><div id="red_stripe_wrapper">
			<script type="text/javascript">
	//<![CDATA[
	var num_pages = 4;
	var current_page = 1;
	var first_run = true;

	function move_to_page( page_num ) {
		if( current_page != page_num ) {
			var move_by = current_page - page_num; // negative/positive for direction...
			var move_width = move_by * 848;
			// new Effect.Parallel([
			// 				// 		new Effect.MoveBy( 'project_picture_351', 0, move_width, { sync: true } )
			// 		,
			// 				// 		new Effect.MoveBy( 'project_picture_350', 0, move_width, { sync: true } )
			// 		,
			// 				// 		new Effect.MoveBy( 'project_picture_349', 0, move_width, { sync: true } )
			// 		,
			// 				// 		new Effect.MoveBy( 'project_picture_348', 0, move_width, { sync: true } )
			// 		,
			// 				// 		new Effect.MoveBy( 'project_picture_346', 0, move_width, { sync: true } )
			// 		,
			// 				// 		new Effect.MoveBy( 'project_picture_342', 0, move_width, { sync: true } )
			// 		,
			// 				// 		new Effect.MoveBy( 'project_picture_340', 0, move_width, { sync: true } )
			// 		,
			// 				// 		new Effect.MoveBy( 'project_picture_339', 0, move_width, { sync: true } )
			// 		
			// 				// ]);
			new Effect.Parallel([
				new Effect.MoveBy( 'featured_project_images', 0, move_width, { sync: true } )
			]);
			current_page = page_num;
			enable_arrows();
			window.setTimeout('swap_classes(current_page)', 500);
		}
	} // end move_to_page()

	function page_left() {
		if( current_page > 1 ) { move_to_page(current_page - 1); }
	} // end page_left()

	function page_right() {
		if( current_page != num_pages ) { move_to_page(current_page + 1); }
	} // end page_right()

	function swap_classes(page) {
		var next_pic = 0;
		var prev_pic = 0;
		var this_pic = page;
		if(page == 1) {
			next_pic = page + 1;
		}
		else if(page == num_pages) {
			prev_pic = page - 1;
		}
		else {
			next_pic = page + 1;
			prev_pic = page - 1;
		}
		$('picture_' + this_pic).className = 'slider_pic';
		if($('picture_' + next_pic)) { $('picture_' + next_pic).className = 'slider_pic_inactive'; }
		if($('picture_' + prev_pic)) { $('picture_' + prev_pic).className = 'slider_pic_inactive'; }
	}

	function enable_arrows() {
		if( num_pages > 1 ) {
			if( first_run ) {
				move_to_page(2);
				first_run = false;
			}
			if( current_page == 1 ) {	// on first page...
				if($('left_arrow_active')) { Element.hide('left_arrow_active'); }
				if($('left_arrow_inactive')) { Element.show('left_arrow_inactive'); $('left_arrow_inactive').style.visibility='visible'; }
				if($('right_arrow_active')) { Element.show('right_arrow_active'); }
				if($('right_arrow_inactive')) { Element.hide('right_arrow_inactive'); }
			} else if( current_page == num_pages ) { // on last page...
				if($('left_arrow_active')) { Element.show('left_arrow_active'); }
				if($('left_arrow_inactive')) { Element.hide('left_arrow_inactive'); }
				if($('right_arrow_active')) { Element.hide('right_arrow_active'); $('right_arrow_inactive').style.visibility='visible'; }
				if($('right_arrow_inactive')) { Element.show('right_arrow_inactive'); }
			} else { // in the middle...
				if($('left_arrow_active')) { Element.show('left_arrow_active'); }
				if($('left_arrow_inactive')) { Element.hide('left_arrow_inactive'); $('left_arrow_inactive').style.visibility='hidden'; }
				if($('right_arrow_active')) { Element.show('right_arrow_active'); }
				if($('right_arrow_inactive')) { Element.hide('right_arrow_inactive'); $('right_arrow_inactive').style.visibility='hidden'; }
			}
		} else {
			if($('left_arrow_active')) { Element.hide('left_arrow_active'); }
			if($('right_arrow_active')) { Element.hide('right_arrow_active'); }
			if($('left_arrow_inactive')) { Element.show('left_arrow_inactive'); }
			if($('right_arrow_inactive')) { Element.show('right_arrow_inactive'); }
		}
	} // end enable_arrows()
	//]]>
	</script><div id="portfolio_slider">
					<div id="portfolio_listings">
			<div id="left_arrow" class="featured_arrow_div" style="float:left;">
					<a href="#" id="left_arrow_active" onclick="page_left(); return false;" style="border:0px; cursor:pointer;">
					<img  src="images/arrow_left.jpg" alt="Left" name="left" border="0" id="left" rel="nofollow" />					</a>

					<img alt="Left" class="inactive_arrow" id="left_arrow_inactive" src="images/arrow_left1.jpg" width="75" height="334" style="display:none;" border="0" />				</div>
				
                <div id="featured_project_images">
				<div id="project_picture_351"><img alt="Homepage with Featured Deal" class="slider_pic_inactive" id="picture_1" src="images/slide1.jpg" width="848" height="334"  border="0" /></div>

	
	<div id="project_picture_350"><img alt="Home Page" class="slider_pic_inactive" id="picture_2" src="images/slide1.jpg" width="848" height="334" border="0" /></div>

	
	<div id="project_picture_349"><img alt="" class="slider_pic_inactive" id="picture_3" src="images/slide2.jpg" width="848" height="334"  border="0" /></a></div>

	
	<div id="project_picture_348"><img alt="" class="slider_pic_inactive" id="picture_4" src="images/slide3.jpg" width="848" height="334" border="0" /></div>
              
				</div>  <div id="right_arrow" class="featured_arrow_div" style="float:right;">
					<a href="#" id="right_arrow_active" onclick="page_right(); return false;"><img alt="Right" rel="nofollow" src="images/arrow_right.jpg" width="75" height="334"/></a>
					<img alt="Right" class="inactive_arrow" id="right_arrow_inactive" src="images/arrow_right1.jpg" width="75" height="334" style="display:none;" border="0" />
				</div>
				</div>
				<script type="text/javascript">
		//<![CDATA[
		enable_arrows();
		//]]>
		</script>
	</div></div>
				</td>
            </tr>
          
     

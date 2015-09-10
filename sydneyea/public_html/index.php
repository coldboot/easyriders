<?php
	//include('header.php');
	include("include/dbconnect.php");
	include("include/constants.php");
    // include("calendar/myevent.php");

	$activeid=base64_decode($_REQUEST['activeid']);



	if($activeid!="")
	{
		$timenow = date('Y-m-d H:i:s');
		$upd="update tbl_cycling_membernew set `activeid`='yes', `varActivationDate`='$timenow' where `intmemberid`='$activeid'";
		$res=mysql_query($upd);
		$updcount = mysql_affected_rows();
		if (!$res || $updcount == 0)
		{
			$message  = 'Invalid query or nothing updated: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $upd;
			die($message);
		}
	}


	$selectqrycms="select * from ".CMS." where `varMode` ='home'";
	$selqrycms=mysql_query($selectqrycms) or die("Error:".mysql_error());
	$fetchcms=mysql_fetch_array($selqrycms);
	$metatagDesc=$fetchcms['metatagDesc'];
	$varMetaTitle = $fetchcms['varMetaTitle'];
	$MetatagKey = $fetchcms['MetatagKey'];
	$txtStatement=$fetchcms['txtStatement'];
	$varHeading=$fetchcms['varHeading'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $MetatagKey; ?>" />
<meta name="description" content="<?php echo $metatagDesc; ?>" />

<title>Welcome to Easy Riders</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon new.ico" type="image/x-icon">
<link rel="icon" href="/favicon new.ico" type="image/x-icon">
<script src="images/galleryscript.js" type="text/javascript"></script>

  <link id='theme' rel='stylesheet' href='/humane-themes/bold-dark.css'/>
      <script src='/humane.js'></script>

<script src="/videos/scripts/ac_quicktime.js" language="JavaScript" type="text/javascript"></script>
<script src="/videos/scripts/qtp_library.js" language="JavaScript" type="text/javascript"></script>
<link href="/videos/stylesheets/qtp_library.css" rel="StyleSheet" type="text/css" />

</head>

<body>
<table class="main" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
<script language="JavaScript" type="text/javascript">
<!--
var winW = 1002;
var borderW = 1;
if (document.body && document.body.offsetWidth)
{
 winW = document.body.offsetWidth;
}
if (document.compatMode=='CSS1Compat' &&
    document.documentElement &&
    document.documentElement.offsetWidth )
{
 winW = document.documentElement.offsetWidth;
}
if (window.innerWidth)
{
 winW = window.innerWidth;
}
if (winW > 1020)	// Knock off 20 for the scroll bar
{
	borderW = (winW - 1020) / 2;
}
document.write("<td width='");
document.write(borderW);
document.write("'></td>");
//-->
</script>
<noscript>
	<td></td>
</noscript>

	<td width="1000" align="center"><?php include("header.php"); ?></td>
<script language="JavaScript" type="text/javascript">
<!--
document.write("<td width='");
document.write(borderW);
document.write("'></td>");
//-->
</script>
<noscript>
	<td></td>
</noscript>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<script language="JavaScript" type="text/javascript">
<!--
document.write("<td class='border' width='")
document.write(borderW)
document.write("'></td>");
//-->
</script>
<noscript>
	<td class="border"></td>
</noscript>

<td width="1000" align="center">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php if($_GET['mess']=="error"){?>
	<tr><td colspan="3" style="font-weight:bold;" align="center"><script type="text/javascript">humane("<p class=\"error\">Please Login To View Posts</p>");</script></td></tr>
  <?php }?>



    <?php



	 if($_REQUEST['activeid']!=""){?>
	<tr><td colspan="3" style="font-weight:bold;" align="center"><script type="text/javascript">humane("<p class=\"error\">Your account has been activated successfully</p>");</script></td></tr>
  <?php }?>



  <tr>
    <td><table class="main" width="100%" border="0" cellspacing="0" cellpadding="0">
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
                <td width="700" valign="top">


		<table width="98%" align="center" cellpadding="0" cellspacing="0">
                  <tr>
		    <td class="head_big"><big><?php echo $fetchcms['varHeading'];?></big></td>
                  </tr>
                  <tr>
                    <td class="body_style"><?php echo stripslashes($fetchcms['txtStatement']);?></td>
                  </tr>

                  <tr>
                    <td align="center">
			<script type="text/javascript"><!--
				QT_WritePoster_XHTML('Click to Play', '/videos/Easy_Riders_OTP/Easy_Riders_OTP-poster.jpg',
					'/videos/Easy_Riders_OTP/Easy_Riders_OTP.mov',
					'480', '376', '',
					'controller', 'true',
					'autoplay', 'true',
					'bgcolor', 'black',
					'scale', 'aspect');
			//-->
			</script>
			<noscript>
			<object width="480" height="376" classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab">
				<param name="src" value="/videos/Easy_Riders_OTP/Easy_Riders_OTP-poster.jpg" />
				<param name="href" value="/videos/Easy_Riders_OTP/Easy_Riders_OTP.mov" />
				<param name="target" value="myself" />
				<param name="controller" value="false" />
				<param name="autoplay" value="false" />
				<param name="scale" value="aspect" />
				<embed width="640" height="376" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"
					src="/videos/Easy_Riders_OTP/Easy_Riders_OTP-poster.jpg"
					href="/videos/Easy_Riders_OTP/Easy_Riders_OTP.mov"
					target="myself"
					controller="false"
					autoplay="false"
					scale="aspect">
				</embed>
			</object>
			</noscript>

                    </td>
                  </tr>
                  <tr>
                    <td>

								<table>
							       	<tr>
						                <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                  <tr>
						                    <td width="450" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                      <tr>
						                        <td align="left"><!--Weatherzone local weather-->

						                            <style type="text/css">
													#live-weatherzone { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: x-small; color: black; }
													#live-weatherzone div.top_left {  width: 370px; }
													#live-weatherzone div.summary_forecast { float: left; width: 250px; position: relative; }
													#live-weatherzone div.summary_now h3,
													#live-weatherzone div.summary_forecast h3 { font-size: 1.6em; font-weight: bold; }
													#live-weatherzone acronym { border-bottom: 1px dotted; cursor: help; }
													#live-weatherzone div.summary_forecast table { float: right; width: 157px; }
													#live-weatherzone div.summary_forecast img.icon { float: right; width: 70px; height: 70px; margin-right: 21px; }
													#live-weatherzone div.summary_now { float: right; width: 120px; }
													#live-weatherzone div.spacer_v10 { clear: both; padding: 10px 0px 0px 0px; margin: 0; font-size: 0; }
													#live-weatherzone p { margin: 0px 0px 10px 0px; line-height: 1.4; font-size: 1.2em; }
													#live-weatherzone div.top_left div.details_lhs { display: none; float: left; width: 310px; }
													#live-weatherzone div.top_left div.details_rhs { display: none; float: left; width: 196px; }
													#live-weatherzone div.more { float: right; white-space: nowrap; margin-top: 3px; }
													#live-weatherzone a { color: black; text-decoration: underline; }
													#live-weatherzone th { background-color: #DEE3E6; color: #11569B; font-weight: normal; }
													#live-weatherzone .bg_yellow { background-color: #FEFBDE; }
													#live-weatherzone td.hilite,
													#live-weatherzone th.hilite { font-size: 1.1em; font-weight: bold; }
													#live-weatherzone div.top_left div.details_rhs div.inner { margin-left: 10px; }
													#live-weatherzone div.spacer_v5 { clear: both; padding: 5px 0px 0px 0px; margin: 0; font-size: 0; }

													div.against_right_island acronym { border-bottom: 1px dotted; cursor: help; }
													div.against_right_island h2 { font-size: 1.1em; font-weight: bold; }
													div.against_right_island { float: left; width: 350px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: x-small; color: black; }
													div.against_right_island div.round_top,
													div.round_top_inner { float: none; }
													div.against_right_island div.round_top { color: white; background: #127EC3; margin: 0; padding: 0; }
													div.against_right_island div.round_top div.round_top_inner { background: -moz-linear-gradient(center bottom, #127EC3 30%, #3591CC 80%) !important; background: -webkit-gradient(linear, left bottom, left top, color-stop(0.3, #127EC3), color-stop(0.8, #3591CC)) !important; background: -moz-linear-gradient(center bottom, #127EC3 30%, #3591CC 80%) !important; padding: 4px !important; border-top: 1px solid #509ADC; }
													div.against_right_island div.round_top,
													div.round_top_inner { float: none; display: block; }
													div.against_right_island div.round_top { color: white; }
													div.against_right_island h2 { font-size: 1.1em; font-weight: bold; padding: 0; margin: 0; float: left; }
													div.against_right_island h2 { display: block; -webkit-margin-before: 0.83em; -webkit-margin-after: 0.83em; -webkit-margin-start: 0px; -webkit-margin-end: 0px; }
													div.against_right_island div.round_top_rhs { float: left; text-align: right; }
													div.against_right_island div.round_top a { color: white; text-decoration: underline; }
													div.against_right_island div.boxed_blue_nopad,
													div.boxed_blue_nopad_struc { border: 1px solid #999; border-top: 1px solid #0A3864; padding: 0; }
													div.against_right_island div.fcast_timeseries_summary { float: left; width: 74px; height: 85px; padding: 4px; margin: 4px 0 2px 4px; position: relative; overflow: hidden; }
													div.against_right_island div.fcast_timeseries_summary img.icon { float: right; }
													div.against_right_island img,
													.imgnoborder { border: 0; }
													div.against_right_island div.fcast_timeseries_summary h4 { margin-top: 4px; font-size: 1.4em; letter-spacing: -1px; }
													div.against_right_island div.boxed_blue h4,
													div.boxed_blue_nopad h4,
													div.boxed_blue_yellow h4,
													div.boxed_blue_cyan h4,
													ul.popup_box li.boxed_blue_yellow h4 { color: black; }
													div.against_right_island div.spacer_v1 { clear: both; padding: 1px 0px 0px 0px; margin: 0; font-size: 0; }
													div.against_right_island div.fcast_timeseries_summary div.precis { text-align: center; font-family: Arial, sans-serif; margin: 3px 0 4px 0; }
													div.against_right_island div.fcast_timeseries_summary div.temp { text-align: center; font-weight: bold; position: absolute; bottom: 0; left: 0; width: 100%; font-size: 1.1em; padding: 3px; }
													div.against_right_island .local_grad_tdb_20 { background-color: #FBC25E; }
													div.against_right_island .opticast { text-align: right; }
													</style>
													<div id="live-weatherzone">
													<?php

													$wz_forecast = file_get_contents("http://www.weatherzone.com.au/nsw/sydney/sydney");

													$wz_forecast1 = $wz_forecast;
													$wz_forecast2 = $wz_forecast;

													$wz_needle = '<div class="top_left">';
													$wz_chop = stripos($wz_forecast2, $wz_needle);
													$wz_forecast2 = substr($wz_forecast2, $wz_chop);

													$wz_needle = '<div class="top_right">';
													$wz_chop = stripos($wz_forecast2, $wz_needle);
													$wz_forecast2 = substr($wz_forecast2, 0, $wz_chop);

													echo '<div style="display:block;float:none;">'.$wz_forecast2.'</div>';

													$wz_needle = '<div class="against_right_island">';
													$wz_chop = stripos($wz_forecast1, $wz_needle);
													$wz_forecast1 = substr($wz_forecast1, $wz_chop);

													$wz_needle = '<div class="spacer_v10"></div>';
													$wz_chop = stripos($wz_forecast1, $wz_needle);
													$wz_forecast1 = substr($wz_forecast1, 0, $wz_chop);

													echo '<div style="display:block;float:none;">'.$wz_forecast1.'</div>';

													?>

													</div>
													<!-- end Live Weatherzone content -->
						                          &nbsp;</td>
						                      </tr>
						                      <tr>
						                        <td height="10"></td>
						                      </tr>
						                    </table></td>
						                    <td width="200" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
						                      <tr>
						                        <td width="8"><img src="images/side_1.png" width="8" height="8" /></td>
						                        <td class="side_top"></td>
						                        <td width="8"><img src="images/side_2.png" width="8" height="8" /></td>
						                      </tr>
						                      <tr>
						                        <td width="8" class="side_left"></td>
						                        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                          <tr>
						                            <td class="header">
													<?php

													$selectst1="select * from ".CMS." where `varMode` ='strava1'";
						$selqryres=mysql_query($selectst1) or die("Error:".mysql_error());
						$fetchst1=mysql_fetch_array($selqryres);

						$txtStatementst1=$fetchst1['txtStatement'];
						$varHeadingst1=$fetchst1['varHeading'];
													?>
													<table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
						                                <tr>
						                                  <td align="center" class="body_style_white"><strong>Our Rides</strong></td>
						                                </tr>
						                            </table></td>
						                          </tr>
						                          <tr>
						                            <td align="center">&nbsp;</td>
						                          </tr>
						                          <tr>
						                            <td align="center"><?php echo $fetchst1['txtStatement'];?></td>
						                          </tr>

												  <?php

													$selectst2="select * from ".CMS." where `varMode` ='strava2'";
						$selqryres2=mysql_query($selectst2) or die("Error:".mysql_error());
						$fetchst2=mysql_fetch_array($selqryres2);

						$txtStatementst2=$fetchst2['txtStatement'];
						$varHeadingst2=$fetchst2['varHeading'];
													?>
						                          <tr>
						                            <td align="center"><?php echo $fetchst2['txtStatement'];?></td>
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

						                </table></td>
						              </tr>
										<tr>
											<td>
												<!-- begin Live Radar -->
												<style>
												div#radar {
												margin: 1em 0 0 0;
												padding: 0px;
												font-family: Verdana, Arial, Helvetica, sans-serif;
												font-size: x-small;
												color: black;
												}
												div.animator-map.full { width: 640px; height: 480px; margin: 0 auto; }
												div.animator-cp {
												width: 640px;
												margin: 0 auto 5px auto;
												background-color: #DEE3E6;
												}
												div.animator-cp div.controls {
												padding: 4px;
												margin: 0;
												border-bottom: 1px dotted silver;
												text-align: center;
												}
												div.animator-cp ul.layers {
												padding: 3px 0 3px 0;
												margin: 0;
												list-style: none;
												float: left;
												width: 100%;
												}
												div.animator-cp ul.layers li {
												float: left;
												width: 14%;
												padding: 0 0 0 4px;
												white-space: nowrap;
												list-style: none;
												}
												div.animator-cp div.attribution {
												padding: 4px;
												margin: 0;
												text-align: center;
												border-top: 1px dotted silver;
												clear: both;
												}
												div.animator-cp div.attribution div.logo {
												float: left;
												}
												div.animator-cp div.attribution div.scale {
												float: right;
												width: 40%;
												text-align: right;
												}
												div.animator-cp div.attribution div.scale img {
												width: 170px;
												height: 12px;
												}
												</style>
												<div id="radar">
														<script type="text/javascript">

															//<![CDATA[

																document.domain = 'weatherzone.com.au';

															//]]>

														</script>
														<script type="text/javascript" src="http://resources.weatherzone.com.au/wz/includes/jquery/jquery-1.5.2.min.js">
														</script>
														<script type="text/javascript" src="http://resources.weatherzone.com.au/wz/includes/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min.js">
														</script>
														<script type="text/javascript" src="http://resources.weatherzone.com.au/wz/includes/js/glob_util.js">
														</script>
														<script type="text/javascript" src="http://resources.weatherzone.com.au/wz/includes/js/glob_navigation.js">
														</script>
														<script type="text/javascript" src="http://resources.weatherzone.com.au/wz/includes/jquery/jquery.cookies.2.2.0.min.js">
														</script>
														<!--<script type="text/javascript" src="http://resources.weatherzone.com.au/wz/includes/jquery/jqmodal.js">
														</script>-->
														<script type="text/javascript" src="http://data.weatherzone.com.au/javascript/twc/animator-1.10.min.js">
														</script>
														<!--<script type="text/javascript" src="http://content.dl-rms.com/rms/30307/nodetag.js">
																</script> -->

														<!--[if lte IE 8]>

															<style type="text/css">

																div.region_map div.plot div.inner span.details {

																	background-color: #333333;

																}



																div.animator-map div.animator-nav a {

																	background: transparent url('http://resources.weatherzone.com.au/wz/images/widgets/widget_transparent.png'); /* for IE */

																}



																div.animator-map div.animator-nav a:hover {

																	background-color: transparent;

																	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#88FFFFFF,endColorstr=#88FFFFFF);

																	zoom: 1;

																}

															</style>

														<![endif]-->

																	<script type="text/javascript">

																	//<![CDATA[

																	jQuery("ul.mutable.radars li a").each(function() {

																	jQuery(this).attr("href", jQuery(this).attr("href") + (false ? "/64km" : "/128km"));

																	});

																	//]]>

																	</script>
																	<div class="spacer_v5"></div><script type="text/javascript">

																	//<![CDATA[



																	//temp

																	jQuery.cookies.del("_wzan_anim_radar");

																	jQuery.cookies.del("_wzan_anim_sat");



																	anim_an_rad = function(prefix) {

																	var

																	el = jQuery("#" + prefix + "_animation"),

																	elcp = jQuery("#" + prefix + "_cp"),

																	elframes = jQuery("#" + prefix + "_frames"),

																	elscope = jQuery("#" + prefix + "_scope"),

																	elrefresh = jQuery("#" + prefix + "_refresh"),

																	ellayers = jQuery("#" + prefix + "_layers"),

																	elzoom = el.children(".zoomnav"),

																	animator = null,

																	json_uri = "http://data.weatherzone.com.au/json/animator/",

																	json_data = {

																	"lt": 'radarz',

																	"lc": '071',

																	"type": 'radar',

																	"mt": 'radsat_640',

																	"mlt": 'radarz',

																	"mlc": '071',

																	"md": '640x480',





																	"radardb": 1,

																	"radarpalette": 'twc15',

																	"radaroptions": 0,





																	"radardimensions": '640x480',















																	"xobf": 1,

																	"xobff": 1,











																	"df": 'EEE HH:mm z'

																	},

																	historic = json_data.dt,

																	load_timeout = -1,

																	load_interval = 300 * 1000,

																	origin = { x: 151.2098, y: -33.700900000000004, name: "radar" },

																	origin_is_user = false,



																	message = function(message, type) {

																	if (!el.children(".animator-message").length)

																	jQuery("<div/>")

																		.addClass("animator-message").addClass(type)

																		.hide().delay(200).show(150, function() {

																			jQuery(this)

																				.append(

																					jQuery("<span/>").html(message)

																						.hide()

																						.fadeIn(100)

																						.delay(5000)

																						.fadeOut(3000, function() { jQuery(this).parent().hide(150, function() { jQuery(this).remove(); }); })

																				);

																		})

																		.prependTo(el);

																	},



																	options_click = function(type) {

																	var sel = el.children(".options-" + type);



																	el.children(".options.visible").each(function() {

																	if (sel.attr("class") != jQuery(this).attr("class"))

																		jQuery(this).slideUp("fast").removeClass("visible");

																	});



																	if (!sel.hasClass("visible")) sel.slideDown("fast").addClass("visible");

																	else sel.slideUp("fast").removeClass("visible");



																	return false;

																	},



																	options_close = function() {

																	el.children(".options.visible").slideUp("fast").removeClass("visible");

																	},



																	options_apply = function(type, sel, persist) {

																	if (type == "satellite") {

																	json_data.satellitetype = sel.children("input:radio[name=sati]:checked").val();

																	animator.getState().custom['sati'] = json_data.satellitetype;

																	} else if (type == "radar") {

																	json_data.radarpalette = sel.children("input:radio[name=radp]:checked").val();

																	animator.getState().custom['radp'] = json_data.radarpalette;

																	} else if (type == "obs-rose") {

																	json_data.xobrop = 0;

																	if (sel.find("input:checkbox[name=obsa]").is(":checked")) json_data.xobrop |= 128;

																	if (sel.find("input:checkbox[name=obsb]").is(":checked")) json_data.xobrop |= 1024;

																	if (sel.find("input:checkbox[name=obsc]").is(":checked")) json_data.xobrop |= 256;

																	if (sel.find("input:checkbox[name=obsd]").is(":checked")) json_data.xobrop |= 64;

																	if (sel.find("input:checkbox[name=obse]").is(":checked")) json_data.xobrop |= 2048;

																	if (sel.find("input:checkbox[name=obsf]").is(":checked")) json_data.xobrop |= 512;

																	if (sel.find("input:checkbox[name=obsg]").is(":checked")) json_data.xobrop |= 4096;

																	if (sel.find("input:checkbox[name=obsh]").is(":checked")) json_data.xobrop |= 32;

																	json_data.xobrop |= 16;

																	json_data.xobrop |= 4;

																	animator.getState().custom['obr'] = json_data.xobrop;

																	} else if (type == "obs-field") {

																	json_data.xobff = parseInt(sel.children("input:radio[name=obsf]:checked").val());

																	animator.getState().custom['off'] = json_data.xobff;

																	} else if (type == "obs-contour") {

																	json_data.xobcf = parseInt(sel.children("input:radio[name=obsc]:checked").val());

																	animator.getState().custom['ocf'] = json_data.xobcf;

																	}

																	animator.getState().write();

																	load();

																	if (!persist)

																	el.children(".options.visible").slideUp("fast").removeClass("visible");



																	return false;

																	},



																	load = function() {



																	//reset the load timeout

																	if (load_timeout != -1)

																	clearTimeout(load_timeout);



																	if (!historic) {

																	//set the frames parameter

																	json_data.frames = elframes.length ? parseInt(elframes.val()) : 4;

																	} else {

																	//set the scope parameter

																	json_data.scope = elscope.length ? parseInt(elscope.val()) : json_data.scope;

																	}



																	//availability checks

																	if (json_data.satellitetype) {

																	if ((json_data.satellitedimensions == '960x720' || !json_data.lt.match(/^wz.+/g)) && !json_data.satellitetype.match(/sat_(vis)|(ir)/g)) {

																		json_data.satellitetype = 'sat_bw';

																	}

																	}



																	//automated options

																	if (json_data.xsat) json_data.xsatt = json_data.satellitetype;



																	//load the data

																	jQuery.ajax({

																	url: json_uri,

																	data: json_data,

																	dataType: 'jsonp',

																	jsonpCallback: 'cbrad071',

																	cache: true,

																	success: function(data) {



																		var

																			layers = [],

																			frames = [],

																			layerframes = [];



																		//load the master layer

																		frames['rad'] = [];

																		jQuery.each(data.frames, function(i, obj){

																			frames['rad'].push(new AnimatorFrame(obj.image, new Date(obj.timestamp), obj.timestamp_string));

																		});

																		if (data.frames.length == 0) {

																			frames['rad'].push(new AnimatorFrame("http://resources.weatherzone.com.au/wz/images/widgets/widget_transparent.png", new Date()));

																		}

																		layerframes.push('rad', frames['rad']);



																		//load any extra layers

																		if (data.extras) {

																			for (var k in data.extras) {

																				if (data.extras[k].frames) {

																					frames[k] = [];

																					jQuery.each(data.extras[k].frames, function(i, obj){ frames[k].push(new AnimatorFrame(obj.image, new Date(obj.timestamp))); });

																					if (data.extras[k].frames.length == 0) {

																						frames[k].push(new AnimatorFrame("http://resources.weatherzone.com.au/wz/images/widgets/widget_transparent.png", new Date()));

																					}

																					layerframes.push(k, frames[k]);

																				}

																			}

																		}



																		if (animator != null) {

																			//refit frames

																			animator.setLayerFrames(layerframes);

																		} else {



																			//full initialisation

																			layers.push(new AnimatorLayer('terrain', 'Terrain', true, true, [ new AnimatorFrame('http://data.weatherzone.com.au/maplayers/wz/terrain/terrain_radarz_071_640x480.jpg') ], false));











																			layers.push(new AnimatorLayer('rad', 'Radar', true, true, frames['rad'], false)); master = layers.length-1;





																				layers.push(new AnimatorLayer('rivers', 'Rivers', true, false, [ new AnimatorFrame('http://data.weatherzone.com.au/maplayers/wz/drainage/drainage_radarz_071_640x480.gif') ], false));

																				layers.push(new AnimatorLayer('roads', 'Roads', true, false, [ new AnimatorFrame('http://data.weatherzone.com.au/maplayers/wz/roads/roads_radarz_071_640x480.gif') ], false));

																				layers.push(new AnimatorLayer('borders', 'Borders', true, false, [ new AnimatorFrame('http://data.weatherzone.com.au/maplayers/wz/borders/borders_radarz_071_640x480.png') ], false));















																				layers.push(new AnimatorLayer('towns', 'Locations', true, true, [ new AnimatorFrame('http://data.weatherzone.com.au/maplayers/wz/locations/locations_radarz_071_640x480.gif') ]));











																			layers.push(new AnimatorLayer('obf', 'Rainfall', true, false, frames['obf'], false));





																			animator = new Animator(prefix, layers, master, '/radar');



																				animator.setDomain(149.7698, -34.7809, 2.88, 2.16);



																			animator.initialise();

																			if (origin != null) {

																				animator.setOrigin(origin.x, origin.y, origin.name);

																			}

																			if (true && animator.getState().visibility['lig'])

																				message('High-resolution lightning is available to Pro members. Get a <a href="/join/">free trial<\/a>!', "info");





																				//layer options panels

																				ellayers.children(".sat").each(function(i) {

																					var

																						label = jQuery(this).children("label"),

																						type = label.text().toLowerCase().replace(" ", "-");



																					label.wrapInner(jQuery("<a/>").attr("href", "#").click(function() { options_click(type); return false; }));

																					el.children(".options-" + type).css({ left: (jQuery(this).offset().left - jQuery(this).parent().offset().left) + "px" });



																					//close and apply buttons

																					el.find(".options-" + type).click(function(e) { e.stopPropagation(); });

																					el.find(".options-" + type + " .close").click(function(e) { options_close(); return false; });

																					el.find(".options-" + type + " .apply").click(function(e) { options_apply(type, jQuery(this).parent().parent()); });

																					if (!el.find(".options-" + type + " .apply").length) { //apply without button

																						el.find(".options-" + type + " input").click(function(e) { options_apply(type, jQuery(this).parent(), true); });

																					}

																				});



																				//outside click

																				elcp.click(options_close);

																				el.children(".tracker").click(options_close);









																			//beta

																			ellayers.children(".obw, .obwc, .obc").each(function(i) {

																				jQuery(this).children("label").append(jQuery("<sup/>").text(" beta").css({ "font-size": "xx-small", "color": "rgb(50, 80, 200)", "font-style": "italic" }).attr("title", "This layer is experimental"));

																			});



																		}





																			if (!data.current && !json_data.dt) {

																				message("Current images are temporarily unavailable. Please select an alternative location.", "error");

																			} else if (data.frames.length == 0) {

																				message("Images for this time are unavailable. Please select an alternative time or location.", "error");

																			} else {

																				message(data.frames.length + " images to " + data.frames[data.frames.length-1].timestamp_string, "info");

																			}



																	}

																	});



																	//set the load timeout

																	load_timeout = setTimeout(load, load_interval);



																	return false;

																	};









																	//zoom out

																	if (!(json_data.lt == 'radarz' && window.location.href.match(/\/doppler\/?$/)) && json_data.lt != "wzcountry") {

																	elzoom.children(".zoomout").click(function() {



																			var base = window.location.href.match(/(\/\w+\/\w+\/[\w\-]+)/)[0];

																			window.location = base + (json_data.lt == 'radarzz' ? '/128km' : '') + (window.location.href.match(/\/doppler\/?$/) ? "/doppler" : "");



																	}).attr("title", "click to zoom out");

																	} else {

																	elzoom.children(".zoomout").attr("disabled", "disabled").addClass("disabled").attr("title", "you are at the lowest zoom level");

																	}



																	//zoom in

																	if (json_data.lt.match(/^wz*/i)) {

																	elzoom.children(".zoomin").attr("disabled", "disabled").addClass("disabled").attr("title", "use the links above or clickable map to zoom in");

																	} else if (json_data.lt == "radar" || (true && json_data.lt.match(/radarz?$/gi))) {

																	elzoom.children(".zoomin").click(function() {

																		var base = window.location.href.match(/(\/\w+\/\w+\/[\w\-]+)/)[0];

																		window.location = base + (json_data.lt == 'radar' ? '/128km' : '/64km') + (window.location.href.match(/\/doppler\/?$/) ? "/doppler" : "");

																	}).attr("title", "click to zoom in");

																	} else {

																	elzoom.children(".zoomin").attr("disabled", "disabled").addClass("disabled").attr("title", "you are at the highest zoom level");

																	}



																	//reflectivity/velocity

																	elzoom.children(".doppler").click(function() {

																	var base = window.location.href.match(/(\/radar\/\w+\/[\w\-]+)/)[0];

																	base += json_data.lt == "radarzz" ? "/64km" : "/128km";

																	window.location = jQuery(this).hasClass("velocity") ? base + "/doppler" : base.replace(/\/doppler.*/, "");

																	});





																	//refresh button

																	elrefresh.click(load);



																	//duration drop-down

																	elframes.change(function() {

																	animator.getState().custom['f'] = jQuery(this).children("option:selected").text();

																	animator.getState().write();

																	load();

																	});



																	elscope.change(load);



																	//init custom state fields

																	var as = new AnimatorState(prefix);

																	as.read();

																	if (as.custom && as.custom['f']) {

																	elframes.children("option").each(function() {

																	if (jQuery(this).text() == as.custom['f']) {

																		jQuery(this).siblings("option").removeAttr("selected");

																		jQuery(this).attr("selected", "selected");

																		return;

																	}

																	});

																	}





																	//options from custom state



																	//satellite

																	json_data.satellitetype = as.custom && as.custom['sati'] ? as.custom['sati'] : json_data.satellitetype;

																	el.find(".options-satellite input:radio[value=" + json_data.satellitetype + "]").attr("checked", "checked");



																	var sat_limited = json_data.satellitedimensions == '960x720' || !json_data.lt.match(/^(wzcountry)|(wzstate)$/g);

																	if (sat_limited) {

																	el.find(".options-satellite input:radio[value=sat]").attr("disabled", "disabled");

																	el.find(".options-satellite input:radio[value=sat_wv_bw]").attr("disabled", "disabled");

																	}

















																	load();

																	};



																	//]]>

																	</script>
																	<div id="an_rad_animation" class="animator-map full 071">
																		<div class="zoomnav"></div>
																		<div id="an_rad_position" class="position"></div>
																		<div id="an_rad_timestamp" class="timestamp"></div>
																		<div class="options options-satellite">
																			<h4>
																				Satellite Image
																			</h4><input type="radio" id="sati0" name="sati" value="sat" /> <label for="sati0">Terrain IR</label><br />
																			<input type="radio" id="sati1" name="sati" value="sat_bw" /> <label for="sati1">Black &amp; White IR</label><br />
																			<input type="radio" id="sati2" name="sati" value="sat_vis" /> <label for="sati2">Visible</label><br />
																		</div>
																	</div>
																	<div id="an_rad_cp" class="animator-cp full">
																		<div class="controls">
																			<div class="button-wrapper">
																				<button id="an_rad_stepbackward" class="stepbackward"></button> <button id="an_rad_startstop" class="startstop"></button> <button id="an_rad_stepforward" class="stepforward"></button> <button id="an_rad_swing" class="swing"></button> <button id="an_rad_refresh" class="refresh"></button>
																			</div><label for="an_rad_frames">Duration:</label> <select id="an_rad_frames" class="frames">
																				<option value="6">
																					30 minutes
																				</option>
																				<option value="11" selected="selected">
																					1 hour
																				</option>
																				<option value="21">
																					2 hours
																				</option>
																			</select> <label for="an_rad_speed">Speed:</label> <select id="an_rad_speed">
																				<option>
																					0
																				</option>
																			</select> <label for="an_rad_dwell">Dwell:</label> <select id="an_rad_dwell">
																				<option>
																					0
																				</option>
																			</select>
																		</div>
																		<ul id="an_rad_layers" class="layers">
																			<li>&nbsp;
																			</li>
																		</ul>
																		<div class="attribution">
																			<div class="logo">
																				<img src="http://resources.weatherzone.com.au/wz/images/logos/weatherzone_logo_66x13.gif" alt="Weatherzone" title="Weatherzone" align="top" />
																			</div>
																			<div class="scale">
																				light <img src="http://resources.weatherzone.com.au/wz/images/widgets/nav_dbz_scale.gif" alt="dBZ scale" title="dBZ scale" align="top" /> heavy
																			</div><strong>Bureau of Meteorology Weather Radar</strong>
																		</div>
																	</div><script type="text/javascript">

																	//<![CDATA[

																	anim_an_rad('an_rad');

																	//]]>

																	</script>

												</div>
												<!-- end Live Radar -->
												</td>
											</tr>
										</table>
                    </td>
                  </tr>

                </table></td>
              </td>
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
</td>
<td class="border"></td>
<script language="JavaScript" type="text/javascript">
<!--
document.write("<td class='border' width='")
document.write(borderW)
document.write("'></td>");
//-->
</script>
<noscript>
	<td class="border"></td>
</noscript>

</tr>
</table>
</body>
</html>

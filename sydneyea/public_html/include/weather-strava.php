<table>
	<tr>
		<td valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="450" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="left">
									<!--Weatherzone local weather-->
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
									</div><!-- end Live Weatherzone content -->
									&nbsp;
								</td>
							</tr>
							<tr>
								<td height="10"></td>
							</tr>
						</table>
					</td>
					<td width="200" valign="top">
						<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td width="8">
									<img src="images/side_1.png" width="8" height="8" />
								</td>
								<td class="side_top"></td>
								<td width="8">
									<img src="images/side_2.png" width="8" height="8" />
								</td>
							</tr>
							<tr>
								<td width="8" class="side_left"></td>
								<td bgcolor="#FFFFFF">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
														<td align="center" class="body_style_white">
															<strong>Our Rides</strong>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td align="center">
												&nbsp;
											</td>
										</tr>
										<tr>
											<td align="center">
												<?php echo $fetchst1['txtStatement'];?>
											</td>
										</tr><?php

																																																				$selectst2="select * from ".CMS." where `varMode` ='strava2'";
																																														$selqryres2=mysql_query($selectst2) or die("Error:".mysql_error());
																																														$fetchst2=mysql_fetch_array($selqryres2);

																																														$txtStatementst2=$fetchst2['txtStatement'];
																																														$varHeadingst2=$fetchst2['varHeading'];
																																																				?>
										<tr>
											<td align="center">
												<?php echo $fetchst2['txtStatement'];?>
											</td>
										</tr>
									</table>
								</td>
								<td width="8" class="side_right"></td>
							</tr>
							<tr>
								<td width="8">
									<img src="images/side_3.png" width="8" height="8" />
								</td>
								<td class="side_bottom"></td>
								<td width="8">
									<img src="images/side_4.png" width="8" height="8" />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<!-- begin Live Radar -->
			<div id="radar">
				<script type="text/javascript">
//<![CDATA[
				document.domain = 'weatherzone.com.au'; 
				//]]>
				</script> <script type="text/javascript" src="http://resources.weatherzone.com.au/wz/includes/jquery/jquery-1.5.2.min.js">
</script> <script type="text/javascript" src="http://resources.weatherzone.com.au/wz/includes/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min.js">
</script> <script type="text/javascript" src="http://resources.weatherzone.com.au/wz/includes/js/glob_util.js">
</script> <script type="text/javascript" src="http://resources.weatherzone.com.au/wz/includes/js/glob_navigation.js">
</script> <script type="text/javascript" src="http://resources.weatherzone.com.au/wz/includes/jquery/jquery.cookies.2.2.0.min.js">
</script> <script type="text/javascript" src="http://data.weatherzone.com.au/javascript/twc/animator-1.10.min.js">
</script> <script type="text/javascript">
//<![CDATA[
				jQuery("ul.mutable.radars li a").each(function() { jQuery(this).attr("href", jQuery(this).attr("href") + (false ? "/64km" : "/128km")); }); 
				//]]>
				</script>
				<div class="spacer_v5"></div><script type="text/javascript">
//<![CDATA[
				jQuery.cookies.del("_wzan_anim_radar");jQuery.cookies.del("_wzan_anim_sat");
				anim_an_rad=function(h){var d=jQuery("#"+h+"_animation"),w=jQuery("#"+h+"_cp"),m=jQuery("#"+h+"_frames"),q=jQuery("#"+h+"_scope"),x=jQuery("#"+h+"_refresh"),u=jQuery("#"+h+"_layers"),k=d.children(".zoomnav"),f=null,a={lt:"radarz",lc:"071",type:"radar",mt:"radsat_640",mlt:"radarz",mlc:"071",md:"640x480",radardb:1,radarpalette:"twc15",radaroptions:0,radardimensions:"640x480",xobf:1,xobff:1,df:"EEE HH:mm z"},y=a.dt,r=-1,n={x:151.2098,y:-33.700900000000004,name:"radar"},o=function(b,c){d.children(".animator-message").length||
				jQuery("<div/>").addClass("animator-message").addClass(c).hide().delay(200).show(150,function(){jQuery(this).append(jQuery("<span/>").html(b).hide().fadeIn(100).delay(5E3).fadeOut(3E3,function(){jQuery(this).parent().hide(150,function(){jQuery(this).remove()})}))}).prependTo(d)},z=function(b){var c=d.children(".options-"+b);d.children(".options.visible").each(function(){c.attr("class")!=jQuery(this).attr("class")&&jQuery(this).slideUp("fast").removeClass("visible")});c.hasClass("visible")?c.slideUp("fast").removeClass("visible"):
				c.slideDown("fast").addClass("visible");return false},s=function(){d.children(".options.visible").slideUp("fast").removeClass("visible")},v=function(b,c,g){if(b=="satellite"){a.satellitetype=c.children("input:radio[name=sati]:checked").val();f.getState().custom.sati=a.satellitetype}else if(b=="radar"){a.radarpalette=c.children("input:radio[name=radp]:checked").val();f.getState().custom.radp=a.radarpalette}else if(b=="obs-rose"){a.xobrop=0;if(c.find("input:checkbox[name=obsa]").is(":checked"))a.xobrop|=
				128;if(c.find("input:checkbox[name=obsb]").is(":checked"))a.xobrop|=1024;if(c.find("input:checkbox[name=obsc]").is(":checked"))a.xobrop|=256;if(c.find("input:checkbox[name=obsd]").is(":checked"))a.xobrop|=64;if(c.find("input:checkbox[name=obse]").is(":checked"))a.xobrop|=2048;if(c.find("input:checkbox[name=obsf]").is(":checked"))a.xobrop|=512;if(c.find("input:checkbox[name=obsg]").is(":checked"))a.xobrop|=4096;if(c.find("input:checkbox[name=obsh]").is(":checked"))a.xobrop|=32;a.xobrop|=16;a.xobrop|=
				4;f.getState().custom.obr=a.xobrop}else if(b=="obs-field"){a.xobff=parseInt(c.children("input:radio[name=obsf]:checked").val());f.getState().custom.off=a.xobff}else if(b=="obs-contour"){a.xobcf=parseInt(c.children("input:radio[name=obsc]:checked").val());f.getState().custom.ocf=a.xobcf}f.getState().write();l();g||d.children(".options.visible").slideUp("fast").removeClass("visible");return false},l=function(){r!=-1&&clearTimeout(r);if(y)a.scope=q.length?parseInt(q.val()):a.scope;else a.frames=m.length?
				parseInt(m.val()):4;if(a.satellitetype)if((a.satellitedimensions=="960x720"||!a.lt.match(/^wz.+/g))&&!a.satellitetype.match(/sat_(vis)|(ir)/g))a.satellitetype="sat_bw";if(a.xsat)a.xsatt=a.satellitetype;jQuery.ajax({url:"http://data.weatherzone.com.au/json/animator/",data:a,dataType:"jsonp",jsonpCallback:"cbrad071",cache:true,success:function(b){var c=[],g=[],t=[];g.rad=[];jQuery.each(b.frames,function(p,e){g.rad.push(new AnimatorFrame(e.image,new Date(e.timestamp),e.timestamp_string))});b.frames.length==
				0&&g.rad.push(new AnimatorFrame("http://resources.weatherzone.com.au/wz/images/widgets/widget_transparent.png",new Date));t.push("rad",g.rad);if(b.extras)for(var i in b.extras)if(b.extras[i].frames){g[i]=[];jQuery.each(b.extras[i].frames,function(p,e){g[i].push(new AnimatorFrame(e.image,new Date(e.timestamp)))});b.extras[i].frames.length==0&&g[i].push(new AnimatorFrame("http://resources.weatherzone.com.au/wz/images/widgets/widget_transparent.png",new Date));t.push(i,g[i])}if(f!=null)f.setLayerFrames(t);
				else{c.push(new AnimatorLayer("terrain","Terrain",true,true,[new AnimatorFrame("http://data.weatherzone.com.au/maplayers/wz/terrain/terrain_radarz_071_640x480.jpg")],false));c.push(new AnimatorLayer("rad","Radar",true,true,g.rad,false));master=c.length-1;c.push(new AnimatorLayer("rivers","Rivers",true,false,[new AnimatorFrame("http://data.weatherzone.com.au/maplayers/wz/drainage/drainage_radarz_071_640x480.gif")],false));c.push(new AnimatorLayer("roads","Roads",true,false,[new AnimatorFrame("http://data.weatherzone.com.au/maplayers/wz/roads/roads_radarz_071_640x480.gif")],
				false));c.push(new AnimatorLayer("borders","Borders",true,false,[new AnimatorFrame("http://data.weatherzone.com.au/maplayers/wz/borders/borders_radarz_071_640x480.png")],false));c.push(new AnimatorLayer("towns","Locations",true,true,[new AnimatorFrame("http://data.weatherzone.com.au/maplayers/wz/locations/locations_radarz_071_640x480.gif")]));c.push(new AnimatorLayer("obf","Rainfall",true,false,g.obf,false));f=new Animator(h,c,master,"/radar");f.setDomain(149.7698,-34.7809,2.88,2.16);f.initialise();
				n!=null&&f.setOrigin(n.x,n.y,n.name);f.getState().visibility.lig&&o('High-resolution lightning is available to Pro members. Get a <a href="/join/">free trial<\/a>!',"info");u.children(".sat").each(function(){var p=jQuery(this).children("label"),e=p.text().toLowerCase().replace(" ","-");p.wrapInner(jQuery("<a/>").attr("href","#").click(function(){z(e);return false}));d.children(".options-"+e).css({left:jQuery(this).offset().left-jQuery(this).parent().offset().left+"px"});d.find(".options-"+e).click(function(A){A.stopPropagation()});
				d.find(".options-"+e+" .close").click(function(){s();return false});d.find(".options-"+e+" .apply").click(function(){v(e,jQuery(this).parent().parent())});d.find(".options-"+e+" .apply").length||d.find(".options-"+e+" input").click(function(){v(e,jQuery(this).parent(),true)})});w.click(s);d.children(".tracker").click(s);u.children(".obw, .obwc, .obc").each(function(){jQuery(this).children("label").append(jQuery("<sup/>").text(" beta").css({"font-size":"xx-small",color:"rgb(50, 80, 200)","font-style":"italic"}).attr("title",
				"This layer is experimental"))})}if(!b.current&&!a.dt)o("Current images are temporarily unavailable. Please select an alternative location.","error");else b.frames.length==0?o("Images for this time are unavailable. Please select an alternative time or location.","error"):o(b.frames.length+" images to "+b.frames[b.frames.length-1].timestamp_string,"info")}});r=setTimeout(l,3E5);return false};!(a.lt=="radarz"&&window.location.href.match(/\/doppler\/?$/))&&a.lt!="wzcountry"?k.children(".zoomout").click(function(){var b=
				window.location.href.match(/(\/\w+\/\w+\/[\w\-]+)/)[0];window.location=b+(a.lt=="radarzz"?"/128km":"")+(window.location.href.match(/\/doppler\/?$/)?"/doppler":"")}).attr("title","click to zoom out"):k.children(".zoomout").attr("disabled","disabled").addClass("disabled").attr("title","you are at the lowest zoom level");if(a.lt.match(/^wz*/i))k.children(".zoomin").attr("disabled","disabled").addClass("disabled").attr("title","use the links above or clickable map to zoom in");else a.lt=="radar"||a.lt.match(/radarz?$/gi)?
				k.children(".zoomin").click(function(){var b=window.location.href.match(/(\/\w+\/\w+\/[\w\-]+)/)[0];window.location=b+(a.lt=="radar"?"/128km":"/64km")+(window.location.href.match(/\/doppler\/?$/)?"/doppler":"")}).attr("title","click to zoom in"):k.children(".zoomin").attr("disabled","disabled").addClass("disabled").attr("title","you are at the highest zoom level");k.children(".doppler").click(function(){var b=window.location.href.match(/(\/radar\/\w+\/[\w\-]+)/)[0];b+=a.lt=="radarzz"?"/64km":"/128km";
				window.location=jQuery(this).hasClass("velocity")?b+"/doppler":b.replace(/\/doppler.*/,"")});x.click(l);m.change(function(){f.getState().custom.f=jQuery(this).children("option:selected").text();f.getState().write();l()});q.change(l);var j=new AnimatorState(h);j.read();j.custom&&j.custom.f&&m.children("option").each(function(){if(jQuery(this).text()==j.custom.f){jQuery(this).siblings("option").removeAttr("selected");jQuery(this).attr("selected","selected")}});a.satellitetype=j.custom&&j.custom.sati?
				j.custom.sati:a.satellitetype;d.find(".options-satellite input:radio[value="+a.satellitetype+"]").attr("checked","checked");if(a.satellitedimensions=="960x720"||!a.lt.match(/^(wzcountry)|(wzstate)$/g)){d.find(".options-satellite input:radio[value=sat]").attr("disabled","disabled");d.find(".options-satellite input:radio[value=sat_wv_bw]").attr("disabled","disabled")}l()};
				//]]>
				</script>
				<div id="an_rad_animation" class="animator-map full 071">
					<div class="zoomnav"></div>
					<div id="an_rad_position" class="position"></div>
					<div id="an_rad_timestamp" class="timestamp"></div>
					<div class="options options-satellite">
						<h4>
							Satellite Image
						</h4><input type="radio" id="sati0" name="sati" value="sat" /><label for="sati0">Terrain IR</label><br />
						<input type="radio" id="sati1" name="sati" value="sat_bw" /><label for="sati1">Black &amp; White IR</label><br />
						<input type="radio" id="sati2" name="sati" value="sat_vis" /><label for="sati2">Visible</label><br />
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
							light <img src="http://resources.weatherzone.com.au/wz/images/widgets/nav_dbz_scale.gif" alt="dBZ scale" title="dBZ scale" align="top" />heavy
						</div><strong>Bureau of Meteorology Weather Radar</strong>
					</div>
				</div><script type="text/javascript">

																//<![CDATA[

																anim_an_rad('an_rad');

																//]]>

				</script>
			</div><!-- end Live Radar -->
		</td>
	</tr>
</table>
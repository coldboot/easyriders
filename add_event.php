<?php
include("include/dbconnect.php");
include("include/constants.php");

$type = $_GET['type'];
$flag = $_GET['flag'];

if ($type == "Event")
{
	$button = "/images/addevent_button.gif";
}
else	// Default to Ride
{
	$type = "Ride";
	$button = "/images/addride_button.gif";
}

if($curuser == "")	// Set by include/constants.php if user logged in
{
	$flag="notloggedin";
}
elseif(isset($_POST['submit_x']))
{
    $etype=$_POST['etype'];
    $eyear=$_POST['eyear'];
    $emonth=$_POST['emonth'];
    $eday=$_POST['eday'];
    $ehour=$_POST['ehour'];
    $eminute=$_POST['eminute'];
    $eampm=$_POST['eampm'];
    if ($eampm == "PM")
    {
		$ehour = $ehour + 12;
	}
    $ename=htmlspecialchars($_POST['ename'], ENT_QUOTES);
    $erouteid= (int) $_POST['erouteid'];
    $epace=htmlspecialchars($_POST['epace'], ENT_QUOTES);
    $epagenum=(int) $_POST['epagenum'];
    $enotifygroup=$_POST['enotifygroup'];
    $enotifycreator=$_POST['enotifycreator'];
	//** Convert date and time into datetime
    $edatetime = $eyear."-".$emonth."-".$eday." ".$ehour.":".$eminute.":00";
    $edate = $eyear."-".$emonth."-".$eday;
    $etime = $ehour.":".$eminute.":00";

	if ($erouteid > 0)	// Set rdie name from selected route
	{
		$select=mysql_query("select * from tbl_cycling_routes where route_id ='$erouteid'");
		$fetch=mysql_fetch_array($select);
		$ename = $fetch['route_name'];
	}

    $flag= "error";

	$ins_ev="INSERT INTO tbl_cycling_events
				 (`event_datetime`,`event_type`,`event_date`,`event_time`,`event_name`,`event_pace`,`event_route_id`,`event_pagenum`,`event_notifygroup`,`event_notifycreator`,`event_createdby`) VALUES
				 ('$edatetime'    ,'$etype'    ,'$edate'    ,'$etime'    ,'$ename'    ,'$epace'    ,$erouteid       ,$epagenum      ,'$enotifygroup'    ,'$enotifycreator'    ,'$userid' )";

	$res=mysql_query($ins_ev);
	if (!$res) {
		$message  = 'Invalid query: ' . mysql_error() . '\n';
		$message .= 'Whole query: ' . $ins_ev;
		die($message);
	}
	/* Assume succcess */
	$flag="success";

	/* Get the group email address */
	$sel_adm=mysql_query("select * from tbl_cycling_adminprofile");
	$fet_adm=mysql_fetch_array($sel_adm);

	if ($enotifygroup == "yes")
	{
		$groupemail=$fet_adm['varGroupEmail'];	// Send to whole group
	}
	else
	{
		$groupemail=$fet_adm['varEmail'];		// Send to admins instead
	}
//	$groupemail="drastic@measures.com.au";

	$edt = strtotime ($edatetime);
	$etimestr = date ("D j M g:i A", $edt);
	$message="<b>New $etype posted on the Sydney Easy Riders website by $curuser<br><br>$ename<br>$etimestr<br>$epace<br>
		<a href=\"/calendar.php?page=calendar\" target=\"_blank\">www.sydney-easy-riders.com.au/calendar.php?page=calendar</a><br>";
	$email11="calendar@sydney-easy-riders.com.au";
	$subject = "New $etype proposed by $curuser - $ename $etimestr";
	$headers = "From: ".$email11."\r\r\n";
	$headers .= "Reply-To: ".$email11."\r\r\n";
	$headers .= "MIME-Version: 1.0\r\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\r\n";
	mail($groupemail,$subject,$message,$headers);

	header("Location:add_event.php?type=$type&flag=$flag");
}

?>

<script type="text/javascript" language="javascript">
function imposeMaxLength(fld,len)
{
	if(fld.value.length > len) { alert("You Reached Maximum Character Limit"); fld.value = fld.value.substr(0,len-1); }
}

function validateEvent(theForm)
{
	// alert ("Running validation");

	var d = theForm.eday.value;
	var m = theForm.emonth.value;

	if (d == "31")
	{
		if (m == "02" || m == "04" || m == "06" || m == "04" || m == "09" || m == "11")
		{
			alert ("Please Enter A Valid Date");
			theForm.eday.focus();
			return false;
		}
	}
	if (m == "02" && (d == "29" || d == "30"))
	{
		alert ("Please Enter A Valid Date");
		theForm.eday.focus();
		return false;
	}

	<?php if ($type=="Ride") { ?>
	if (theForm.erouteid.value == "0" && theForm.ename.value.length == 0)
	<?php } else { ?>
	if (theForm.ename.value.length == 0)
	<?php } ?>
	{
		alert ("Please Enter <?php echo $type;?> Name");
		theForm.ename.focus();
		return false;
	}

	if (theForm.epace.value.length == 0)
	{
		<?php if ($type=="Ride") { ?>
		alert ("Please Enter A Ride Pace");
		<?php } else { ?>
		alert ("Please Enter An Event Location");
		<?php } ?>
		theForm.epace.focus();
		return false;
	}

	return true;
}

function RouteChanged(changedEvent) 	// Hide the name box when a route is selected, show it when New is selected.
{
	if (changedEvent.value == "0")
	{
		document.getElementById("ename").style.visibility = "visible";
	}
	else
	{
		document.getElementById("ename").style.visibility = "hidden";
	}
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Easy Riders-Register</title>
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
                <td width="700" valign="top">
                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
					<td colspan="2" class="head_big"><?php echo "Add $type";?></td>
                  </tr>
				  <tr><td colspan="2" >&nbsp;</td></tr>
                    <?php if($flag=="success"){?>
					<tr>
						<td colspan="2" align="center" style="color:#000033; font-weight:bold; font-size:18px;"><?php echo $type;?> added successfully</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<?php } else if($flag=="error"){
					?>
                    <tr>
 						<td colspan="2" align="center" style="color:#FF0000; font-weight:bold; font-size:18px;">Failed to add <?php echo $type;?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<?php } else if($flag=="notloggedin"){
					?>
                    <tr>
 						<td colspan="2" align="center" style="color:#FF0000; font-weight:bold; font-size:18px;">You must be logged in to Add <?php echo $type;?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<?php }	?>

                    <tr>
                        <td width="8" class="side_left"></td>
                        <td bgcolor="#FFFFFF">

						  <form action="" method="post" enctype="multipart/form-data" name="add_event" onSubmit="return validateEvent(this);">
							<input name="etype" value="<?php echo $type;?>" type="hidden" />
						  <table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td valign="top">
								<table width="100%" border="0" align="left" cellpadding="5" cellspacing="0">
								  <tr>
									<td align="right" class="body_style">Date&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></td>
									<td align="right" class="body_style">:</td>
									<td>
									<select name="eday">
										<option value="01">01
										<option value="02">02
										<option value="03">03
										<option value="04">04
										<option value="05">05
										<option value="06">06
										<option value="07">07
										<option value="08">08
										<option value="09">09
										<option value="10">10
										<option value="11">11
										<option value="12">12
										<option value="13">13
										<option value="14">14
										<option value="15">15
										<option value="16">16
										<option value="17">17
										<option value="18">18
										<option value="19">19
										<option value="20">20
										<option value="21">21
										<option value="22">22
										<option value="23">23
										<option value="24">24
										<option value="25">25
										<option value="26">26
										<option value="27">27
										<option value="28">28
										<option value="29">29
										<option value="30">30
										<option value="31">31
									</select>
									<select name="emonth">
										<option value="01">Jan
										<option value="02">Feb
										<option value="03">Mar
										<option value="04">Apr
										<option value="05">May
										<option value="06">Jun
										<option value="07">Jul
										<option value="08">Aug
										<option value="09">Sep
										<option value="10">Oct
										<option value="11">Nov
										<option value="12">Dec
									</select>
									<select name="eyear">
										<option value="2013">2013
										<option value="2014">2014
										<option value="2015">2015
									</select>
									</td>
								  </tr>
								  <tr><td>&nbsp;</td></tr>
								  <tr>
									<td align="right" class="body_style">Time&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></td>
									<td align="right" class="body_style">:</td>
									<td>
									<select name="ehour">
										<option value="01">01
										<option value="02">02
										<option value="03">03
										<option value="04">04
										<option value="05">05
										<option value="06">06
										<option value="07">07
										<option value="08">08
										<option value="09">09
										<option value="10">10
										<option value="11">11
										<option value="12">12
									</select>
									<select name="eminute">
										<option value="00">00
										<option value="05">05
										<option value="10">10
										<option value="15">15
										<option value="20">20
										<option value="25">25
										<option value="30">30
										<option value="35">35
										<option value="40">40
										<option value="45">45
										<option value="50">50
										<option value="55">55
									</select>
									<select name="eampm">
										<option value="AM">AM
										<option value="PM">PM
									</select>
									</td>
								  </tr>
								  <tr><td>&nbsp;</td></tr>
								  <tr>
                    			<?php if($type=="Ride"){?>
									<td align="right" class="body_style">Ride Name<BR />(select New then type name below for new ride)<span style="color:#FF0000; font-weight:bold;">*</span></td>
                    			<?php } else {?>
									<td align="right" class="body_style">Event Name&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></td>
								<?php }	?>
									<td align="right" class="body_style">:</td>
									<td>
									<?php if ($type == "Ride") { ?>
  									<select name="erouteid" onchange="RouteChanged(this)">
										<option value="0">New</option>
									    <?php
		    							    $select=mysql_query("select * from tbl_cycling_routes");
		    							    while($fetch=mysql_fetch_array($select)) {
												if ($fetch['route_name'] !== "")
												{
													echo "<option value=\"".$fetch['route_id']."\">".$fetch['route_name']."</option>";
												}
											}
									    ?>
									  </select><BR>
									  <?php } ?>
									  <input name="ename" type="text" maxlength="60" style"visibility:hidden;" class="text_filed" id="ename" />
									</td>
								  <tr><td>&nbsp;</td></tr>
                    			<?php if($type=="Ride"){?>
								  <tr>
									<td align="right" class="body_style">Pace&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></td>
									<td align="right" class="body_style">:</td>
									<td><input name="epace" type="text" maxlength="40" class="text_filed" id="epace" /></td>
								  </tr>
								  <tr><td>&nbsp;</td></tr>
                    			<?php } else {?>
								  <tr>
									<td align="right" class="body_style">Location&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></td>
									<td align="right" class="body_style">:</td>
									<td><input name="epace" type="text" maxlength="40" class="text_filed" id="epace" /></td>
								  </tr>
								  <tr><td>&nbsp;</td></tr>
								<?php }	?>
								  <tr><td>&nbsp;</td></tr>
							 	  <tr>
									<td align="right" class="body_style">Optional number of blog page with more info<BR>(the bit after the "/?p=" in the url)</td>
									<td align="right" class="body_style" valign="top">:</td>
									<td valign="top"><input name="epagenum" type="number" class="text_filed" id="epagenum" /></td>
								  </tr>
							 	  <tr>
									<td align="right" class="body_style">Send email notifying group of new event</td>
									<td align="right" class="body_style">:</td>
									<td><select name="enotifygroup"><option value="yes">yes</option><option value="no">no</option></select></td>
								  </tr>
							 	  <tr>
									<td align="right" class="body_style">Notify me when someone joins or leaves</td>
									<td align="right" class="body_style">:</td>
									<td><select name="enotifycreator"><option value="yes">yes</option><option value="no">no</option></select></td>
								  </tr>
								  <tr><td>&nbsp;</td></tr>
								  <tr>
									<td align="right" valign="top" class="body_style">&nbsp;</td>
									<td align="right" valign="top" class="body_style">&nbsp;</td>
									<td>
									  <table border="0" cellspacing="0" cellpadding="3">
									    <tr>
									  	  <td>
										   <input type="image" src=<?php echo "\"$button\"";?>" width="69" height="29" border="0" name="submit" value="submit" />
								          </td>
									    </tr>
									  </table>
									</td>
								  </tr>
								</table>
							  </td>
							  </tr>
							  <tr>
								<td style="color:#FF0000; font-size:12px;">* Indicates Required Information</td>
							  </tr>
							  <tr>
								<td align="center">&nbsp;</td>
							  </tr>
						  </table>
						</form>
					  </td>
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
			  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td width="23%">&nbsp;</td>
				  <td width="77%">&nbsp;</td>
				</tr>
			  </table></td>
			</tr>
			<tr>
			  <td align="center" class="head_big">&nbsp;</td>
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
      </tr><strong></strong>

    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>


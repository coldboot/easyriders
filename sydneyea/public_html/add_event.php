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

// Get the ride name if logged in
$sess=$_SESSION["Session_UserId1"];
$curuser="";
if ($sess != "")
{
	$userid=$_SESSION["Session_UserId1"];
	$sel="select * from `tbl_cycling_membernew` where `intmemberid`='$userid'";
	$res=mysql_query($sel);
	if (!$res) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $sel;
		die($message);
	}
	$fetch=mysql_fetch_array($res);
	$curuser=$fetch['varRidename'];
	// echo $curuser;
}

if($curuser == "")
{
	$flag="notloggedin";
}
elseif(isset($_POST['submit_x']))
{
    $etype = $_POST['etype'];
    $edatetime=$_POST['edatetime'];
    $ename = htmlspecialchars($_POST['ename'], ENT_QUOTES);
    $erouteid = (int) $_POST['erouteid'];
    $epace = htmlspecialchars($_POST['epace'], ENT_QUOTES);
    $edesc = htmlspecialchars($_POST['edesc'], ENT_QUOTES);
    $enotifygroup = $_POST['enotifygroup'];
    $enotifycreator = $_POST['enotifycreator'];

	//** Convert datetime into date and time
    $edate = substr($edatetime,0,10);
    $etime = substr($edatetime,11,8);

	if ($erouteid > 0)	// Set rdie name from selected route
	{
		$select=mysql_query("select * from tbl_cycling_routes where route_id ='$erouteid'");
		$fetch=mysql_fetch_array($select);
		$ename = $fetch['route_name'];
	}

    $flag= "error";

	$ins_ev="INSERT INTO tbl_cycling_events
				 (`event_datetime`,`event_type`,`event_date`,`event_time`,`event_name`,`event_pace`,`event_route_id`,`event_desc`,`event_notifygroup`,`event_notifycreator`,`event_createdby`) VALUES
				 ('$edatetime'    ,'$etype'    ,'$edate'    ,'$etime'    ,'$ename'    ,'$epace'    ,$erouteid       ,'$edesc'    ,'$enotifygroup'    ,'$enotifycreator'    ,'$userid' )";

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
	$message="<b>New $etype proposed by $curuser<br><br>$ename<br>$etimestr<br>$epace<br>$edesc<br>
		<a href=\"/calendar.php?page=calendar\" target=\"_blank\">www.sydney-easy-riders.com.au/calendar.php?page=calendar</a><br>";
	$email11="calendar@sydney-easy-riders.com.au";
	$subject = "$ename $etimestr";
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

	var t = theForm.edatetime.value.substring(11);

	if (t == "00:00:00")
	{
		alert ("Please Enter A Time");
		theForm.edatetime.focus();
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
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8" />
<title>Welcome to Easy Riders - Add Event</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon new.ico" type="image/x-icon">
<link rel="icon" href="/favicon new.ico" type="image/x-icon">
<script src="images/galleryscript.js" type="text/javascript"></script>
<link id='theme' rel='stylesheet' href='/humane-themes/bold-dark.css'/>
<script src='/humane.js'></script>

<link href="jquery/css/blitzer/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<script src="jquery/js/jquery-1.9.1.js"></script>
<script src="jquery/js/jquery-ui-1.10.3.custom.js"></script>
<link href="jquery/css/jquery-ui-timepicker-addon.css" rel="stylesheet">
<script src="jquery/js/jquery-ui-timepicker-addon.js"></script>

<script>
$(function() {
	$( "#datetimepicker" ).datetimepicker({
		dateFormat: "D dd-M-yy",
		timeFormat: "h:mm TT",
		altField: "#edatetime",
		altFieldTimeOnly: false,
		altFormat: "yy-mm-dd",
		altTimeFormat: "HH:mm:00",
		altSeparator: " ",
		stepMinute: 5,
		addSliderAccess: true,
		sliderAccessArgs: { touchonly: false }
		});
});
</script>

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
 						<td colspan="2" align="center" style="color:#000033; font-weight:bold; font-size:18px;">Failed to add <?php echo $type;?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<?php } else if($flag=="notloggedin"){
					?>
                    <tr>
 						<td colspan="2" align="center" style="color:#000033; font-weight:bold; font-size:18px;">You must be logged in to Add <?php echo $type;?></td>
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
									<td align="right" class="body_style">Date and Time<span style="color:#FF0000; font-weight:bold;">*</span></td>
									<td align="right" class="body_style">:</td>
									<td><input type="text" name="datetimepicker" id="datetimepicker" size="30">
									    <input type="hidden" name="edatetime" id="edatetime"</td>
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
							 	  <tr>
									<td align="right" class="body_style" valign="top">Description</td>
									<td align="right" class="body_style" valign="top">:</td>
									<td valign="top"><textarea name="edesc" cols="45" rows="10" class="text_area" id="edesc" onKeyPress="imposeMaxLength(this,1200);"></textarea><br /><span class="body_style">(Maximum 1200 Characters)</span></td>
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


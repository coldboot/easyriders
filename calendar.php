<?php
	include("include/dbconnect.php");
	include("include/constants.php");
	// include("include/paging.php");
	// include("include/functions.php");

	// Get the ride name if logged in
	$sess=$_SESSION["Session_UserId1"];
	$curuser="";
	$curemail="";
	$userid =0;
	if ($sess != "")
	{
		$userid=$_SESSION["Session_UserId1"];
		$sel="select * from `tbl_cycling_membernew` where `intmemberid`='$userid'";
		$res=mysql_query ($sel);
		if (!$res) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $sel;
			die($message);
		}
		$fetch=mysql_fetch_array($res);
		$curuser=$fetch['varRidename'];
		$curemail=$fetch['varEmail'];
	}

	// Save an event booking if event id passed on command line
	$event = (int) $_GET['event'];
	$join = (int) $_GET['join'];

	/* echo "curuser=$curuser event=$event join=$join \n"; */

	if ($event != 0 && $userid > 0)
	{
		$sel_ev="select * from tbl_cycling_attendees where event_id=$event AND rider_id='$userid'";
		$res=mysql_query($sel_ev);
		$num_ev = (int) mysql_num_rows($res);

		$ins_ev ="";
		if ($join == 1 && $num_ev == 1)			// delete atendence
		{
			$ins_ev="delete from tbl_cycling_attendees where event_id=$event AND rider_id='$userid'";
			$joinstr = "piked from";
		}
		else if ($join == 0 && $num_ev == 0)	// add attendence
		{
			$ins_ev="INSERT INTO `tbl_cycling_attendees` (`event_id`, `rider_id`) VALUES ('$event', '$userid')";
			$joinstr = "joined";
        }

		if ($ins_ev != "")						// Add or delete
		{
			$res=mysql_query($ins_ev);
			if (!$res) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $ins_ev;
				die($message);
			}
			// Send email to ride owner
			$evqry	= "SELECT * FROM tbl_cycling_events WHERE event_id = '$event'";
			$Notify_event = mysql_query($evqry);
			if (!$Notify_event) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $evqry;
				die($message);
			}
			$Notify_fetch = mysql_fetch_array($Notify_event);

			$notify = $Notify_fetch['event_notifycreator'];
			if ($notify == "yes")
			{
				$notifywho = (int) $Notify_fetch['event_createdby'];
				$selwho="select * from `tbl_cycling_membernew` where `intmemberid`='$notifywho'";
				$reswho=mysql_query ($selwho);
				if (!$reswho) {
					$message  = 'Invalid query: ' . mysql_error() . "\n";
					$message .= 'Whole query: ' . $selwho;
					die($message);
				}
				$fetchwho=mysql_fetch_array($reswho);
				$notifyemail=$fetchwho['varEmail'];

				$edt = strtotime ($Notify_fetch['event_datetime']);
				$etimestr = date ("D j M g:i A", $edt);
				$ename = $Notify_fetch['event_name'];
				$epace = $Notify_fetch['event_pace'];
				$etype = $Notify_fetch['event_type'];

				$message="<b>$curuser $joinstr the $etype you posted on the Sydney Easy Riders website<br>Rider email: $curemail<br><br>$ename<br>$etimestr<br>$epace<br>
					<a href=\"http://www.sydney-easy-riders.com.au/calendar.php?page=calendar\" target=\"_blank\">www.sydney-easy-riders.com.au/calendar.php?page=calendar</a><br>";

				$email11="calendar@sydney-easy-riders.com.au";
				$subject = "$curuser $joinstr your $etype - $ename $etimestr";
				$headers = "From: ".$email11."\r\r\n";
				$headers .= "Reply-To: ".$email11."\r\r\n";
				$headers .= "MIME-Version: 1.0\r\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\r\n";
				mail($notifyemail,$subject,$message,$headers);
				// echo "Email sent to '$notifyemail', Subject '$subject', Message '$message', Headers '$headers'";
				// break;
			}
		}
	}

	// Get today's date
	$today = date("Y-m-d");

	// Get the current position in the list if passed on the command line
	$offset = (int) $_GET['offset'];
	$total = (int) $_GET['total'];
	$pageno = (int) $_GET['pageno'];
	$limit = 20;

	if ($pageno == 0 && $offset == 0 && $total == 0) // If nothing set, calculate the list of events
	{
		/* echo "Getting counts\n"; */

		$pagqry = "SELECT * FROM tbl_cycling_events order by event_datetime";
		$res=mysql_query($pagqry);
		if (!$res) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $pagqry;
			die($message);
		}
		$total = mysql_num_rows($res);

		$foo = 0;
		while($foo == 0 && $fetch=mysql_fetch_array($res))
		{
			$dt=$fetch['event_date'];
			if ($today > $dt)
			{
				// echo "$offset:$dt\r\n";
				$offset++;
			}
			else
			{
				// echo "Stopping on $offset:$dt\r\n";
				$foo = 1;
			}
		}

		$pageno = (INT) ($offset / $limit);
		if ($offset > 0)
		{
			$pageno = $pageno + 1;
			$offset--;
		}
	}
/*
	echo "total=$total pageno=$pageno offset=$offset";
	$pageno  = 0;
	$offst = 0;
	$limit = 20;
	$total = 10;
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $MetatagKey; ?>" />
<meta name="description" content="<?php echo $metatagDesc; ?>" />

<title>Easy Riders Calendar</title>
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
    <td>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr><td>&nbsp;</td></tr>
	    <tr>
		  <td>
		    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td><img src="images/midpage_top.png" width="998" height="20" /></td>
			  </tr>
			  <tr>
			    <td class="page_mid">
				  <table width="990" border="0" cellspacing="0" cellpadding="0">
				    <tr>
					  <td width="240" valign="top"><?php include("sidebar.php"); ?></td>
				  	  <td width="20">&nbsp;</td>
					  <td width="730" valign="top" class="body_style">
					    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
						  <tr>
						    <td colspan="3" valign="top" class="head_big">ER Rides and Events</br></td>
						    <td valign="top"><?php if ($curuser!="") { echo "<a href=\"add_event.php?type=Ride\"><img src=\"images/addride_button.gif\" width=\"69\" height=\"29\" /></a>"; } else { echo "&nbsp;"; } ?></td>
						    <td valign="top"><?php if ($curuser!="") { echo "<a href=\"add_event.php?type=Event\"><img src=\"images/addevent_button.gif\" width=\"69\" height=\"29\" /></a>"; } else { echo "&nbsp;"; } ?></td>
						  </tr>
						  <tr>
							<td class="body_table0">Date</td>
							<td class="body_table0">Time</td>
							<td class="body_table0">Ride/Event</td>
							<td class="body_table0">Pace</td>
							<td class="body_table0">Join</td>
						  </tr>
						<?php
						$i=$offset ;
 						$evqry	= "SELECT * FROM tbl_cycling_events, tbl_cycling_routes WHERE event_route_id = route_id ORDER BY event_datetime LIMIT $offset,$limit";
						$R_events = mysql_query($evqry);
						if (!$R_events) {
							$message  = 'Invalid query: ' . mysql_error() . "\n";
							$message .= 'Whole query: ' . $evqry;
							die($message);
						}
						while($fetch=mysql_fetch_array($R_events))
						{
							$i++;
							$estrdate = $fetch['event_datetime'];
							$edatetime = strtotime( $estrdate );
							$edate=date( 'D j M', $edatetime );
							$etime=date( 'h:i A', $edatetime );
							$eid=$fetch['event_id'];
							$ename=$fetch['event_name'];
							$epace=$fetch['event_pace'];
							$eurl=$fetch['route_url'];
							$epagenum=$fetch['event_pagenum'];
							if (strlen($eurl) == 0 && $epagenum > 0)	// Set the blog url if nothing set on the route
							{
								$eurl = "/blog/?p=".$epagenum;
							}
							$attqry	= "select varRidename from tbl_cycling_attendees, tbl_cycling_membernew WHERE event_id=$eid AND tbl_cycling_attendees.rider_id=tbl_cycling_membernew.intmemberid ORDER BY varRidename";
							$R_Attendees = mysql_query($attqry);
							if (!$R_Attendees) {
								$message  = 'Invalid query: ' . mysql_error() . "\n";
								$message .= 'Whole query: ' . $evqry;
								die($message);
							}
							$attendees ="";
							$joined = 0;
							$j = 0;
							while($fetchatt=mysql_fetch_array($R_Attendees))
							{
								if ($j == 0)
								{
									$attendees = "Riders: ";
								}
								else
								{
									$attendees = $attendees . ", ";
								}
								$attendee = $fetchatt['varRidename'];
								$attendees = $attendees . $attendee;
								if ($curuser != "" && $curuser == $attendee)
								{
									$joined = 1;
								}
								$j++;
							}
						?>
						  <tr>
						    <td align="left" valign="top" class="body_table1n"><?php echo $edate;?></td>
						    <td align="left" valign="top" class="body_table1n"><?php echo $etime;?></td>
						    <td align="left" valign="top" class="body_table1"><?php if (strlen($eurl) > 0) { echo "<a href=\"$eurl\">"; } echo $ename; if (eurl!="") { echo "</a>"; }?></td>
						    <td align="left" valign="top" class="body_table1"><?php echo $epace;?></td>
						    <td align="left" valign="top" class="body_table1"><?php
							if ($curuser == "")
							{
								echo "&nbsp;";
							}
							else
							{
								echo "<a href=\"calendar.php?page=calendar&event=$eid&join=$joined&pageno=$pageno&offset=$offset&total=$total\" >";
								if ($joined == 1)
								{
									echo "Pike";
								}
								else
								{
									echo "Join";
								}
								echo "</a>";
							}
							?>
							</td>
						  </tr>
						  <tr>
						    <td colspan="5" class="body_table2"><?php echo $attendees;?></td>
						  </tr>
						<?php
						}
						if ($i < $total || $pageno > 0)
						{
							echo "<tr><td>";
							if ($pageno > 0)
							{
								$pageprev = $pageno - 1;
								$offsetprev = $offset - $limit;
								if ($offsetprev < 0) { $offsetprev = 0; }
								echo "<a href=\"calendar.php?page=calendar&pageno=$pageprev&offset=$offsetprev&total=$total\"><img src=\"images/prev_button.gif\" width=\"69\" height=\"29\" /></a>";
							}
							else
							{
								echo "&nbsp;";
							}
							echo "</td><td colspan=\"4\">";
							if ($i < $total)
							{
								$pagenext = $pageno + 1;
								$offsetnext = $offset + $limit;
								if ($offsetnext > $total) { $offsetnext = $total - $limit; }
								if ($offsetnext < 0) { $offsetnext = 0; }
								echo "<a href=\"calendar.php?page=calendar&pageno=$pagenext&offset=$offsetnext&total=$total\"><img src=\"images/next_button.gif\" width=\"69\" height=\"29\" /></a>";
							}
							else
							{
								echo "&nbsp;";
							}
							echo "</td></tr>";
						}
						?>
					    </table>
					  </td>
				    </tr>
				  </table>
			    </td>
			  </tr>
			  <tr>
			    <td><img src="images/midpage_bottom.png" width="998" height="20" /></td>
			  </tr>
		    </table>
		  </td>
	    </tr>
	  </table>
    </td>
  </tr>
  <tr>
    <td><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>

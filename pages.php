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

<title>Welcome to Easy Riders-<? echo $fetchcms['title']; ?></title>
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
                <td width="20">&nbsp;</td>
                <td width="730" valign="top">
                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
					<td class="head_big"><span style="font-size: 20px; font-weight:bold;"><big><?php echo $fetchcms['title'];?></big></span></td>
                  </tr>
				  <tr><td>&nbsp;</td></tr>
				  <tr>
					<td class="body_style_new"><?php echo stripslashes($fetchcms['description']);?></td>
                  </tr>
                  <?php
					if ($fetchcms['title'] == "July Challenge")		// Horible hardcode bit to add the rides table
					{
						$timenow = date('Y-m-d H:i:s');

						$res_sql = "SELECT varRidename, count(varRidename) as count
									FROM tbl_cycling_events ev, tbl_cycling_attendees at, tbl_cycling_membernew me
									WHERE ev.event_type = 'ride'
									AND ev.event_datetime >= '2013-07-01 00:00:00'
									AND ev.event_datetime < '$timenow'
									AND ev.event_id = at.event_id
									AND at.rider_id = me.intmemberid
									GROUP BY me.varRidename
									ORDER BY count DESC";

						$res=mysql_query ($res_sql);
						if (!$res)
						{
							$message  = 'Invalid query: ' . mysql_error() . "\n";
							$message .= 'Whole query: ' . $res_sql;
							die($message);
						}
						$num_riders = (int) mysql_num_rows($res);
						if ($num_riders > 0)
						{
							echo '<tr>';
							echo '<td class="body_style_new">';
							echo '<table width="75%" border "1" align="left" cellpadding="1" cellspacing="1">';
							echo '<tr><th align="left"><b>Rider</b></th><th align="right"><b>Rides</b></th></tr>';
							while($fetch=mysql_fetch_array($res))
							{
								$rider = $fetch['varRidename'];
								$rides = $fetch['count'];
								echo '<tr><td width="75%" align="left">'.$rider.'</td><td width="25%" align="right">'.$rides.'</td></tr>';
							}
							echo '</table></td></tr>';
						}
					}
                  ?>

                </table>
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
</body>
</html>
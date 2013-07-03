<?php
include('header.php'); 

$id=$_REQUEST['id'];


	
	$limqry		= "SELECT * FROM ".ORDERS." WHERE  orderid='$id' ";
	$query	= mysql_query($limqry);
	$rosw   = mysql_num_rows($query);
	if($rosw>0)
	{
	$query_fetch=mysql_fetch_array($query);
	$memberids=$query_fetch['memberid'];

	
	$member_sel="select * from ".MEMBER." where `intmemberid`='$memberids'";
	$mysql_member=mysql_query($member_sel);
	$member_fetch=mysql_fetch_array($mysql_member);
	$memberid=$member_fetch['intmemberid'];
	$email=$member_fetch['varEmail'];
	$username=$member_fetch['varFirstname'].$member_fetch['varLastname'];
	$password=$member_fetch['varPassword'];
	$address=$member_fetch['varAddress'];
	$city=$member_fetch['varCity'];
	$country=$member_fetch['varCountry'];
	$postalcode=$member_fetch['varPostalcode'];
	
	$paymenttype=$member_fetch['paymenttype'];
	$productname=$query_fetch['productname'];
	$productid=$query_fetch['productid'];
		$productid1=$query_fetch['songid'];
$sel="select * from tbl_gigband_song where `suserid`='$productid'";
	$res=mysql_query($sel);
	$fet_song=mysql_fetch_array($res);
	 $songname=$fet_song['songname'];
	 if($songname=="")
	 {
	 $sel1="select * from tbl_gigband_song where `suserid`='$productid1'";

	 $res1=mysql_query($sel1);
	 $fet1=mysql_fetch_array($res1);
	  $songname=$fet1['title'];
	  $creator=$fet1['creator'];
	  }
	 
	 
	 
	 
	$ordernumber=$query_fetch['ordernumber'];
	$orderstatus=$query_fetch['orderstatus'];


	$date=date("Y/m/d");
	
?>
	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<a name="viewcat"></a>	<h3>View Ordered Details</h3>
				</div>
	<div class="hastable">
<table width="68%" align="center" height="437" style="border:1px #EEEEEE solid;" cellpadding="0" cellspacing="0">
<tr><td colspan="3" align="right"><a href="javascript:history.back(1);">BacK To Order Page</a></td></tr>
  <tr>
    <td width="39%"></td>
    <td width="11%">&nbsp;</td>
    <td width="50%"><span style=" font-size:45px; color:#CCCCCC;"><strong>Credit Note</strong></span></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><span class="xl84">114 Culley Court, Evans business park</span></td>
        </tr>
      
      <tr>
        <td><span class="xl841">Orton southgate, Peterborough, PE26WA</span></td>
        </tr>
      <tr>
        <td><span class="xl842">Phone: 08452247017</span></td>
        </tr>
      <tr>
        <td><span class="xl843">Fax: 08452247032</span></td>
        </tr>
      <tr>
        <td><strong>Order Status:&nbsp;<?php echo ucfirst($orderstatus);?></strong> </td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Payment Type:&nbsp;Paypal</strong> </td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Order Number:&nbsp;<?php echo $ordernumber;?></strong> </td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
    <td><table width="100%"  cellspacing="0" cellpadding="0">
  <tr>
    <td width="44%"><span style=" font-size:15px; color:#CCCCCC;"><strong>DATE</strong>:</span></td>
    <td width="56%"><?php echo $date;?></td>
  </tr>
  <tr>
    <td><span style=" font-size:15px; color:#CCCCCC;"><strong>credit note</strong></span></td>
    <td><?php echo $ordernumber;?></td>
  </tr>
  <tr>
    <td><span style=" font-size:15px; color:#CCCCCC;"><strong>Buyer name</strong></span></td>
    <td><?php echo $username;?></td>
  </tr>
   <tr>
    <td><span style=" font-size:15px; color:#CCCCCC;"><strong>License Name</strong></span></td>
    <td><?php echo $productname;?></td>
  </tr>
  <tr>
    <td><span style=" font-size:15px; color:#CCCCCC;"><strong>Song Name</strong></span></td>
    <td><?php echo $songname;?></td>
  </tr>
  
  <tr>
    <td><span style=" font-size:15px; color:#CCCCCC;"><strong>Artist Name</strong></span></td>
    <td><?php echo $creator;?></td>
  </tr>
 <!-- <tr>
    <td><span style=" font-size:15px; color:#CCCCCC;"><strong>City</strong></span></td>
    <td><?php echo $city;?></td>
  </tr>
  <tr>
    <td><span style=" font-size:15px; color:#CCCCCC;"><strong>Country</strong></span></td>
    <td><?php echo $country;?></td>
  </tr>
  <tr>
    <td><span style=" font-size:15px; color:#CCCCCC;"><strong>Postal</strong></span></td>
    <td><?php echo $postalcode;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>-->
</table></td>
  </tr>
  <tr><td colspan="4">&nbsp;</td></tr>
  <tr><td colspan="4" align="center" width="97%" style="color:red; font-size:18px;">&nbsp;</td>
  </tr>
    <tr><td colspan="4">&nbsp;</td></tr>
  <tr><td colspan="4" align="center" width="97%">
<table cellpadding="2" cellspacing="2" border="1" width="97%">
  <tr bgcolor="#CCCCCC">
  
    <td colspan=""><span class="xl105" style="border-right:.5pt solid #BCBCBC"><strong>DESCRIPTION</strong></span></td>
	 <td colspan=""><span class="xl105" style="border-right:.5pt solid #BCBCBC"><strong>Quantity</strong></span></td>
    <td><span class="xl89" style="border-left:none"><strong>AMOUNT</strong></span></td>
  </tr>
  <?php 
   $sel_query="SELECT * FROM ".ORDERS." WHERE `orderid`='$id'";
	$fetch_results=mysql_query($sel_query) or die("Error:".mysql_error());
	$num_rows = mysql_num_rows($fetch_results);
	
  while($fetchss=mysql_fetch_array($fetch_results))
  {
  $sess=$fetchss['sessionid'];
  $sel="select * from ".TEMPCART." where `SessionId`='$sess'";
  $res=mysql_query($sel)or die(mysql_error());
  $fetch=mysql_fetch_array($res);
  echo '<tr>
    <td>'.$fetchss['productname'].'</td>
    <td>'.$fetchss['productquantity'].'</td>
    <td>'.$fetchss['productprice'].'</td>
  </tr>';
  
  $total=$fetchss['productprice']*$fetchss['productquantity'];
  $stotal=$total+$stotal;
  
  $vtotal = (17.50/100)*$stotal;
  $svtotal=$vtotal+$stotal;
  }
  
	?>  
  <tr><td colspan="3">&nbsp;</td></tr>
  <tr>
    <td colspan="2" align="right"><span style=" font-size:15px; color:#CCCCCC;"><strong><em>TOTAL</em></strong></span></td>
    <td><?php echo $symbol.number_format($stotal,2);?></td>
  </tr>
  <tr><td colspan="3" align="right"><a href="javascript:history.back(1);" >BacK To Order Page</a></td></tr>

</table>
</td></tr></table></div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div><?php 
 include('sidebar.php');
	?></div>
	<div class="clearfix"></div><?php
 include('footer.php'); 
?></body>
</html>
<?php

	}
?>
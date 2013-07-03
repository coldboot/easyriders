<?php

			 include('header.php'); 
			$cid  = $_GET['mid'];
			$page = $_GET['page'];
			//$stockwe = $_REQUEST['stock'];

	
		$sel_order = "SELECT * FROM ".CHECKOUT." WHERE `intId`='$cid'";
		$res_order = mysql_query($sel_order) or die("SELECT ERROR2".mysql_error());
		$fetch_order = mysql_fetch_array($res_order);
		$pro_id = $fetch_order['intProductId'];
		$quantity = $fetch_order['varQunatity'];
		$pro_ids = explode("|",$pro_id);
		$qties = explode("|",$quantity);
		
		$varFirstName = $fetch_order['varFirstName'];
		$varLastName =  $fetch_order['varLastName'];
		$intId =  $fetch_order['intId'];
		$varPayDate = gmdate('d-M-Y',$fetch_order['varPayDate']);
		$varAddress = $fetch_order['varAddress'];
		$varCity = $fetch_order['varCity'];
		$varState = $fetch_order['varState'];
		$varCountry = $fetch_order['varCountry'];
		$varPostcode = $fetch_order['varPostcode'];
		
		$varShipFirstName = $fetch_order['varShipFirstName'];
		$varShipLastName =  $fetch_order['varShipLastName'];
		$varShipAddress = $fetch_order['varShipAddress'];
		$varShipCity = $fetch_order['varShipCity'];
		$varShipState = $fetch_order['varShipState'];
		$varShipCountry = $fetch_order['varShipCountry'];
		$varShipZip = $fetch_order['varShipZip'];
		
?>
		<!--<p><strong>Here admin can View the Order Details. </strong></p>-->
	    </div>
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
					<h3> Order Details </h3>
				</div>
				<div class="hastable">
					<table width="80%"  border="0" align="center" cellpadding="4" cellspacing="2" class="tblebg">
						<tr class="bluesmall">
							<td width="100%" align="center" class="white"  ><strong>Order Details of </strong><strong><?php echo $varFirstName." ".$varLastName;?></strong></td>
						</tr>
						
						
						<tr class="bluesmall">
							<td align="left" class="white"  >
								<strong>
									Your Order number is <?php echo $intId;?><br />
									OrderStatus : <span style="color:red; font-variant:small-caps;"><?php echo $fetch_order['orderstatus']; ?></span><br />
									Pay Status : <span style="color:red; font-variant:small-caps;"><?php echo $fetch_order['paystaus']; ?></span>
								</strong>
							</td>
						</tr>
						
						<tr>
							<td align="left"   class="white"><strong>Your Order <?php echo $intId;?> received on <?php  echo $varPayDate; ?></strong></td>
						</tr>
						
						<tr>
							<td align="left"   class="white">
								<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" >
									<tr>
										<td width="50%" align="center"  style="font-size:12px; color:#000000;">Product Name</td>
										<td width="15%" align="center" style="font-size:12px; color:#000000;">Quantity</td>
										<td width="15%" align="center" style="font-size:12px; color:#000000;">Each</td>
										<td width="20%" align="center" style="font-size:12px; color:#000000;">Total</td>
									</tr>
									<?php 
									
									
$seletsessionid_Query="SELECT * FROM ".CHECKOUT." WHERE `intId`='$cid'";
$Result_seletsessionid=mysql_query($seletsessionid_Query) or die("SELECT ERROR2".mysql_error());
$fetch_seletsessionid=mysql_fetch_array($Result_seletsessionid);
$seletsessionid=$fetch_seletsessionid['intSessionId'];

									
$Product_Query="SELECT * FROM ".ORDER." WHERE `SessionId`='$seletsessionid'";
$Result_ProductCategory=mysql_query($Product_Query) or die("SELECT ERROR2".mysql_error());
$rows=mysql_num_rows($Result_ProductCategory);
$Rows_Cart	= mysql_num_rows($Result_ProductCategory);

    $i=0;
	$SubTotal=0;
	$total = 0;
	

	
while($fetch_cart=mysql_fetch_array($Result_ProductCategory))
{
//if($i%2==0)
//{
//$bgcolor="#ECECEC";
//}else{
//$bgcolor="#F2F2F2";
//}
$i++;

$intTempCartid=$fetch_cart['intTempCartid'];
$ProductName=stripslashes($fetch_cart['ProductName']);
$Price=$fetch_cart['Price'];
$ShippingAmount	=	$fetch_cart['ShippingAmount'];
$Attribiteid	=	$fetch_cart['intAttributeid'];
$attripriceid	=	$fetch_cart['AttripriceId'];
$Quantity=$fetch_cart['Quantity'];
$Total=$fetch_cart['Total'];
$Pro_Id=$fetch_cart['intProid'];


/*$sel_cat1="SELECT * FROM ".PRODUCT." WHERE `productId`='$Pro_Id'";	
$res_cat1=mysql_query($sel_cat1);
$fetch_cat1=mysql_fetch_array($res_cat1);
$productname=$fetch_cat1['productname'];
//$colorcode=$fetch_cat1['colorcode'];
//$proimage=$fetch_cat1['proimage'];
$intid=$fetch_cat1['intid'];
$intproductid=$fetch_cat1['intproductid'];
$Stock=$fetch_cat1['Stock'];


$articthumbimage="../../proimg/".$proimage; 
$size="50";
$dimension="Width";
$return=disphotofav($articthumbimage,$size,$dimension,$proimage);
$split=split("<>",$return);
$newwde=$split[0];
$newhde=$split[1];


$SubTotal=$SubTotal+$Total;

 $total_price=	$Quantity*$Price; 
   $total_price1=	$Quantity_1*$Price; 

 $quantytot=$total_price+$total_price1;*/
?>  <tr>
			    <td height="51" align="center" class="memname" valign="top"><span style="padding-bottom:20px;"><strong><?php echo $ProductName;?></strong></span></td>
				
			    
				 <td align="center" class="red"><?php echo $Quantity;?><br /></td>
				
				<td align="center">$<?php echo number_format($Price,2);?></td> 
				
				<td align="center">$<?php echo number_format($Total,2);?></td>
	</tr>
				
				<?php $i++;		
				  $total += $Total;
				 }
				 
						
				 ?>
			 <tr>
			 	<td></td>
			 	<td align="right" class="viewname" colspan="2">Grand Total</td>
				<td  align="center" class="viewname">$<?php echo number_format($total,2);?></td>
			</tr>
		</table>
	</td>
</tr>
<table>

<br/>
<table width="80%"  border="0" align="center" cellpadding="4" cellspacing="0" class="tblebg">
  <tr>
    <td width="220%" colspan="5" align="center" class="white"><span class="heading"><strong><?php echo $varFirstName."  ".$varLastName;?> Details</strong></span></td>
  </tr>
  
  <tr>
    <td colspan="5" align="left"  class="bluesmall"><table width="100%" border="0" cellpadding="1" cellspacing="2"  >
      
      <!--<tr>
        <td class="bluesmall"><table width="100%" border="0" >
          <tr>
            <td width="23%" class="white1">Name</td>
            <td width="77%" class="white1"><?php //echo $varFirstName.$varLastName;?></td>
          </tr>
          <tr>
            <td class="white1">E-Mail Address</td>
            <td class="white1"><?php //echo $varEmail;?></td>
          </tr>
          
          <tr>
            <td class="white1">Phone Number </td>
            <td class="white1"><?php //echo $varPhoneNo;?></td>
          </tr>
        </table></td>
        </tr>-->
      
      <tr>
        <td width="39%" class="white"><strong>Billing Address</strong></td>
        </tr>
      <tr>
        <td  class="bluesmall"><table width="100%" border="0">
		<tr>
            <td width="23%" class="white1">First Name</td>
            <td width="77%" class="white1"><?php echo $varFirstName;?></td>
          </tr>
          <tr>
            <td class="white1">Last Name</td>
            <td class="white1"><?php echo $varLastName;?></td>
          </tr>
          <tr>
            <td width="23%" class="white1">Address</td>
			<?php  //$add[] = implode("|",$varAddress); ?>
            <td width="77%" class="white1"><?php echo $varAddress; ?></td>
          </tr>
        <!--  <tr>
            <td class="white1">Suburb</td>
            <td class="white1"><?php //echo $Suburb;?></td>
          </tr>-->
          <tr>
            <td class="white1">City</td>
            <td class="white1"><?php echo $varCity;?></td>
          </tr>
          <tr>
            <td class="white1">Post Code</td>
            <td class="white1"><?php echo $varPostcode;?></td>
          </tr>
          <tr>
            <td class="white1">State</td>
            <td class="white1"><?php echo $varState;?></td>
          </tr>
          <tr>
            <td class="white1">Country</td>
            <td class="white1"><?php echo $varCountry?></td>
          </tr>
          
         
        </table></td>
        </tr>
		   <tr>
        <td width="39%" class="white"><strong>Shipping Address</strong></td>
        </tr>
      <tr>
        <td  class="bluesmall"><table width="100%" border="0">
          <tr>
            <td width="23%" class="white1">First Name</td>
            <td width="77%" class="white1"><?php echo $varShipFirstName;?></td>
          </tr>
          <tr>
            <td class="white1">Last Name</td>
            <td class="white1"><?php echo $varShipLastName;?></td>
          </tr>
          <tr>
            <td class="white1">Address</td>
            <td class="white1"><?php echo $varShipAddress;?></td>
          </tr>
          <tr>
            <td class="white1">City</td>
            <td class="white1"><?php echo $varShipCity;?></td>
          </tr>
		  <tr>
            <td class="white1">Post Code</td>
            <td class="white1"><?php echo $varShipZip;?></td>
          </tr>
		   <tr>
            <td class="white1">State</td>
            <td class="white1"><?php echo $varShipState;?></td>
          </tr>
          <tr>
            <td class="white1">Country</td>
            <td class="white1"><?php echo $varShipCountry;?></td>
          </tr>
          
		  <!--<tr>
            <td class="white1">Phone Number</td>
            <td class="white1"><?php //echo $varShipPhone;?></td>
          </tr>-->
        </table></td>
        </tr>
    </table></td>
  </tr>
  
 <tr> 
    <td colspan="3" align="right" valign="top"  class="txtcontent1"><a href="javascript:history.back();" class="leftlinks">Back</a></td>
  </tr>
</table>
<p>&nbsp;</p>
</td>
      </tr>

				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
<?php include('sidebar.php'); ?>
</div>
	<div class="clearfix"></div>
<?php include('footer.php'); ?>
</body>
</html>
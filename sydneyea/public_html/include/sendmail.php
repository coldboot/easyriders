<?php 
//include("include/dbconnect.php");
//include("include/constants.php");
include("include/class.phpmailer.php");

//$Or_Id=1;
//echo  $Or_Id	=	$_REQUEST['id'];	
 $select_ordermail_qrt	=	"SELECT * FROM ".ORDER." WHERE `intId` ='$Or_Id' ";
$result_ordermail_qrt	=	mysql_query($select_ordermail_qrt) or die("ORDERMAILERROR".mysql_error());
$num_ordermail_qrt		=	mysql_num_rows($result_ordermail_qrt);
$fetch_ordermail_qry	=	mysql_fetch_array($result_ordermail_qrt);

		 $varEmail         =$fetch_ordermail_qry['varEmail'];
		$varShippingName  =$fetch_ordermail_qry['varShippingName'];
		$varFirstName     =$fetch_ordermail_qry['varFirstName'];
		$varLastName      =$fetch_ordermail_qry['varLastName'];
	   	$varAddress       =$fetch_ordermail_qry['varAddress'];
	   	$varCity          =$fetch_ordermail_qry['varCity'];
		$varState         =$fetch_ordermail_qry['varState'];
	   	$varCountry       =$fetch_ordermail_qry['varCountry'];
	   	$varPostcode      =$fetch_ordermail_qry['varPostcode'];
		$varPhoneNo       =$fetch_ordermail_qry['varPhoneNo'];
	   	$varShipFirstName =$fetch_ordermail_qry['varShipFirstName'];
	   	$varShipLastName  =$fetch_ordermail_qry['varShipLastName'];
		$varShipAddress   =$fetch_ordermail_qry['varShipAddress'];
		$varShipCity      =$fetch_ordermail_qry['varShipCity'];
		$varShipState     =$fetch_ordermail_qry['varShipState'];
		$varShipCountry   =$fetch_ordermail_qry['varShipCountry'];
		$varShipZip       =$fetch_ordermail_qry['varShipZip'];
		$varShipPhone     =$fetch_ordermail_qry['varShipPhone'];


$toname		=	$fetch_ordermail_qry['varFirstName'];
$toemail	=	$fetch_ordermail_qry['varEmail'];
//$toemail	=	"neelimawebsolutionz@gmail.com";
$varOrderNo	=	$fetch_ordermail_qry['varOrderNo'];
$varSubtot	=	$fetch_ordermail_qry['varSubtot'];
$txtShip	=	$fetch_ordermail_qry['txtShip'];
$varTax		=	$fetch_ordermail_qry['varTax'];
$varGrantot	=	$fetch_ordermail_qry['varGrantot'];
$varShippingName	=	$fetch_ordermail_qry['varShippingName'];
$varShippingName	=	$fetch_ordermail_qry['varShippingName'];
$txtShip	=	$fetch_ordermail_qry['txtShip'];
$varPayDate =   $fetch_ordermail_qry['dtNow'];
$intId	    =	$fetch_ordermail_qry['intId'];
$Msg = '<table cellpadding="1" cellspacing="1"  bgcolor="#545559" width="100%">
<tr><td colspan="5"  bgcolor="#FFFFFF" align="left">Your Order Number is : '. $varOrderNo.'</td></tr>
                    <tr>
                      <td width="28%" align="left"  class="shopcart"><strong>Product Name</strong> </td>
                      <td width="14%" align="center"  class="shopcart"><strong>Price</strong></td>
                      <td width="21%" align="center" class="shopcart"><strong></strong></td>
                      <td width="14%" align="center" class="shopcart"><strong>Total</strong></td>
				      </tr>';
                   

    $i=0;

	$SubTotal=0;$Shippingcharge=0;
	$objResult = "SELECT * from ".ADDCART." WHERE  `varcheckid`='$intId' order by `intTempCartid`";
	$runaddcart	= mysql_query($objResult)or die("Error".mysql_error());
	$Rows_Cart  = mysql_num_rows($runaddcart); 

    while($fetch_cart=mysql_fetch_array($runaddcart))

   {

	$i++;

if($i%2==0)

{

$bgcolor="#cd0505";

}else{

$bgcolor="#cd0505";

}

	 $intTempCartid=$fetch_cart['intTempCartid'];
	 $ProductName=$fetch_cart['ProductName'];
	 $Price=$fetch_cart['Price'];
	 $ShippingAmount	=	$fetch_cart['ShippingAmount'];
	 $Attribiteid	=	$fetch_cart['intAttributeid'];
	 $Total=$fetch_cart['Total'];
	 $Pro_Id=$fetch_cart['intProid'];
	// $TotalPrice = $Total+$attriamount;
	$Query="SELECT * FROM ".PRODUCT." WHERE `productid`='$Pro_Id'";
	$Execute_Query=mysql_query($Query) or die("SELECT ERROR2".mysql_error());
	$Fetch_Query= mysql_fetch_array($Execute_Query);
	$stock=$Fetch_Query['Quantity'];
	//$ShippingCharges=$Fetch_Query['shipAmount'];
	$cartid=$fetch_cart['intTempCartid'];
	$pid=$fetch_cart['productid'];
	$Catid=$fetch_cart['varCatName'];
	//Finding
	$SubTotal=$SubTotal+$Total;
	//$SubTotal=$SubTotal+$Total;



                    $Msg .= '<tr>
                      <td width="28%" align="left" bgcolor="'.$bgcolor.'"  class="shopcartdisplay">'.$ProductName.'';
					  
                       $Msg .= '</td><td width="14%" align="center" bgcolor="'.$bgcolor.'" class="onsale">$'.$Price.'</td>
                      <td width="21%" align="center" bgcolor="'. $bgcolor.'"  > &nbsp;</td>
                      <td width="14%" align="right" bgcolor="'.$bgcolor.'" class="onsale" >$'.number_format($Total,2).'</td>
                      </tr> ';
                     }
					 
if($VarFreePost_package_top<$SubTotal){
	$varShippingamount=$VarFreePost_package_top;
}else if($i==1){
	$varShippingamount=$varSingleItem_package_top;
}else if($i>1){
	$varShippingamount=$varMultipleItems_package_top;
}			 

		 $GrandTotal=$SubTotal+$TaxTotal+$varShippingamount;
                    $Msg .= ' <tr>
                      <td height="26" align="right" bgcolor="#FFFFFF"  class="onsale" colspan="4"><span class="shopcart1">Sub Total:</span></td>
                      <td align="right" bgcolor="#FFFFFF"  ><span class="onsale">$'.number_format($SubTotal,2).'</span></td>
                      </tr>
					  <tr>
                      <td height="26" align="right" bgcolor="#FFFFFF"  class="onsale" colspan="4"><span class="shopcart1">Shipping Charge:</span></td>
                      <td align="right" bgcolor="#FFFFFF"  ><span class="onsale">$'.number_format($varShippingamount,2).'</span></td>
                      </tr>
					  <tr>
                      <td height="26" align="right" bgcolor="#FFFFFF"  class="onsale" colspan="4"><span class="shopcart1">Total:</span></td>
                      <td align="right" bgcolor="#FFFFFF"  ><span class="onsale">$'.number_format($GrandTotal,2).'</span></td>
                      </tr>';
                  $Msg .= '</table><br/><br/><table width="100%" border="0" cellpadding="1" cellspacing="2"  >
      
      <tr>
        <td class="bluesmall"><table width="100%" border="0" >
          <tr>
            <td width="23%" class="white1">Name</td>
            <td width="77%" class="white1">'.$varFirstName.$varLastName.'</td>
          </tr>
          <tr>
            <td class="white1">E-Mail Address</td>
            <td class="white1">'.$varEmail.'</td>
          </tr>
         <!-- <tr>
            <td class="white1">Phone Number </td>
            <td class="white1">'.$varPhoneNo.'</td>
          </tr>-->
        </table></td>
        </tr>
      
      <tr>
        <td width="39%" class="white"><u>Billing Address</u></td>
        </tr>
      <tr>
        <td  class="bluesmall"><table width="100%" border="0">
		<tr>
            <td class="white1">Name</td>
            <td class="white1">'.$varFirstName.$varLastName.'</td>
          </tr>
          <tr>
            <td class="white1">City</td>
            <td class="white1">'.$varCity.'</td>
          </tr>
          <tr>
            <td class="white1">State</td>
            <td class="white1">'.$varState.'</td>
          </tr>
        <tr>
            <td class="white1">Country</td>
            <td class="white1">'.$countryarray[$varCountry].'</td>
          </tr>
          <tr>
            <td class="white1">Post Code</td>
            <td class="white1">'.$varPostcode.'</td>
          </tr>
		   <tr>
            <td class="white1">Phone Number</td>
            <td class="white1">'.$varPhoneNo.'</td>
          </tr>

          <tr>
            <td colspan="2" class="white1"><span class="bluehead"><u>Shipping Address</u></strong></span></td>
            </tr>
          <tr>
            <td class="white1">Name</td>
            <td class="white1">'.$varShipFirstName.$varShipLastName.'</td>
          </tr>
       <tr>
            <td class="white1">City</td>
            <td class="white1">'.$varShipCity.'</td>
          </tr>
          <tr>
            <td class="white1">State</td>
            <td class="white1">'.$varShipState.",".$countryarray[$varShipCountry].'</td>
          </tr>
          <tr>
            <td class="white1">Postal Code </td>
            <td class="white1">'.$varShipZip.'</td>
          </tr>
          <tr>
            <td class="white1">Phone Number</td>
            <td class="white1">'.$varShipPhone.'</td>
          </tr>
        </table></td>
        </tr>
    </table>';
				  
##### Order nofication mail ########
/*$select_mail_qry	=	"SELECT * FROM ".MAILTXT." WHERE varMode = 'ordermail'";
$result_mail_qry	=	mysql_query($select_mail_qry);
$fetch_mail_qry		=	mysql_fetch_array($result_mail_qry);
$Content			=	 stripslashes($fetch_mail_qry['txtStatement']);
*///echo $Msg;
//$Subject			=	$fetch_mail_qry['varSubject'];
$Subject			=	"Order Details For  Julie Dimmick Photography ";

 $ReplaceContent		=	str_replace("####Ordermail####",$Msg,$Content);
 $ReplaceContents	=	str_replace("####Firstname####",$toname,$ReplaceContent);
  $msatext =$ReplaceContents;
  
  ###### Order mail content for admin ##########3
/*  $select_mail_qry_admin=	"SELECT * FROM ".MAILTXT." WHERE varMode = 'ordermail'";
$result_mail_qry_admin	=	mysql_query($select_mail_qry_admin);
$fetch_mail_qry_admin		=	mysql_fetch_array($result_mail_qry_admin);
$Conten_admint			=	 stripslashes($fetch_mail_qry_admin['txtStatement']);
*///echo $Msg;
$Subject_admin			=	"Order details";
 $ReplaceContent_admint		=	str_replace("####Ordermail####",$Msg,$Conten_admint);
 $ReplaceContents_admint	=	str_replace("####Firstname####",$toname,$ReplaceContent_admint);
  $msatext_admint =$ReplaceContents_admint;
  
  $adminqry="select * from ".ADMINPROFILE."";
   $adminresult=mysql_query($adminqry) or die(mysql_error());
   $adminfetch=mysql_fetch_array($adminresult);
   $varContactPerson=$adminfetch['varContactPerson'];
   $FormEmail=$adminfetch['varEmail'];
  // $site=$adminfetch['varWebsite'];
//echo $Msg;

#########Email sent to customer Mail id #######
	   		$mail = new PHPMailer(); 
			$mail->IsSendMail(); 
			$mail->From = $FormEmail; 
			$mail->FromName =$varContactPerson;
			$mail->AddAddress($toemail,$toname);
			$mail->WordWrap = 100;  
			$mail->IsHTML(true);                                
			$mail->Subject = $Subject;
			$mail->Body    = $Msg;
			$mail->Send();
############ Mail sent to admin ############3
			$mail1 = new PHPMailer(); 
			$mail1->IsSendMail(); 
			$mail1->From = $toemail; 
			$mail1->FromName =$toname;
			$mail1->AddAddress($FormEmail,$varContactPerson);
			$mail1->WordWrap = 100;  
			$mail1->IsHTML(true);                                
			$mail1->Subject = $Subject_admin;
			$mail1->Body    = $Msg;
			$mail1->Send();

?>

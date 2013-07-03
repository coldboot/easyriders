<?php
	include("include/session.php");
/************************************************************
This is the main web page for the DoDirectPayment sample.
This page allows the user to enter name, address, amount,
and credit card information. It also accept input variable
paymentType which becomes the value of the PAYMENTACTION
parameter.

When the user clicks the Submit button, DoDirectPaymentReceipt.php
is called.

Called by index.html.

Calls DoDirectPaymentReceipt.php.

************************************************************/
// clearing the session before starting new API Call
$paymentType = $_REQUEST['paymentType'];
$net=base64_decode($_REQUEST['t1']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PayPal PHP SDK - DoDirectPayment API</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
<link href="images/productstyle.css" rel="stylesheet" type="text/css" />
<link href="script/style.css" rel="stylesheet" type="text/css" />
<link href="pages/sdk.css" rel="stylesheet" type="text/css"/>

<script  src="script/jquery-1.js" type="text/javascript"></script>
<script  src="script/cufon-yui.js" type="text/javascript"></script>
<script src="script/cufon-replace.js" type="text/javascript"></script>
<script src="script/Century_Gothic_400.js" type="text/javascript"></script>
<script src="script/loopedslider.js" type="text/javascript"></script>
<script language="JavaScript">
	function generateCC(){
		var cc_number = new Array(16);
		var cc_len = 16;
		var start = 0;
		var rand_number = Math.random();

		switch(document.DoDirectPaymentForm.creditCardType.value)
        {
			case "Visa":
				cc_number[start++] = 4;
				break;
			case "Discover":
				cc_number[start++] = 6;
				cc_number[start++] = 0;
				cc_number[start++] = 1;
				cc_number[start++] = 1;
				break;
			case "MasterCard":
				cc_number[start++] = 5;
				cc_number[start++] = Math.floor(Math.random() * 5) + 1;
				break;
			case "Amex":
				cc_number[start++] = 3;
				cc_number[start++] = Math.round(Math.random()) ? 7 : 4 ;
				cc_len = 15;
				break;
        }

        for (var i = start; i < (cc_len - 1); i++) {
			cc_number[i] = Math.floor(Math.random() * 10);
        }

		var sum = 0;
		for (var j = 0; j < (cc_len - 1); j++) {
			var digit = cc_number[j];
			if ((j & 1) == (cc_len & 1)) digit *= 2;
			if (digit > 9) digit -= 9;
			sum += digit;
		}

		var check_digit = new Array(0, 9, 8, 7, 6, 5, 4, 3, 2, 1);
		cc_number[cc_len - 1] = check_digit[sum % 10];

		document.DoDirectPaymentForm.creditCardNumber.value = "";
		for (var k = 0; k < cc_len; k++) {
			document.DoDirectPaymentForm.creditCardNumber.value += cc_number[k];
		}
	}
</script>
<script type="text/javascript">
	$(function(){
		$('#loopedSlider').loopedSlider();
	});
</script>
<script language="javascript">
	generateCC();
</script>
</head>
<style type="text/css">cufon{text-indent:0!important;}@media screen,projection{cufon{display:inline!important;display:inline-block!important;position:relative!important;vertical-align:middle!important;font-size:1px!important;line-height:1px!important;}cufon cufontext{display:-moz-inline-box!important;display:inline-block!important;width:0!important;height:0!important;overflow:hidden!important;text-indent:-10000in!important;}cufon canvas{position:relative!important;} @media print{cufon{padding:0!important;}cufon canvas{display:none!important;}
</style>
<body alink=#0000FF vlink=#0000FF>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td><img src="images/middle_top.jpg" width="1000" height="21" /></td>
  </tr>
  
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="middle_center"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="bottom">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td valign="bottom"><a href="index.php"><img src="images/logo.jpg" width="296" height="79" border="0" /></a></td>
            <td width="180" align="right"><img src="images/logo1.jpg" width="121" height="77" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td class="middle_center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td width="24" valign="top">&nbsp;</td>
            <td><table width="953" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="13" valign="top"><img src="images/menu_left.jpg" width="13" height="49" /></td>
                      <td class="menu_middle">
					  	<?php include("include/frontmenu.php"); ?>
					  </td>
                      <td width="13" valign="top"><img src="images/menu_right.jpg" width="13" height="49" /></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td height="3"></td>
              </tr>
              <tr>
                <td class="main_bg"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="11"></td>
                  </tr>
                  <tr>
                    <td class="left_image"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left"><div class="content">
               <div id="loopedSlider">
                  <div class="box">
                     <div class="left-top-corner">
                        <div class="right-top-corner">
                           <div class="right-bot-corner">
                              <div class="left-bot-corner">
                                 <div class="inner">
                                    <div class="container">
                                       <div style="width:1940px; left:0px;" class="slides">
                                          <div style="position: absolute; left: 0px; display: block;"><img  src="images/1.png" alt="" width="627" height="406" ></div>
                                          <div style="position: absolute; left: 0px; display: block;"><img src="images/2.png" alt="" width="627" height="406" />></span></div>
                                          <div style="position: absolute; left:0px; display: block;"><img  src="images/3.png" width="627" height="406" alt=""></div>
                                          <div style="position: absolute; left: 0px; display: block;"><img src="images/4.png" width="627" height="406" alt="" /></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <ul class="pagination">
                     <li class="active"><a rel="1" href="#"><img src="images/text1.png" width="269" height="79"/ style="padding-left:15px; padding-top:10px;"></a></li>
                     <li ><a rel="2" href="#"><img src="images/text2.png" width="252" height="80" /  style="padding-left:15px; padding-top:10px;"></a></li>
                     <li><a rel="3" href="#"><img src="images/text3.png" width="248" height="86" /  style="padding-left:15px; padding-top:5px;"></a></li>
                     <li ><a rel="4" href="#"><img src="images/text4.png" width="260" height="81" /  style="padding-left:15px; padding-top:10px;"></a></li>
                  </ul>
               </div>
           </div></td>
                      </tr>
                      
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              
              <tr>
                <td><table width="83%" border="1" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="676" valign="top"><table width="0%" border="0" cellspacing="0" cellpadding="0" height="0">
<td><img src="a-2.gif" width="810" height="10"></td>
              </tr>
              <tr> 
                <td height="2"><img src="images1/h-title.gif" width="810" height="16"></td>
              </tr>
              <tr> 
                <td height="2"><img src="images1/a-2.gif" width="810" height="10"></td>
              </tr>
              <tr> 
                <td><img src="images1/h-payment-header.gif" width="910" height="77"></td>
              </tr>
              <tr> 
                <td height="2"><img src="images1/a-5.gif" width="808" height="25"></td>
              </tr>
              <tr> 
                <td height="2"><img src="images1/h-2.gif" width="910" height="13"></td>
              </tr>
              <tr> 
                <td height="2"> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="12%">&nbsp;</td>
                      <td width="60%"><font size="3" face="Arial, Helvetica, sans-serif" color="#003300"><b>Invoice 
                        & Billing Information</b></font></td>
                      <td width="28%"><b><font size="3" face="Arial, Helvetica, sans-serif" color="#003300">Make 
                        Payment</font></b></td>
                    </tr>
                  </table>                </td>
              </tr>
              <tr> 
                <td height="2"><img src="images1/a-5.gif" width="808" height="25"></td>
              </tr>
              <tr>
                <td height="2" align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:red; font-weight:bold;"></td>
              </tr>
              <tr> 
                <td height="2"><font size="5" face="Arial, Helvetica, sans-serif"><b><font color="#009966">Make Payment</font></b></font></td>
              </tr>
              <tr> 
                <td height="2"><img src='images1/a-6.gif' width="609" height="15"></td>
              </tr>
              <tr> 
                <td height="2"><table width="100%" border="1" cellpadding="0" cellspacing="0"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">Here's the total amount for your payment. Please check the details carefully before proceeding the payment. Also ensure that you understand the conditions of the payment method selected.</font></table></td>
              </tr>
              <tr> 
                <td height="2"><img src='images1/j-3.gif'width="907" height="36"></td>
              </tr>
              <tr>
                <td height="612">
                  
                    <table width="100%" border="0">
                      <tr>
                        <td>
                          <table width="100%" border="1" cellpadding="0" cellspacing="0">
                           
                      <tr>
                        <td height="106">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><table width="96%" border="0" cellpadding="0" cellspacing="0">
                              <tr><center>
<font size=2 color=black face=Verdana><b>DoDirectPayment</b></font>
<br><br>
<form method="POST" action="DoDirectPaymentReceipt.php" name="DoDirectPaymentForm"> 
<!--Payment type is <?=$paymentType?><br> -->
<input type=hidden name=paymentType value="<?=$paymentType?>" />
<table width=600>
	<tr>
		 <td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">First Name</font></td>
		<td align=left><input type=text size=30 maxlength=32 name=firstName ></td>
	</tr>
	<tr>
		 <td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">Last Name</font></td>
		<td align=left><input type=text size=30 maxlength=32 name=lastName ></td>
	</tr>
	<tr>
		 <td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">Card Type</font></td>
		<td align=left>
			<select name=creditCardType onChange="javascript:generateCC(); return false;">
				<option value=Visa >Visa</option>
				<option value=MasterCard>MasterCard</option>
				<option value=Discover>Discover</option>
				<option value=Amex>American Express</option>
			</select>
		</td>
	</tr>
	<tr>
		 <td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">Card Number</font></td>
		<td align=left><input type=text size=19 maxlength=19 name=creditCardNumber></td>
	</tr>
	<tr>
		 <td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">Expiration Date</font></td>
		<td align=left><p>
			<select name=expDateMonth>
				<option value=1>01</option>
				<option value=2>02</option>
				<option value=3>03</option>
				<option value=4>04</option>
				<option value=5>05</option>
				<option value=6>06</option>
				<option value=7>07</option>
				<option value=8>08</option>
				<option value=9>09</option>
				<option value=10>10</option>
				<option value=11>11</option>
				<option value=12>12</option>
			</select>
			<select name=expDateYear>
				<option value=2005>2005</option>
				<option value=2006>2006</option>
				<option value=2007>2007</option>
				<option value=2008>2008</option>
				<option value=2009>2009</option>
				<option value=2010 >2010</option>
				<option value=2011 >2011</option>
				<option value=2012 >2012</option>
				<option value=2013>2013</option>
				<option value=2014>2014</option>
				<option value=2015>2015</option>
			</select>
		</p></td>
	</tr>
	<tr>
		 <td width="28%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">Card Verification Number</font></td>
		<td align=left><input type=text size=3 maxlength=4 name=cvv2Number ></td>
	</tr></table></center>
      
                                <td width="25%"><table width="100%" border="0">
                                  <tr>
                                          <td><img src="images1/h-master.gif" width="75" height="38"><font color="#999999" size="1" face="Arial, Helvetica, sans-serif"><a href="#" onMouseOver="MM_openBrWindow('mastercard.html','Master','width=450,height=500')">Learn 
                                            More</a></font></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                          <td><img src="images1/h-visa.gif" width="75" height="39"><font color="#999999" size="1" face="Arial, Helvetica, sans-serif"><a href="#" onMouseOver="MM_openBrWindow('visa.html','Visa','width=450,height=500')">Learn 
                                            More</a></font></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                          <td><img src="images1/h-american.gif" width="75" height="38"><font color="#999999" size="1" face="Arial, Helvetica, sans-serif"><a href="#" onMouseOver="MM_openBrWindow('american-express.html','AmericanExpress','width=450,height=500')">Learn 
                                            More</a></font></td>
                                  </tr>
                                  <!--<tr>
                                    <td>&nbsp;</td>
                                  </tr>-->
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                     <!-- <tr>
                        <td height="18">&nbsp;</td>
                      </tr>-->
                      <tr>
                        <td height="163">
<table width="100%" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                              <td height="48"> 
                                <table width="785" border="0" cellpadding="0" cellspacing="0" height="0">
                                  <tr> 
                                    <td align="center"><strong><font color="#999999" size="3" face="Arial, Helvetica, sans-serif">Credit 
                                      Card Billing Address</font></strong></td>
                                  </tr>
                                  <tr> 
                                    <td align="center"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">This 
                                      address must be identical to your credit 
                                      card billing address.</font></td>
                                  </tr>
                                  <!--<tr>
                                    <td height="2">&nbsp;</td>
                                  </tr>-->
                                </table>                              </td>
                          </tr>
                          <tr><td ><table width="100%" border="0">
	<tr>
		<!--<td align=right><br><b>Billing Address:</b></td>-->
	</tr>
	<tr>
		 <td width="10%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">Address 1</font></td>
		<td width="81%"><input type=text size=25 maxlength=100 name=address1></td>
	</tr>
	<tr>
		 <td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">Address 2</font></td>
		<td width="81%"><input type=text  size=25 maxlength=100 name=address2>(optional)</td>
	</tr>
	<tr>
		 <td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">City</font></td>
		<td width="81%"><input type=text size=25 maxlength=40 name=city ></td>
	</tr>
	<tr>
		 <td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">State</font></td>
		<td width="81%">
			<select id=state name=state>
				<option value=></option>
				<option value=AK>AK</option>
				<option value=AL>AL</option>
				<option value=AR>AR</option>
				<option value=AZ>AZ</option>
				<option value=CA>CA</option>
				<option value=CO>CO</option>
				<option value=CT>CT</option>
				<option value=DC>DC</option>
				<option value=DE>DE</option>
				<option value=FL>FL</option>
				<option value=GA>GA</option>
				<option value=HI>HI</option>
				<option value=IA>IA</option>
				<option value=ID>ID</option>
				<option value=IL>IL</option>
				<option value=IN>IN</option>
				<option value=KS>KS</option>
				<option value=KY>KY</option>
				<option value=LA>LA</option>
				<option value=MA>MA</option>
				<option value=MD>MD</option>
				<option value=ME>ME</option>
				<option value=MI>MI</option>
				<option value=MN>MN</option>
				<option value=MO>MO</option>
				<option value=MS>MS</option>
				<option value=MT>MT</option>
				<option value=NC>NC</option>
				<option value=ND>ND</option>
				<option value=NE>NE</option>
				<option value=NH>NH</option>
				<option value=NJ>NJ</option>
				<option value=NM>NM</option>
				<option value=NV>NV</option>
				<option value=NY>NY</option>
				<option value=OH>OH</option>
				<option value=OK>OK</option>
				<option value=OR>OR</option>
				<option value=PA>PA</option>
				<option value=RI>RI</option>
				<option value=SC>SC</option>
				<option value=SD>SD</option>
				<option value=TN>TN</option>
				<option value=TX>TX</option>
				<option value=UT>UT</option>
				<option value=VA>VA</option>
				<option value=VT>VT</option>
				<option value=WA>WA</option>
				<option value=WI>WI</option>
				<option value=WV>WV</option>
				<option value=WY>WY</option>
				<option value=AA>AA</option>
				<option value=AE>AE</option>
				<option value=AP>AP</option>
				<option value=AS>AS</option>
				<option value=FM>FM</option>
				<option value=GU>GU</option>
				<option value=MH>MH</option>
				<option value=MP>MP</option>
				<option value=PR>PR</option>
				<option value=PW>PW</option>
				<option value=VI>VI</option>
			</select>
		</td>
	</tr>
	<tr>
		 <td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">ZIP Code</font></td>
		<td width="81%"><input type=text size=10 maxlength=10 name=zip >(5 or 9 digits)</td>
	</tr>
	<tr>
		<td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">Country</font></td>
		<td width="81%">United States</td>
	</tr>
	<tr>
		 <td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif"><br>Amount</font></td>
		<td width="81%"><br><input type=text  readonly=<?php echo $net;?> size=8 maxlength=7 name=amount value=<?php echo $net;?>> USD</td>
	</tr>
	<tr>
		<td/>
		 <td width="19%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif"><b>(DoDirectPayment only supports USD at this time)</b></font></td>
	</tr>
	<tr>
		<td/>
		<td><input type=Submit value=Submit></td>
	</tr>
</table>
</form>
</table></td></tr>
                            </select></td>
                              </tr>
                              
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="23" align="center"><div align="justify"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">Please be advised that credit card issuing banks may impose additional charges on   all CROSS BORDER transactions. CROSS BORDER transactions are defined as   transactions whereby the country of the cardholder's bank differs from that of   the merchant.<BR>
                            <BR>
                        Please note that the additional charge is not imposed by   KAROO EQUINE and neither do we benefit from it. You are advised to seek further   clarification from your credit card issuing bank should a CROSS BORDER charge be   applied to this transaction.</font></div></td>
                      </tr>
                     
                      <tr>
                        <td height="28" align="center">
						<label for="label"><a href="#" onClick="MM_nbGroup('down','group1','gnext','h-pay.gif',1)" onMouseOut="MM_nbGroup('out')" onMouseOver="MM_nbGroup('over','gnext','h-pay.gif','',1)" id="sub2">
							  
							  <!--<img src="g-next.gif" width="99" height="26" border="0" name="gnext" onLoad="">--></a></label>
					<!--	<input type="submit" name="submit1" value="Account & Pay" style="background-color:#CCCCCC">--></td>
						<!--<img src="h-pay.gif" width="115" height="27">-->
                                            </tr>
                    </table>
                 <!-- </form>--></td>
              </tr>
              <tr>
                <td height="50"><img src='images1/a-7.gif' width="809" height="132"></td>
              </tr>
            </table></td>
                          </tr>
					 </table></td>
					<!--</td>
			
					
                          </tr>-->
                     
                    </tr>
					
              
  <?php include("include/frontbottom.php"); ?>
  <!--<a href="http://wsdemos.info/ourprojects/karoo/login.php">Home</a>-->
<!--<a id="CallsLink" href="index.html">Home</a>-->

</table>
</body>
</html>
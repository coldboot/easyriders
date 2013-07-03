<?php

error_reporting(0);

define("ADMINPROFILE","tbl_karoowquine_adminprofile");
define("CMS","tbl_karoowquine_cms");
define("MAILTEMPLETE","tbl_karoowquine_mailtemplete");
define("BANNER","tbl_karoowquine_banner");
define("MOREIMAGE","tbl_karoowquine_addmoreimage");
define("COUPON","tbl_karoowquine_coupon");
define("REVIEW","tbl_karoowquine_productreview");
define("ADDCART","tbl_karoowquine_tempaddcart");
define("SESSIONCOUPON","tbl_karoowquine_CouponCode");

define("ADDCATEGORY","tbl_karoowquine_addcategory");
define("PRODUCT","tbl_karoowquine_product");
define("SUBSCRIBER","tbl_karoowquine_subscriber");

define("ADDMEMBER","tbl_karoowquine_member");

define("NEWSLETTER","tbl_karoowquine_sendnewsletter");
define("BINGO","tbl_karoowquine_bingo");

define("FEATURESITE","tbl_karoowquine_featuresite");
define("TOPSITES","tbl_karoowquine_topsites");

define("ORDER","tbl_karoowquine_tempaddcart");
define("CONTACT","tbl_karoowquine_contact");
define("SITEOFTHEMONTH","tbl_karoowquine_siteofthemonth");

define("CREDITCARD","tbl_karoowquine_creditcard");
define("BILLING","tbl_karoowquine_billing");
define("CHECKOUT","tbl_karoowquine_checkout");





define("TOPBANNERPATH","../../topbanner/");
define("ADDBANNERPATH","../../addbanner/");

define("FEATUREIMAGE","../../featureimage/");
define("FEATUREIMAGEFRONT","featureimage/");

define("MOREFIELDS","../../moreimages/");

define("TOPIMAGE","../../topimage/");
define("TOPIMAGEFRONT","topimage/");

define("SITEOFTHEMONTHPATH","../../siteofthemonth/");

$Query = mysql_query("SELECT * FROM tbl_gallery_adminprofile");
$Fetch = mysql_fetch_array($Query);
$admintitle=$Fetch['varAdminPage'];
$hometitle = $Fetch['varHomePage'];
$AdminEmail = $Fetch['varEmail'];
$AdminName = $Fetch['varContactPerson'];
				
define("ARTICLETHUMB","../../articleimage/");
define("ARTICLEFRONT","articleimage/");


define("PRODUCTPATH","../../productimg/");
define("PRDUCTFRONTPATH","productimg/");

define("BANNERTHUMB","../../bannerimage/");

define("FRONTBANNERTHUMB","bannerimage/");

define("FEATURESITEPATH","../../featureimage/");
define("NEWSTHUMB","../../newsimage/");
define("NEWSFRONT","newsimage/");

$bannerposition = array('1'=>"Right", '2'=>"Left", '3'=>"Right-mini");

//LIVE PATH
$SITEPATH = "http://wsdemos.info/ourprojects/e_comm/";
$BLOGURL ="http://wsdemos.info/ourprojects/bingonights/blog/?p=1";

//LOCAL PATH
//$SITEPATH = "http://server/projects/gowri/bingotonight/bannerimage/";

//$BLOGURL ="http://server/projects/gowri/wordpress/blog/?p=1";

$sel_admindetail ="SELECT * FROM ".ADMINPROFILE;
 $Query = mysql_query($sel_admindetail) or die(mysql_error());
 $Fetch = mysql_fetch_array($Query);
 $admintitle=$Fetch['varAdminPage'];
$hometitle = $Fetch['varHomePage'];
$AdminEmail = $Fetch['varEmail'];
$AdminName = $Fetch['varContactPerson'];


 $statearray = array('Choose'=>"Choose",'AK'=>'Alaska','AL'=>'Alabama','AR'=>'Arkansas','AZ'=>'Arizona','CA'=>'California','CO'=>'Colorado','CT'=>'Connecticut','DC'=>'District_of_Columbia','DE'=>'Delaware','FL'=>'Florida','GA'=>'Georgia','HI'=>'Hawaii','IA'=>'Iowa','ID'=>'Idaho','IL'=>'Illinois','IN'=>'Indiana','KS'=>'Kansas','KY'=>'Kentucky','LA'=>'Louisiana','MA'=>'Massachusetts','MD'=>'Maryland','ME'=>'Maine','MI'=>'Michigan','MN'=>'Minnesota','MO'=>'Missouri','MS'=>'Mississippi','MT'=>'Montana','NC'=>'North_Carolina','ND'=>'North_Dakota','NE'=>'Nebraska','NH'=>'New_Hampshire','NJ'=>'New_Jersey','NM'=>'New_Mexico','NV'=>'Nevada','NY'=>'New_York','OH'=>'Ohio','OK'=>'Oklahoma','OR'=>'Oregon','PA'=>'Pennsylvania','RI'=>'Rhode_Island','SC'=>'South_Carolina','SD'=>'South_Dakota','TN'=>'Tennessee','TX'=>'Texas','UT'=>'Utah','VA'=>'Virginia','VT'=>'Vermont','WA'=>'Washington','WI'=>'Wisconsin','WV'=>'West_Virginia','WY'=>'Wyoming');

$countryarray=array('Choose'=>"Choose",'1'=>"United Kingdom","Europe","United States of America","Afghanistan","Albania","Algeria","American Samoa","Andorra","Angola","Anguilla","Antarctica","Antigua and Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Bouvet Island","Brazil","British Indian Ocean Territory","Brunei Darussalam","Bulgaria","Burkina Faso","Burma","Burundi","Cambodia","Cameroon","Canada","Canton and Enderbury Islands","Cape Verde","Cayman Islands","Central African Republic","Chad","Chile","China","Christmas Island","Cocos (Keeling) Islands","Colombia","Comoros","Congo","Cook Islands","Costa Rica","Cote D'Ivoire","Croatia (Hrvatska)","Cuba","Cyprus","Czech Republic","Democratic Yemen","Denmark","Djibouti","Dominica","Dominican Republic","Dronning Maud Land","East Timor","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands (Malvinas)","Faroe Islands","Fiji","Finland","France","France Metropolitan","French Guiana","French Polynesia","French Southern Territories","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guadeloupe","Guam","Guatemala","Guinea","Guinea-bisseu","Guyana","Haiti","Heard and Mc Donald Islands","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran (Islamic Republic of)","Iraq","Ireland","Israel","Italy","Ivory Coast","Jamaica","Japan","Johnston Island","Jordan","Kazakstan","Kenya","Kiribati","Korea, Democratic People's Republic of","Korea, Republic of","Kuwait","Kyrgyzstan","Lao People's Democratic Republic","Latvia","Lebanon","Lesotho","Liberia","Libyan Arab Jamahiriya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Martinique","Mauritania","Mauritius","Mayotte","Mexico","Micronesia, Federated States of","Midway Islands","Moldova, Republic of","Monaco","Mongolia","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands Antilles","Neutral Zone","New Calidonia","New Zealand","Nicaragua","Niger","Nigeria","Niue","Norfolk Island","Northern Mariana Islands","Norway","Oman","Pacific Islands","Pakistan","Palau","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Pitcairn Island","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russian Federation","Rwanda","S.Georgia and S. Sandwich Isls.","Saint Lucia","Saint Vincent/Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Seychelles","Sierra Leone","Singapore","Slovakia (Slovak Republic)","Slovenia","Solomon Islands","Somalia","South Africa","Spain","Sri Lanka","St.Helena","St. Kitts Nevis Anguilla","St. Pierre and Miquelon","Sudan","Suriname","Svalbard and Jan Mayen Islands","Swaziland","Sweden","Switzerland","Syran Arab Republic","Taiwan","Tajikistan","Tanzania, United Republic of","Thailand","Togo","Tokelau","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Turks and Caicos Islands","Tuvalu","US Minor Outlying Islands","Uganda","Ukraine","United Arab Emirates","United States","United States Pacific Islands","Upper Volta","Uruguay","Uzbekistan","Vanuatu","Vatican City State","Venezuela","VietNam","Virgin Islands, British","Virgin Islands, Unites States","Wake Island","Wallis and Futuma Islands","Western Sahara","Yemen","Yugoslavia","Zaire","Zambia","Zimbabwe");

/*$countryarray=array(''=>"Choose",'1'=>"United Kingdom","England","Scotland","Wales","Northern Ireland","Republic of Ireland");*/
$categoryarray=array('01'=>"Men's shopcom",'02'=>"Ladies shopcom",'03'=>"Children's shopcom",'04'=>"Unisex shopcom");
$ratingarray = array('5'=>"Excellent", '4'=>"Good",'3'=>"Average", '2'=>"Fair", '1'=>"Poor");

$MonthArray	=	array(''=>"Choose",'01'=>"Jan",'02'=>"Feb",'03'=>"Mar",'04'=>"Apr",'05'=>"May",'06'=>"Jun",'07'=>"Jul",'08'=>"Aug",'09'=>"Sep",'10'=>"Oct",'11'=>"Nov",'12'=>"Dec");

$creditcardarray = array('Choose'=>"Choose",'V1'=>"Visa",'M0'=>"MasterCard",'A0'=>"American Express",'D0'=>"Discover");

$SiteName	= "http://localhost/projects/shopcom/";
//$SiteName	= "http://localhost/projects/shopcom/";
$paystatusarray=array("All"=>"View All","Pending"=>"Pending","Delivered"=>"Delivered");
$paystatusarray1=array("All"=>"View All","Paid"=>"Paid","Pending"=>"Unpaid");
  /*session_start();
  if($_SESSION['orderstatus_frompaypal']!= "")
{
	$_SESSION['sessionid_cart']="";
	$_SESSION['orderstatus_frompaypal']="";
}
if($_SESSION['sessionid_cart'] == "")
{
	 $_SESSION['sessionid_cart']=mt_rand(1,1000000000000000000);
	  $_SESSION['sessionid_cart'];
}
 $sessionid_cart1 = $_SESSION["sessionid_cart"];
 $sessionid_cart=str_replace("-","",$sessionid_cart1);*/

  function disphotofav($image,$size,$dimension,$OriginalImg)
{
	if($OriginalImg != "")
	{
		if(file_exists($image))
		{
		$sizes = getimagesize($image);
		$aspect_ratio = $sizes[0]/$sizes[1]; 
		if($sizes[0] >=150) 
		{
			if ($dimension == 'Width' )
			{
			$new_width = $size;
			$new_height = round( $sizes[1] * ( $size  / $sizes[0] ) );
			}
			else
			{
			$new_height = $size;
			$new_width = round( $sizes[0] * ( $size / $sizes[1] ) ) ;
			} 
		} 
		else 
		{ 
			$new_width = $sizes[0];$new_height = $sizes[1]; 
		}
		$concate=$new_width."<>".$new_height; 
		return $concate; 
		} 
		else  return ""; 
		}
		else  return "";
}


$page=base64_decode($_REQUEST['page']);
if($page=="")
{
	$page2="home";
}
else
{
	$page2=$page;
}
$Query_Cms_front	="SELECT * FROM ".CMS." WHERE `varMode`='$page2'";
$Result_Cms_front	=	mysql_query($Query_Cms_front);
$Fetch_Cms_front	=	mysql_fetch_array($Result_Cms_front);	


 ?>
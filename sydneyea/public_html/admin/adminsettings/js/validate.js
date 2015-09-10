// JavaScript Document
// ------------- This is Script For Admin Pages----------------------//

function validateEmail(addr,man,db) {
	if (addr == '' && man) {
	   if (db) alert('Email Address Is Mandatory');
	   return false;
	}
	var invalidChars = '\/\'\\ ";:?!()[]\{\}^|';
	for (i=0; i<invalidChars.length; i++) {
	   if (addr.indexOf(invalidChars.charAt(i),0) > -1) {
		  if (db) alert('Email Address Contains Invalid Characters');
		  return false;
	   }
	}
	for (i=0; i<addr.length; i++) {
	   if (addr.charCodeAt(i)>127) {
		  if (db) alert("Email Address Contains Non ASCII Characters.");
		  return false;
	   }
	}

	var atPos = addr.indexOf('@',0);
	if (atPos == -1) {
	   if (db) alert('Email Address Must Contain An @');
	   return false;
	}
	if (atPos == 0) {
	   if (db) alert('Email Address Must Not Start With @');
	   return false;
	}
	if (addr.indexOf('@', atPos + 1) > - 1) {
	   if (db) alert('Email Address Must Contain Only One @');
	   return false;
	}
	if (addr.indexOf('.', atPos) == -1) {
	   if (db) alert('Email Address Must Contain A Period In The Domain Name');
	   return false;
	}
	if (addr.indexOf('@.',0) != -1) {
	   if (db) alert('Period Must Not Immediately Follow @ In Email Address');
	   return false;
	}
	if (addr.indexOf('.@',0) != -1){
	   if (db) alert('Period Must Not Immediately Precede @ In Email Address');
	   return false;
	}
	if (addr.indexOf('..',0) != -1) {
	   if (db) alert('Two Periods Must Not Be Adjacent In Email Address');
	   return false;
	}
	var suffix = addr.substring(addr.lastIndexOf('.')+1);
	if (suffix.length != 2 && suffix != 'com' && suffix != 'net' && suffix != 'org' && suffix != 'edu' && suffix != 'int' && suffix != 'mil' && suffix != 'gov' & suffix != 'arpa' && suffix != 'biz' && suffix != 'aero' && suffix != 'name' && suffix != 'coop' && suffix != 'info' && suffix != 'pro' && suffix != 'museum') {
	   if (db) alert('Invalid Primary Domain In Email Address');
	   return false;
	}
return true;
}

function validate_limit(value,mn,mx)
{
	if(value.length <mn || value.length >mx)	 return false;
	else return true;
}

function validate_num(value)
{
	if(isNaN(value)) return false;
	else return true;
}
function validate_letteronly(value)
{
	var lettersonly = /([a-zA-Z]+)$/;
	
	return lettersonly.test(value);
}
function validate_url(url)
{
     return url.match(/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/);
}
var imgtype = new Array( 'gif', 'jpeg', 'png', 'swf', 'psd', 'bmp','tiff', 'tiff', 'jpc', 'jp2', 'jpf', 'jb2', 'swc','aiff', 'wbmp', 'xbm');

function isImg(val)
{
	var dotpos=val.lastIndexOf('.');
	if(dotpos==-1) return false;
	else
	{
		dotpos++;
		var imgtype1=val.substr(dotpos);
		imgtype1=imgtype1.toLowerCase();		
		for(x in imgtype)
		{
			if(imgtype[x]==imgtype1) return true;
		}		
		return false;
	}
}


var symbols = " !\"#$%&'()*+'-./0123456789:;<=>?@";
function toAscii (val)  {
var loAZ = "abcdefghijklmnopqrstuvwxyz";
symbols+= loAZ.toUpperCase();
symbols+= "[\\]^_`";
symbols+= loAZ;
symbols+= "{|}~";
var loc;
loc = symbols.indexOf(val);
if (loc >-1) {
Ascii_Decimal = 32 + loc;
return (32 + loc);
}
return(0);  // If not in range 32-126 return ZERO
}

/*function validate_char(val)
{
	
	var length=val.length();
	var c_length=check.length();
	for(i=0;i<=length;i++)
	{
		var ascii=toAscii(val.indexOf(val.charAt(i),0));
		if(ascii==32) return 'space';
		if(ascii==
	}
}*/

var numb = '0123456789';
var lwr = 'abcdefghijklmnopqrstuvwxyz';
var upr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var spc= '_.';
var specialchar= "!\"#$%&'()*+'-./:;<=>?@";
var address=',-_@.;:*/\\<>';

function isspecialchar(val) 
{
for (i=0;i<val.length;i++) {
if (specialchar.indexOf(val.charAt(i),0) != -1) return true;
}
return false;
}

function isValid(parm,val) {
if (parm == "") return true;
for (i=0; i<parm.length; i++) {
if (val.indexOf(parm.charAt(i),0) == -1) return false;
}
return true;
}

function isValidwithspace(parm,val) {
if (parm == "") return true;
while(parm.indexOf("\n") > -1)
parm = parm.replace("\n","<br />");
for (i=0; i<parm.length; i++) {	
if (val.indexOf(parm.charAt(i),0) == -1 && toAscii(parm.charAt(i))!=32) return false;
}
return true;
}

function isNumber(parm) {return isValid(parm,numb);}
function isLower(parm) {return isValid(parm,lwr);}
function isUpper(parm) {return isValid(parm,upr);}
function isAlpha(parm) {return isValidwithspace(parm,lwr+upr);}
function isAlphanum(parm) {return isValidwithspace(parm,lwr+upr+numb);} 
function validate_username(val) {return isValid(val,lwr+upr+numb+spc);} 

function isaddress(addr) {return isValidwithspace(addr,numb+lwr+upr+address);}
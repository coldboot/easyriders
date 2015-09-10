// JavaScript Document
// ------------- This is Script For Admin Pages----------------------//

function validateEmail(addr,man,db) {
	if (addr == '' && man) {
	   if (db) alert('Email address is mandatory');
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
function validate_alphanumeric(value)
{
	var alphanumeric = /([a-zA-Z(0-9)._-]+)$/;
	
	return alphanumeric.test(value);
}
function validate_url(url)
{
     return url.match(/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/);
}

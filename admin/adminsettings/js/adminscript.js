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
		  if (db) alert('Email address contains invalid characters');
		  return false;
	   }
	}
	for (i=0; i<addr.length; i++) {
	   if (addr.charCodeAt(i)>127) {
		  if (db) alert("Email address contains non ascii characters.");
		  return false;
	   }
	}

	var atPos = addr.indexOf('@',0);
	if (atPos == -1) {
	   if (db) alert('Email address must contain an @');
	   return false;
	}
	if (atPos == 0) {
	   if (db) alert('Email address must not start with @');
	   return false;
	}
	if (addr.indexOf('@', atPos + 1) > - 1) {
	   if (db) alert('Email address must contain only one @');
	   return false;
	}
	if (addr.indexOf('.', atPos) == -1) {
	   if (db) alert('Email address must contain a period in the domain name');
	   return false;
	}
	if (addr.indexOf('@.',0) != -1) {
	   if (db) alert('period must not immediately follow @ in email address');
	   return false;
	}
	if (addr.indexOf('.@',0) != -1){
	   if (db) alert('period must not immediately precede @ in email address');
	   return false;
	}
	if (addr.indexOf('..',0) != -1) {
	   if (db) alert('two periods must not be adjacent in email address');
	   return false;
	}
	var suffix = addr.substring(addr.lastIndexOf('.')+1);
	if (suffix.length != 2 && suffix != 'com' && suffix != 'net' && suffix != 'org' && suffix != 'edu' && suffix != 'int' && suffix != 'mil' && suffix != 'gov' & suffix != 'arpa' && suffix != 'biz' && suffix != 'aero' && suffix != 'name' && suffix != 'coop' && suffix != 'info' && suffix != 'pro' && suffix != 'museum') {
	   if (db) alert('invalid primary domain in email address');
	   return false;
	}
return true;
}

/*function subscriber_validation()
{
		 if (document.mform.fname.value== "" )
		 { 
			 alert ("Please Enter your Name");
			 document.mform.name.focus();
			 return false;
		 }
		 if (document.mform.email.value== "" )
		 { 
			 alert ("Please Enter Your E-mail Address");
			 document.mform.email.focus();
			 return false;
		 }
		  if (!validateEmail(document.mform.email.value,1,1)) 
		 {
		 document.mform.email.focus();
		 return false;
		 }
		
}
*/
/*function member_validation(){
	
	 if (document.mform.email.value== "" )
		 { 
			 alert ("Please enter emailaddress");
			 document.mform.email.focus();
			 return false;
		 }
		 
		  if (document.mform.pwd.value== "" )
		 { 
			 alert ("Please enter the Password");
			 document.mform.pwd.focus();
			 return false;
		 }
		 
		   if (document.mform.cname.value== "" )
		 { 
			 alert ("Please enter the Company name");
			 document.mform.cname.focus();
			 return false;
		 }
		 
		  if (document.mform.gender.value== "" )
		 { 
			 alert ("Please Select the Register type");
			 document.mform.gender.focus();
			 return false;
		 }
		 if (document.mform.fname.value== "" )
		 { 
			 alert ("Please Enter the Member First name");
			 document.mform.fname.focus();
			 return false;
		 }
		 
		  if (document.mform.fname.value== "" )
		 { 
			 alert ("Please Enter the Member Last name");
			 document.mform.lname.focus();
			 return false;
		 }
		 
		  if (document.mform.address1.value== "" )
		 { 
			 alert ("Please Enter the Address1");
			 document.mform.address1.focus();
			 return false;
		 }
		 
		  if (document.mform.address2.value== "" )
		 { 
			 alert ("Please Enter the Address2");
			 document.mform.address2.focus();
			 return false;
		 }
		 
		  if (document.mform.city.value== "" )
		 { 
			 alert ("Please Enter the City");
			 document.mform.city.focus();
			 return false;
		 }
		 
		 
		 	  if (document.mform.state.value== "" )
		 { 
			 alert ("Please Enter the State");
			 document.mform.state.focus();
			 return false;
		 }
		 
		 
		 	  if (document.mform.country.value== "Choose" )
		 { 
			 alert ("Please Select the Country");
			 document.mform.country.focus();
			 return false;
		 }
		 
		 	  if (document.mform.pincode.value== "" )
		 { 
			 alert ("Please Enter the Pin code");
			 document.mform.pincode.focus();
			 return false;
		 }
		 
		 if (document.mform.dob.value== "" )
		 { 
			 alert ("Please Enter the Date of Birth");
			 document.mform.dob.focus();
			 return false;
		 }
		 
		 
		 if (document.mform.phone.value== "" )
		 { 
			 alert ("Please Enter the Phone Number");
			 document.mform.phone.focus();
			 return false;
		 }
		 
		  if (document.mform.fax.value== "" )
		 { 
			 alert ("Please Enter the Fax");
			 document.mform.fax.focus();
			 return false;
		 }
         return true;
}*/
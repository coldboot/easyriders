/*function for checking valid digits*/
function validDigits(FormName,ElemName){
	var digits="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@_.-";
	var frmElement=document.forms[FormName].elements[ElemName];
	var temp;
	for(var i=0;i<frmElement.value.length;i++){
		temp=frmElement.value.substring(i,i+1);
		if(digits.indexOf(temp)==-1){
			return (false);
		}
	}
	return (true);
}

/*function for checking blank fields*/
function IsBlank(FormName,ElemName){
	
	var frmElement=document.forms[FormName].elements[ElemName];
	var temp;
	var countSpace=0;
	for(var i=0;i<frmElement.value.length;i++){
		temp=frmElement.value.substring(i,i+1);
		if(temp.indexOf(" ")!=-1){
			countSpace++;
		}
	}
	if (countSpace==frmElement.value.length)
		return (false);
	
		return (true);
}

/*function for checking Email address*/
function IsEmailValid(FormName,ElemName){
	
	if (validDigits(FormName,ElemName)==false){
		return (false);
	}
	var EmailOk  = true
	var Temp     = document.forms[FormName].elements[ElemName]
	var AtSym    = Temp.value.indexOf('@')
	var Period   = Temp.value.lastIndexOf('.')
	var Space    = Temp.value.indexOf(' ')
	var Dot      = Temp.value.indexOf('.')
	var Length   = Temp.value.length - 1   // Array is from 0 to length-1

	if ((AtSym < 1) ||                     // '@' cannot be in first position
	    (Period <= AtSym+1) ||             // Must be atleast one valid char btwn '@' and '.'
	    (Period == Length ) ||             // Must be atleast one valid char after '.'
	    (Space  != -1)      ||              // No empty spaces permitted
	    (Dot ==0 )          ||            // No Dot on first position permitted
	    (Dot+1 ==AtSym ))                      // No Dot on first position permitted
	   {  
	      EmailOk = false
	   }
	return EmailOk
}


// replace invalid characters
function stringFilter (input) {
	s = input.value;
	filteredValues = "\"\'";     // Characters stripped out
	var i;
	var returnString = "";
	 // Search through string and append to unfiltered values to returnString.
	for (i = 0; i < s.length; i++) { 
		var c = s.charAt(i);
		if (filteredValues.indexOf(c) == -1) returnString += c;
	}
	input.value = returnString;
}

function stringFilter1 (input) {
	s = input;
	filteredValues = "\"\'";     // Characters stripped out
	var i;
	var returnString = "";
	 // Search through string and append to unfiltered values to returnString.
	for (i = 0; i < s.length; i++) { 
		var c = s.charAt(i);
		if (filteredValues.indexOf(c) == -1) returnString += c;
	}
	input = returnString;
}
// Function to Redirect to other framesets
function doThis(targets) {
  parent.frames["mainFrame"].document.location = targets
}



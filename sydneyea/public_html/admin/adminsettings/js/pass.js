function passvalidate()
{
	

	if(document.projectform.Old.value=="")
	{
		alert("Please Select Your Old Password");
		document.projectform.Old.focus();
		return false;
	}
	if(document.projectform.Password.value=="")
	{
		alert("Please Enter Your New Password");
		document.projectform.Password.focus();
		return false;
	}
		
	if(document.projectform.Conpassword.value=="")
	{
		alert("Please Enter Your Confirm Password");
		document.projectform.Conpassword.focus();
		return false;
	}
	
    if(document.projectform.Password.value!=document.projectform.Conpassword.value)
	{
		
		alert("New password does'nt match");
		document.projectform.Password.focus();
		return false;
	}
		
	return true;
}
	// JavaScript Document
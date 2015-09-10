function projectformvalidate()
{
	

	if(document.projectform.varCompany.value=="")
	{
		alert("Please Select Your Name of the Company");
		document.projectform.varCompany.focus();
		return false;
	}
	if(document.projectform.varContactPerson.value=="")
	{
		alert("Please Enter Your Contact Person");
		document.projectform.varContactPerson.focus();
		return false;
	}
		
	if(document.projectform.varEmail.value=="")
	{
		alert("Please Enter Your Email Address");
		document.projectform.varEmail.focus();
		return false;
	}
	if(document.projectform.intRows.value=="")
	{
		alert("Please Select Your No of Rows Displayed per Page");
		document.projectform.intRows.focus();
		return false;
	}
	if(document.projectform.varAdminPage.value=="")
	{
		alert("Please Enter Your Admin Page Title");
		document.projectform.varAdminPage.focus();
		return false;
	}if(document.projectform.varHomePage.value=="")
	{
		alert("Please Enter Your Home Page Title");
		document.projectform.varHomePage.focus();
		return false;
	}if(document.projectform.intDateFormat.value=="")
	{
		alert("Please Enter Your DateFormat");
		document.projectform.intDateFormat.focus();
		return false;
	}i
    
	return true;
}
	// JavaScript Document
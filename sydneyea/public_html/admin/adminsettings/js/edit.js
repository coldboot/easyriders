function editvalidate()
{
	

	if(document.form1.intCategoryid.value=="")
	{
		alert("Please Select Your Categoryname");
		document.form1.intCategoryid.focus();
		return false;
	}
		
	if(document.form1.categorydescription.value=="")
	{
		alert("Please Enter Your Category Description");
		document.form1.categorydescription.focus();
		return false;
	}
	
	return true;
}
	// JavaScript Document
function cmsvalidate()
{


	if(document.projectform.Heading.value=="")
	{
		alert("Please Select Your Heading");
		document.projectform.Heading.focus();
		return false;
	}
	if(document.projectform.varMetaTitle.value=="")
	{
		alert("Please Enter Your Meta Title");
		document.projectform.varMetaTitle.focus();
		return false;
	}
		
	if(document.projectform.metakey.value=="")
	{
		alert("Please Enter Your Meta Keyword");
		document.projectform.metakey.focus();
		return false;
	}
	if(document.projectform.metadesc.value=="")
	{
		alert("Please Select Your Meta Tag Description");
		document.projectform.metadesc.focus();
		return false;
	}
	if(document.projectform.txtStatement.value=="")
	{
		alert("Please Enter Your Content");
		document.projectform.txtStatement.focus();
		return false;
	}
    
	return true;
}
	// JavaScript Document
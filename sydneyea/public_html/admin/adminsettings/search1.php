<?php
if(isset($_POST['search']))
{
$search = $_POST['user'];
//header("Location:http://server/projects/rajkumar/iui/admin/adminsettings/search.php?search=$search");
//header("Location:http://wsdemos.info/ourprojects/iui/admin/adminsettings/search.php?search=$search");
header("Location:search.php?search=$search");

}
?>
<html>
<body>
<script type="text/javascript">
function search1()
{
if(document.sear.user.value=="")
{
alert("Search field cant be blank");
document.sear.user.value.foucs();
return false;
}}
function make_blank()
{
document.sear.user.value ="";
}
</script>
<form name="sear" method="post" action="" onSubmit="return search1();">
<input type="text" name="user" size=15  style="font-style:oblique; background-color:#CCCCCC;"  value="Search user"onClick="make_blank();"><input name="search" type="submit" value="search"></br>
<!--<input type="checkbox" name="fname" value="Firstname">-->
</form>
</body></html>


<!--$limqry		= "SELECT * FROM tbl_iui_user  WHERE Username LIKE '%$user%' order by intid DESC  limit $offset,$limit ";-->
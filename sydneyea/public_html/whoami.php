<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Server Info</title>
</head>

<body>

<H1>PHP INFO</H1>

<?php
phpinfo();	// Show all information
?>

<H1>$_SESSION INFO</H1>
<?php
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>

</body>
</html>
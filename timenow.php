<?php
include("include/dbconnect.php");
include("include/constants.php");

$timenow = date('Y-m-d H:i:s');

echo "Time before WP include: ".$timenow;

require('blog/wp-blog-header.php');

$timenow = date('Y-m-d H:i:s');

echo "Time after WP include: ".$timenow;

?>

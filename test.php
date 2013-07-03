<?php
$to = "tset@measures.com.au";
$from ="webserver@sydney-easy-riders.com.au";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?> 

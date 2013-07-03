

<?php
@session_start();
$asd  = $_SESSION['Session_Username'] ? "logout" : "login"; ?>
<tr>
	<td align="center" class="footer_text">
		<a href="index.php"  class="footer_text">Home</a> | <a  class="footer_text" href="index.php?page=<?php echo base64_encode("termsandconditions"); ?>">Terms And Conditions</a> | <a href="index.php?page=<?php echo base64_encode("privacypolicy")?>"  class="footer_text">Privacy Policy</a> | <a href="<?php echo $asd; ?>.php" class="footer_text"><?php echo $asd; ?></a>
	</td>
</tr>
<tr>
    <td height="50" valign="top" class="footer_text"><p>Karooequine Ltd - Exclusive Sole UK (excl.  N. Ireland)
    Distributor for Kentucky Performance Products LLC</p>
    <p>Copyright (C) 2010 <a href="http://karooequine.com" target="_blank" class="a">karooequine.com</a> All rights reserved</p></td>
  </tr>
<?php 
	
	//include('header.php');
	include("include/dbconnect.php");
	include("include/constants.php");
	include("include/paging.php");
    include("include/functions.php");
	
	$pagqry="SELECT * FROM  tbl_gigband_testimonial";
	$R_Check	= mysql_query($pagqry) or die(mysql_error());
	//$C_Check	= mysql_fetch_array($R_Check);
  
?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <?php include("front/header.php"); ?>
      <tr>
        <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center"></td>
          </tr>
          <tr>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="large_head">&nbsp;</td>
                      </tr>
                      <!--<tr>
                        <td class="large_head">Testimonials.html</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>-->
                      <tr>
                        <td><span id="ctl00_mainAjaxPanel$RBS_Holder"><span id="ctl00_mainAjaxPanel" ajaxcall="async"><span id="ctl00_leftAjaxPanel$rbs" name="__ajaxmark"><span id="ctl00_leftAjaxPanel" ajaxcall="async">
                          <h2 class="small_head">From the buyers:</h2>
                        </span></span></span></span></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
					  
					  
					    <?php
							  
							  
  				  					$i=$offset ;
//								$C_Check	= mysql_fetch_array($R_Check);	
					   while($C_Check=mysql_fetch_array($R_Check))
							   
							 
					{  								 $i++;
 ?>
 
					  <tr>
                        <td class="box-border"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="200" valign="top" bgcolor="#FFFFFF"><img src="testimg/<?php echo $C_Check['catimage'];?>" width="185" height="188" align="middle" /></td>
                            <td class="ver_line">&nbsp;</td>
                            <td valign="top" bgcolor="#FFFFFF"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="large_head1"><br />
                                  <?php echo $C_Check['varCategoryname']; ?>	</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="body_style" id="ctl00_mainAjaxPanel$RBS_Holder2"><span id="ctl00_mainAjaxPanel2" ajaxcall="async"><span id="ctl00_leftAjaxPanel$rbs2" name="__ajaxmark"><span id="ctl00_leftAjaxPanel2" ajaxcall="async">&quot;<?php echo $C_Check['catDescription']; ?>&quot; <br />
                                          <br />
- <?php echo $C_Check['country']; ?> <br />	
                                </span></span></span></span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><a href="<?php echo $C_Check['url']; ?>" class="a"><?php echo $C_Check['url']; ?></a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
					  <tr><td>&nbsp;</td></tr>
					  
					  	<?php
								//$j++;
//								
//								if($j>2)
//								{
//								 echo "</tr><tr><td>&nbsp;</td></tr><tr>";
//								 $j=0;
//								 }
								
								 
								} ?>
					  
                    
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                      
                      
                      
                      
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php include("front/footer.php"); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>

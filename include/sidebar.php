

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="left_head_image"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="30"><img src="images/arrow1.jpg" width="31" height="7" /></td>
                        <td class="left_head">Categories</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><ul class="leftlist1">
					<?php 
					$rescat = _CATEGORY();
					while($fetchcat = mysql_fetch_array($rescat)) {  extract($fetchcat); ?>
                    <li><a href="index.php?page=<?php echo base64_encode("Products"); ?>&pid=<?php echo base64_encode($catid);  ?>"><?php echo $varCategoryname; ?></a></li>
               <?php }?>
                </ul></td>
                  </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="left_head_image"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="30"><img src="images/arrow1.jpg" width="31" height="7" /></td>
                          <td class="left_head">Specials</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" class="small_head">Product #013</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
          
</td>
                  </tr>
                </table></td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
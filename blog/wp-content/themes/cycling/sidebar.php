<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
					
				 <tr>
                        <td class="head_yellow">Recent posts</td>
                      </tr>
					  <tr><td>&nbsp;</td></tr>
                      
<tr><td>
	
<?php wp_get_archives('title_li=&type=postbypost&limit=10'); ?>

</td></tr>
						
						
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                     
                     
                      <tr>
                        <td><table width="97%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="5"></td>
                          </tr>
                          <tr>
                            <td width="85" class="body_text_gray">
							<?php
							if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
<?php endif; // end primary widget area ?>
							
							
							 </td>
                          </tr>
                          
                        </table></td>
                      </tr>
                      
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
				  <tr>
				  <td>
				  
				  
				  
				  
				  
				  <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="head_yellow">Recent Categories</td>
                      </tr>
                      
                     
                      <tr>
                        <td><table width="97%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="5"></td>
                          </tr>
                          <tr>
                            <td width="85" class="body_text_gray">
 <?php wp_list_categories( $args ); ?> 
							
							
							 </td>
                          </tr>
                          
                        </table></td>
                      </tr>
                      
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
</td></tr>				  
				  
				  
                  <tr>
                    <td><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="head_yellow">Blog Archive</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    
                  <tr>
				  <td> <?php wp_get_archives( $args ); ?> </td></tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="head_yellow">Follow Us on &nbsp; </td>
						<td><a href="http://www.facebook.com/groups/148883881800393/"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" width="28" height="29" border="0" /></a> </td>
						
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      
                    </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="355">&nbsp;</td>
                  </tr>
                </table>
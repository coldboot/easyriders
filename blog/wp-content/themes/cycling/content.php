<table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			   <?php if (have_posts()) : ?>
  
  	<?php while (have_posts()) : the_post(); ?> 
	
	
                  <tr>
                    <td class="box"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="5" colspan="3" align="center" ></td>
                            </tr>
                            <tr>
                            								  							  
								    <td width="54" align="center" class="tag_bg white_text"><span class="black_text"><strong><?php the_time('M') ?></strong></span><br />
                                  <strong><?php the_time('j') ?></strong> </td>
								  
								  
								  
								  
								      <td class="head"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="head" style="text-decoration:none;"> <?php the_title(); ?> </a></td>
					
					 					 
                              <td align="right" class="body_text_gray">Posted by <?php the_author() ?>&nbsp;<?php comments_popup_link('Leave a Comment &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> </td>
								  
                              
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="body_text"><?php the_content(); ?></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              
							  
							  
							    <td align="right"><a href="<?php the_permalink() ?>"> <img src="<?php bloginfo('template_directory'); ?>/images/readmore.png" width="83" height="28" border="0" /> </a></td>
								
								
							  
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="5"></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border_box">
                            <tr>
							
							  <td height="30" class="small_text"><strong>Labels:</strong> <?php the_category(', ') ?> | <?php comments_popup_link('Leave a Comment &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></td>
							
							
							</tr>
							
							
								<tr>
							
							  <td align="left"><?php comments_template( '', true ); ?>
</td></tr>
							
							
							
                        </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <?php endwhile; ?>
			    <?php endif; ?> 
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              
             
              
            </table>
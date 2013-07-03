<?php
/*
Template Name: addposts
*/

error_reporting(0);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Easy Riders-Add Post</title>

<link href="<?php bloginfo('template_directory'); ?>/images/style.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="/blog/favicon new.ico" type="image/x-icon">
<link rel="icon" href="/blog/favicon new.ico" type="image/x-icon">

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
              <td><a href="/index.php"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" width="484" height="74" border="0" /></a></td>

            <td><table border="0" align="right" cellpadding="0" cellspacing="0">

              <tr>
                <td><a href="/" class="a"><b>Home</b></a></td>
                <td width="10" align="center" class="white_text">|</td>
                <td><a href="/blog/" class="a"><b>Blog</b></a></td>
		<td width="10" align="center" class="white_text">|</td>
                <td><a href="/blog/?page_id=135" class="a"><b>Add Posts</b></a></td>
              </tr>

            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#ebebeb"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="10" colspan="3"></td>
            </tr>
			
			
			<? 
			include_once('wp-config.php');
			include_once('wp-load.php');
			include_once('wp-includes/wp-db.php');

			global $current_user;

			$current_user = wp_get_current_user();

			if(isset($_POST['sub_x'])) 
			{ 
			    if(is_user_logged_in()) 
			    {
				$title=$_POST['title'];
				$category=$_POST['category'];  
				$desc=$_POST['desc'];

				$post = array(
				'post_title' => $title,
				'post_content' => $desc,
				'post_category' => $category, // Usable for custom taxonomies too
				'post_status' => 'publish', // Choose: publish, preview, future, etc.
				// 'post_author' => $current_user,
				'post_type' => 'post' // Use a custom post type if you want to
				);

				wp_insert_post($post,0); // Pass the value of $post to WordPress the insert
				// Do the wp_insert_post action to insert it
				do_action('wp_insert_post', 'wp_insert_post');
				global $wpdb;
				$post_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '$title' AND post_status = 'publish' AND post_type='post' ORDER BY post_date DESC LIMIT 1"); 

				$ins="insert into wp_term_relationships(`object_id`,`term_taxonomy_id`)values('$post_id','$category')";   
				$res=mysql_query($ins);
				$message = "New Post Added Successfully";
			    }
			    else
			    {
				$message = "You must be logged in to post";
			    }
			}
			?>
			
          <tr>
            <td width="715" valign="top" bgcolor="#FFFFFF">
			
			<form action="" method="post" name="addpost" enctype="multipart/form-data" onSubmit="return validation();">
			
			<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td class="head">&nbsp;</td>
              </tr>
			     
			  
			  
              <tr>
                <td style=" color: #FF0000;
    font-size: 22px;
    font-weight: bold;">Add Post</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
			  
			
								<tr>
									<td colspan="2" align="center" style="color:#000000; font-weight:bold; font-size:18px;"><?php echo $message;  ?></td>
									
									
									
									
								</tr>
								<tr><td>&nbsp;</td></tr>
								
			  
              <tr>
                <td><table width="99%" border="0" cellspacing="0" cellpadding="3">
                  <tr>
                    <td class="body_text_gray"><strong>Post Title</strong></td>
                    <td align="center"><strong>:</strong></td>
					
                    <td><input name="title" type="text" class="text_field" id="textfield" /></td>
                  </tr>
				   <tr>
                <td>&nbsp;</td>
              </tr>
                  <tr>
                    <td class="body_text_gray"><strong>Category</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td>
					
					<?php wp_dropdown_categories( array('show_option_all'=>'Please select','name'=>'category', 'tab_index'=>'10','hierarchical'=>'1','class'=>'postselect','hide_empty'=>'0') ); ?>
					
                               </td>
                  </tr>
				   <tr>
                <td>&nbsp;</td>
              </tr>
                  <tr>
                    <td class="body_text_gray"><strong>Description</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td><textarea name="desc" cols="45" rows="5" class="text_area" id="textarea"></textarea></td>
                  </tr>
				  
				  
				    <tr>
                    
                    <td colspan="2" style="padding-left:100px;"><input type="image" name="sub" src="/blog/wp-content/themes/cycling/images/submit.png" width="69" height="29" border="0" /></td>
                    <td><a href="/blog/wp-admin/post-new.php">Advanced Edit</a></td>
                  </tr>
				  
				  
				  
				  
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
			</form>
			</td>
            <td>&nbsp;</td>
            <td width="240" valign="top"><table width="240" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="yellow_box"><?php include("sidebar.php"); ?>
</td>
              </tr>
              
            </table></td>
          </tr>
          <tr>
            <td height="10" colspan="3"></td>
            </tr>
          
        </table></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td class="footer_bg">  <?php include("newfooter.php"); ?></td>
  </tr>
</table>
</body>
</html>
<script type="text/javascript" language="javascript">
		function validation()
		 {
		  	
		
		 if (document.addpost.title.value=='')
		 { 
			 alert ("Please Enter Post Title");
			 document.addpost.title.focus();
			 return false;
		 }
		 
		 	 if (document.addpost.category.value=='')
		 { 
			 alert ("Please Select Category");
			 document.addpost.category.focus();
			 return false;
		 }
		  	 if (document.addpost.desc.value=='')
		 { 
			 alert ("Please Enter Description");
			 document.addpost.desc.focus();
			 return false;
		 }
		 
		 
		 return true;
		 
		 }
		 </script>
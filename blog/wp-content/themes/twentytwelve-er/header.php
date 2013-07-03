<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
	  <hgroup>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><a href="/"><img src="/images/logo.png" width="484" height="74" border="0" /></a></td>

           <td><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td><a href="/" class="a"><b>Home</b></a></td>
                <td width="10" align="center" class="white_text">|</td>
		<?php if( !is_user_logged_in() ){ ?>
               	   <td><a href="/login.php?page=login" class="a"><b>Login</b></a></td>
                <?php } ?>
		<?php if( is_user_logged_in() ){ ?>
                   <td><a href="/blog/wp-admin/post-new.php" class="a"><b>Add Post</b></a></td>
	  	<?php } ?>
              </tr>
            </table></td>
		  </tr>

          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </hgroup>

	<div id="main" class="wrapper">
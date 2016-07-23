<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 * and the left sidebar conditional
 *
 * @since 1.0.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta name="google-site-verification" content="RTCHQ2OmHEzh2GSJI2VySe5iSJo2TmDiZOVbc_5evUU" />
<meta name="resource-type" content="document" />
<meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
<meta http-equiv="content-language" content="en-us" />
<meta name="author" content="Jass Toor" />
<meta name="contact" content="jasstoor89@gmail.com" />
<meta name="copyright" content="Copyright (c)2000-2015 THEHEAVENHOMES. All Rights Reserved." />
<meta name="description" content=" Heaven Homes is focused on developing unique, luxury homes that are based on western comforts and lifestyles.We specialize in creating homes that model after the rich, luxurious, western aristocratic homes." />
<meta name="keywords" content="home, house, heaven, builder, contractor, construction, kitchenmakeover, material suppy, interior, paint, decoration" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVGeOlG-oGCCteMnKE9sY7tAdrws5BVg0"></script> -->
<!--[if IE]><script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/html5.js"></script><![endif]-->

<?php wp_head(); ?>
</head>
<?php
$bavotasan_theme_options = bavotasan_theme_options();
$space_class = '';
?>
<body <?php body_class(); ?>>

	<div id="page">
    <header id="header">
			<nav id="site-navigation" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<h3 class="sr-only"><?php _e( 'Main menu', 'arcade' ); ?></h3>
				<a class="sr-only" href="#primary" title="<?php esc_attr_e( 'Skip to content', 'arcade' ); ?>"><?php _e( 'Skip to content', 'arcade' ); ?></a>

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				</div>

				<div class="collapse navbar-collapse">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'bavotasan_default_menu', 'depth' => 2 ) ); ?>
				</div>
			</nav><!-- #site-navigation -->

			 <div class="title-card-wrapper">
                <div class="title-card">
    				<div id="site-meta">
						  <div class="gradient"></div>
    					
							  <a href="/"><h1 id="site-title">THE HEAVEN HOMES</h1></a>
							
    					<?php if ( $bavotasan_theme_options['header_icon'] ) { ?>
    					<i class="fa <?php echo $bavotasan_theme_options['header_icon']; ?>"></i>
    					<?php } else {
    						$space_class = ' class="margin-top"';
    					} ?>

    					<h2 id="site-description"<?php echo $space_class; ?>>
    						<?php bloginfo( 'description' ); ?>
								 <div class="contact_no">
								   CLICK TO CALL<br/>
								   <a href="tel:+919814370085">+919814370085</a>, 
									 <a href="tel:+919815127878">+919815127878</a>
								 </div>
								
    					</h2>

    					<a href="#" id="more-site" class="btn btn-default btn-lg"><?php _e( 'See More', 'arcade' ); ?></a>
    				</div>

    				<?php
    				// Header image section
    				bavotasan_header_images();
						 
    				?>
				</div>
			</div>

		</header>
		<div class="social-icons">
				<a href="http://www.facebook.com" target="_BLANK"><div class="facebook"><i class="fa fa-facebook"></i></div></a>
				<a href="http://www.plus.google.com" target="_BLANK"><div class="google-plus"><i class="fa fa-google-plus"></i></div></a>
				<a href="http://www.twitter.com" target="_BLANK"><div class="twitter"><i class="fa fa-twitter"></i></div></a>
		</div>
		<main>
		<div class="container">
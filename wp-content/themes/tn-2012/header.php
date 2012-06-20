<?php
/**
 * The Header for our theme.
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Side %s', 'teaterneuf' ), max( $paged, $page ) );

	?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/ie.css" />
    <![endif]-->        
</head>

<body <?php body_class(); ?>>

<section id="container">
<div id="page" class="hfeed">
	<header id="branding" role="banner">
			<div class="hgroup">
                <a href="<?php bloginfo('url'); ?>"></a>
				<div id="site-title"><div class="head"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/teater_neuf.jpg"></a></div></div>
			</div>

			<nav id="access" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
			</nav><!-- #access -->
	</header><!-- #branding -->


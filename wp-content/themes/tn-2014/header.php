<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="no" lang="no">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow" />
    <meta name="x-stylesheet-directory" content="<?php bloginfo( 'stylesheet_directory' ); ?>" />
    <?php neuf_doctitle(); ?>
    <link rel="icon" type="image/png" href="favicon.png" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('url'); ?>/feed/" title="Teater Neuf" />

    <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/style.css" rel="stylesheet" type="text/css" />
    <link href='//fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,700,800,600' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
    <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/bower_components/momentjs/moment.js"></script>
    <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/bower_components/momentjs/lang/nb.js"></script>
    <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/app.js"></script>

    <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body <?php neuf_body_class(); ?>>
    <div id="ribbon"><a href="http://studentersamfundet.no"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/ribbon.png" /></a></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/nb_NO/all.js#xfbml=1&appId=220213643760";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div id="fb-root"></div>
    <header id="site-header">
        <div id="header-container">
            <div class="site-title">
                <a href="<?php bloginfo('url') ?>/" title="<?php bloginfo('name') ?>" rel="home" class="logo"><?php bloginfo('name') ?></a>
                </span>
            </div>

            <?php get_template_part( 'menu' ); ?>

        </div> 
    </header><!--  #site-header -->


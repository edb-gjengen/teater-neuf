<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="no" lang="no">
<head>
	<meta charset="utf-8" />
    <meta name="robots" content="index,follow" />
    <?php neuf_doctitle(); ?>
    <link rel="icon" type="image/png" href="favicon.png" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('url'); ?>/feed/" title="Det Norske Studentersamfund (nyheter)" />
    <link rel="alternate" type="application/rss+xml" href="http://studentersamfundet.no/syndikering/kommende-program/" title="Det Norske Studentersamfund (kommende program)" />

    <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/style.css" rel="stylesheet" type="text/css" />
    <link href='//fonts.googleapis.com/css?family=Arvo:700,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,700,800,600' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
    <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/bower_components/momentjs/moment.js"></script>
    <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/app.js"></script>

    <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body <?php neuf_body_class(); ?>>
    <div id="ribbon"><a href="http://studentersamfundet.no"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/ribbon.gif" /></a></div>
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


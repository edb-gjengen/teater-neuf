<?php
/*
Template Name: Archives
*/
get_header(); ?>

<div id="container">
	<div id="content" role="main">

        <div class="body">

            <?php the_post(); ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            
            <?php get_search_form(); ?>
            
            <h2>Per måned:</h2>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>
            
            <h2>Per kategori:</h2>
            <ul>
                 <?php wp_list_categories(); ?>
            </ul>
        </div>

	</div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>

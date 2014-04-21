<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'cover' ); ?>
    <div id="content">
        <article <?php neuf_post_class(); ?>>
            <?php if( !has_post_thumbnail() ) { ?>
                <!-- Overlayed over post thumbnail if it exists -->
                <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>
            
            <div class="body">
                <div class="entry-content"><?php the_content(); ?></div> <!-- .entry-content -->
                <?php display_social_sharing_buttons(); ?>
            </div>

            <div class="featured-image">
            </div>

        </article> <!-- .hentry -->

    </div>
<?php endwhile; endif; ?>

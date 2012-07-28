		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

			<article <?php neuf_post_class(); ?>>

				<div class="body grid_6">

                    <?php get_template_part( 'eventmeta' , 'single' ); ?>

					<div class="entry-content"><?php the_content(); ?></div> <!-- .entry-content -->

					<?php display_social_sharing_buttons(); ?>

				</div>

				<div class="featured-image grid_6">

					<?php the_post_thumbnail( array('580', '800') , array( 'style' => 'display:block;margin:auto;' ) ); ?>

				</div>

				<?php neuf_maybe_display_gallery(); ?>

			</article> <!-- .post -->

		<?php endwhile; endif; ?>

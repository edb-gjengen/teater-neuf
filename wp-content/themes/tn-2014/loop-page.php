		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

			<article <?php neuf_post_class(); ?>>

				<div class="body grid_6">

					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-content"><?php the_content(); ?></div> <!-- .entry-content -->

					<?php display_social_sharing_buttons(); ?>

				</div>

				<div class="featured-image grid_6">

					<?php the_post_thumbnail( 'large' , array( 'style' => 'display:block;margin:auto;' ) ); ?>

				</div>

				<?php neuf_maybe_display_gallery(); ?>

			</article> <!-- .hentry -->

		<?php endwhile; endif; ?>

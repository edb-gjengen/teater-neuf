		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

			<article <?php neuf_post_class(); ?>>
                <h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="body">

                    <div class="entry-meta byline"><span class="meta-prep meta-prep-author">av </span><span class="author vcard"><?php the_author_link(); ?></span>, <span class="entry-date"><?php echo date_i18n( get_option('date_format'), get_post_time('U', true) ).", ".date_i18n( get_option('time_format'), get_post_time('U', true) ); ?></span></div>
					<?php the_post_thumbnail( 'single' ); ?>
					<div class="entry-content"><?php the_content(); ?></div> <!-- .entry-content -->

					<?php display_social_sharing_buttons(); ?>

				</div>

			</article> <!-- .hentry -->

		<?php endwhile; endif; ?>

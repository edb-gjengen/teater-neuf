		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

			<article <?php neuf_post_class(); ?>>

				<div class="body grid_6">

					<h1 class="entry-title"><?php the_title(); ?></h1>
                                        <?php if( get_post_type() == 'association' ): ?>
                                        <?php
                                                $homepage = get_post_meta(get_the_ID() , '_neuf_associations_homepage' , true );
                                                echo $homepage ? '<div class="entry-meta byline">Nettside: <a href="'.$homepage.'">'.$homepage.'</a></div>' : '';
                                            ?>
                                        <?php else: ?>
                                            <div class="entry-meta byline"><span class="meta-prep meta-prep-author">av </span><span class="author vcard"><?php the_author_link(); ?></span>, <span class="entry-date"><?php the_date('l d. M Y'); ?> kl <?php the_time('G.i'); ?></span></div>
                                        <?php endif; ?>
					<div class="entry-content"><?php the_content(); ?></div> <!-- .entry-content -->

					<?php display_social_sharing_buttons(); ?>

				</div>

				<div class="featured-image">

					<?php the_post_thumbnail( 'large' , array( 'style' => 'display:block;margin:auto;' ) ); ?>

				</div>

				<?php neuf_maybe_display_gallery(); ?>

			</article> <!-- .hentry -->

		<?php endwhile; endif; ?>

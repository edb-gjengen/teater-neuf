		<div id="digest-news" class="hfeed">

			<h3><a href="<?php bloginfo('url'); ?>/nyheter/">Siste nyheter</a></h3>

				<?php // The LOOP
					$digest_news = new WP_Query( 'posts_per_page=3' );
					if ( $digest_news->have_posts() ) : while ( $digest_news->have_posts() ) : $digest_news->the_post();
				?>
                    <div class="news-entry">
					<article id="post-<?php the_ID(); ?>" <?php neuf_post_class(); ?>>
                        <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/knapp.png" class="button" />
						<a class="permalink entry-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						<div class="entry-meta byline"><span class="entry-date"><?php echo date_i18n( get_option('date_format')).", ".date_i18n( get_option('time_format')); ?></span></div>
						<div class="entry-summary"><?php echo linkify(trim_excerpt(get_the_excerpt(), 30), '/\[\.\.\.\]/', get_permalink()); ?></div>
                    </article>
                </div>
					<?php
					endwhile;
					?>
			<?php endif; ?>
				</div>

		</div> <!-- #articles -->

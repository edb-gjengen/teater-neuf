<?php
/**
 * Fetch events from today and onwards.
 *
 * Ref: http://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters
 */
$meta_query = array(
	'relation' => 'AND',
	array(
		'key'     => '_neuf_events_starttime',
		'value'   => date( 'U' , strtotime( '-8 hours' ) ), 
		'compare' => '>',
		'type'    => 'numeric'
	), 
	array(
		'key'     => '_neuf_events_promo_period',
		'value'   => array( 'Month' , 'semester' ),
		'compare' => 'IN',
	)
);

$args = array(
	'post_type'      => 'event',
	'meta_query'     => $meta_query,
	'posts_per_page' => 4
);

$events = new WP_Query( $args );

$news = new WP_Query( 'type=post' );
?>
<?php if ($events->have_posts()) : ?>
	<section id="featured" class="clearfix">
        <div id="slider-buttons">
            <div id="prevLink"></div>
            <div id="slidernav"></div>
            <div id="nextLink"></div>
        </div>
		<div id="slider"> 
		<?php
		if ($news->have_posts()) : $news->the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php neuf_post_class(); ?>>
				<a class="permalink blocklink" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
					<header class="featured-text grid_6">
						<h1><?php the_title(); ?></h1>
						<?php the_excerpt(); ?>
					</header>
					<div class="featured-image grid_6">
						<?php the_post_thumbnail( 'six-column-promo' ); ?>
					</div>
				</a>
			</article> <!-- #post-<?php the_ID(); ?> -->

		<?php endif; // $news->have_posts() ?>

		<?php $counter = 0;
		while ($events->have_posts() && $counter < 4) : $events->the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php neuf_post_class(); ?>>
				<a class="permalink blocklink" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
					<header class="featured-text grid_6">
						<h1><?php the_title(); ?></h1>
						<?php the_excerpt(); ?>
                        <div class="entry-meta">
                            <div class="datetime"><?php echo ucfirst( date_i18n( 'l j. F H.i ' , get_post_meta(get_the_ID() , '_neuf_events_starttime' , true ) ) ); ?></div>
                            <div class="price"><?php echo ($price = neuf_get_price( $post )) ? $price : "Gratis"; ?></div>
                            <div class="venue"><?php echo get_post_meta(get_the_ID(), '_neuf_events_venue',true);?></div>
                        </div>
					</header>
					<div class="featured-image grid_6">
						<?php the_post_thumbnail( 'six-column-promo' ); ?>
					</div>
				</a>
			</article> <!-- #post-<?php the_ID(); ?> -->

		<?php
		$counter++;
		endwhile; // $events->have_posts()
		?>

	    </div>
	</section>

<?php endif; // $events->have_posts()

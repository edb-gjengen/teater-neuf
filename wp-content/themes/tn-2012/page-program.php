<?php 
get_header(); 
?>

<section id="content" class="container_12 hidden" role="main">
    <div id="program-text">
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <div><?php the_content(); ?></div>
        <?php endwhile; endif; ?>
    </div>
	
<?php
/* Events with starttime including 8 hours until forever */
$meta_query = array(
	'key'     => '_neuf_events_starttime',
	'value'   => date( 'U' , strtotime( '-8 hours' )),  // start
	'type' => 'numeric',
	'compare' => '>'
);

$args = array(
	'post_type'      => 'event',
	'meta_query'     => array($meta_query),
	'posts_per_page' => 150,
	'orderby'        => 'meta_value_num',
	'meta_key'       => '_neuf_events_starttime',
	'order'          => 'ASC'
);

$events = new WP_Query( $args );

if ( $events->have_posts() ) :
	$first = true;
	$current_month = "";
	$current_day = "";
	$alt = "";
	/* All posts */

?>
<div id="program-list" class="program grid_12">
		<?php while ( $events->have_posts() ) : $events->the_post();
		$date = get_post_meta( $post->ID , '_neuf_events_starttime' , true );

		$previous_month = $current_month;
		$current_month = date_i18n( 'F' , $date);
		$newmonth = $previous_month != $current_month;

		$datel = date_i18n( 'l j/n' , $date);
		$price = neuf_get_price( $post ) ? neuf_get_price( $post ) : '';
		$venue = get_post_meta( $post->ID , '_neuf_events_venue' , true );
		$ticket = get_post_meta( $post->ID , '_neuf_events_bs_url' , true );
                $ticket = $ticket ? '<a href="'.$ticket.'">Kjøp billett</a>' : '';
		/* event type class */
		$event_array = get_the_terms( $post->ID , 'event_type' );
		$event_types = array();
		$event_types_real = array();
		foreach ( $event_array as $event_type ) {
			if ($event_type->parent === "0") {
				$event_types[] = $event_type->name;
			} else {
				$id = (int)$event_type->parent;
				$parent = get_term( $id, 'event_type' );
				$event_types[] = $parent->name;
			}
			$event_types_real[] = $event_type->name;
		}
		$event_type_real = $event_types_real ? "".implode(", ", $event_types_real) : "";
		$event_type_class = $event_types ? "class=\"".implode(" ", $event_types)."\"" : "";
		
		/* set current day */
		$previous_day = $current_day;
		$current_day = date_i18n( 'Y-m-d' , $date);
		$newday = $previous_day != $current_day;

		if($newmonth) { ?>
            <div class="month"><h3><?php echo $current_month; ?></h3></div>
		<?php }
		if($newday) { ?>
            <div class="day"><?php echo $datel; ?></div>
		<?php }	?>
			<div class="event">
                <div class="body">
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo the_title(); ?></a></h2>
                    <span class="excerpt"><?php the_excerpt(); ?></span>
                    <div class="entry-meta">
                        <div class="datetime"><?php echo ucfirst( date_i18n( 'l j. F H.i' , get_post_meta(get_the_ID() , '_neuf_events_starttime' , true ) ) ); ?></div>
                        <div class="price"><?php echo ($price = neuf_get_price( $post )) ? $price : "Gratis"; ?></div>
                        <div class="venue"><?php echo get_post_meta(get_the_ID(), '_neuf_events_venue',true);?></div>
                    </div>
                </div>
                <div class="thumbnail"><?php the_post_thumbnail('six-column-slim'); ?></div>
			</div>
		<?php endwhile; ?>
<?php endif; ?>
</div>

</section> <!-- #main_content -->



<?php get_footer(); ?>

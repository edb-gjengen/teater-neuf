<?php
/**
 * Displays a calendar for the coming week, starting with today.
 *
 * Ref: http://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters
 */
$meta_query = array(
	'key'     => '_neuf_events_starttime',
	'value'   => date( 'U' , strtotime( '-8 hours' ) ), 
	'compare' => '>',
	'type'    => 'numeric'
);

$args = array(
	'post_type'      => 'event',
	'meta_query'     => array( $meta_query ),
	'posts_per_page' => 50,
	'orderby'        => 'meta_value_num',
	'meta_key'       => '_neuf_events_starttime',
	'order'          => 'ASC'
);

$events = new WP_Query( $args );

if ( $events->have_posts() ) :
	$event_daycounter = 1;
	$newday = true;
?>

		<div id="program-6days" class="program grid_12">

		<div class="day day-<?php echo $event_daycounter; ?> grid_2 alpha">

		<?php while ( $events->have_posts() ) : $events->the_post(); ?>

	<?php
		if ( isset( $event_current_day ) )
			$event_previous_day = $event_current_day;

		$event_current_day = date_i18n( 'Y-m-d' , get_post_meta( $post->ID , '_neuf_events_starttime' , true ) );

		if ( isset( $event_previous_day ) &&  $event_previous_day != $event_current_day ) {
			// New day
			$newday = true;
			if ( $event_daycounter >= 7 )
				break;
?>
			</div> <!-- .day -->

			<div class="day day-<?php echo $event_daycounter; ?> grid_2<?php if ( 6 == $event_daycounter ) echo " omega"; ?>">

		<?php } ?>

			<?php
				if ( !isset( $event_previous_day ) || $event_previous_day != $event_current_day ) {
					$event_daycounter++;
			?>

				<h2><?php echo ucfirst( date_i18n( 'l j/n' , get_post_meta( $post->ID , '_neuf_events_starttime' , true ) ) ); ?></h2>

				<?php
				if( $newday && has_post_thumbnail() ) {
					the_post_thumbnail ('two-column-thumb' );
					$newday = false;
				}
				?>

			<?php } ?>

				<p><?php echo date_i18n( 'H.i:' , get_post_meta( $post->ID , '_neuf_events_starttime' , true ) ); ?> <a href="<?php the_permalink(); ?>" title="Permanent lenke til <?php the_title(); ?>"><?php echo the_title(); ?></a></p>


		<?php endwhile; // $events->have_posts(); ?>

			</div> <!-- .day -->

		</div> <!-- #program-6days -->

<?php endif; // $events->have_posts() ?>

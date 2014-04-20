<?php

get_header();

?>
<div id="content">

    <?php get_template_part( 'eventslider' ); ?>

    <?php //get_template_part( 'program' , '3days' ); ?>
    <?php //get_template_part( 'program' , '6days' ); ?>
    <?php get_template_part( 'program' , '6days' ); ?>

    <?php get_template_part( 'digest' ); ?>

</div> <!-- #content -->

<?php get_footer(); ?>

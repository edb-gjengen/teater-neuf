<?php if (has_post_thumbnail( $post->ID ) ) { ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'cover-photo' ); ?>
    <div id="cover-photo" style="background-image: url('<?php echo $image[0]; ?>')">
        <?php if (!is_front_page() ) { ?>
            <div class="title-wrap"><h1 class="entry-title"><?php the_title(); ?></h1></div>
        <?php } ?>
    </div>
<?php } ?>

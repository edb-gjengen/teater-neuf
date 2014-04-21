<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'cover-photo' ); ?>
<div id="cover-photo" style="background-image: url('<?php echo $image[0]; ?>')"></div>
<?php endif; ?>

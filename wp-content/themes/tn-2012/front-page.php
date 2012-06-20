
<?php get_header(); ?>

  <div id="content">

  <?php if ( have_posts() ) : ?>

    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <?php // todo content
      the_content(); ?>

    <?php endwhile; ?>

    <?php // todo footer ?>

  <?php else : ?>

    <article id="post-0" class="post no-results not-found">
      <header class="entry-header">
                                            Nothing.
      </header><!-- .entry-header -->

      </div><!-- .entry-content -->
    </article><!-- #post-0 -->

  <?php endif; ?>

  </div><!-- #content -->

<?php get_footer(); ?>

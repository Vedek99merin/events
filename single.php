<?php get_header(); ?>

  <main id="primary" class="site-main">
    <?php
    the_title();

    the_content();

    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
    ?>
  </main>

<?php
get_sidebar();
get_footer();

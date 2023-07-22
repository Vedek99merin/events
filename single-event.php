<?php
get_header()
?>

<main class="main">

    <h1>Single post</h1>
    <section class="single-page-event">
        <div class="single-page-event-image">
            <?php the_post_thumbnail() ?>
        </div>
        <h2><?php the_title() ?></h2>
        <div class="single-page-event-content"><?php the_content() ?></div>
        <div class="single-page-event-excerpt"><?php the_excerpt() ?></div>
    </section>

</main>

<?php get_footer() ?>
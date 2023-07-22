<?php
get_header();
?>

<main class="main">
    <img class="main-background" src="<?php echo get_template_directory_uri(); ?>/assets/images/event-page_background.jpg" alt="">
    <section class="events">
        <div class="events-filter">
            <div class="events-filter-option">
                <h4>Year:</h4>
                <?php
                $years = get_taxonomy_terms('year');
                foreach ($years as $year) { ?>
                    <label><input type="checkbox" name="year" value="<?= esc_attr($year->slug) ?>"><?= esc_html($year->name) ?></label><br>
                <?php } ?>
            </div>
            <div class="events-filter-option">
                <h4>Month:</h4>
                <?php
                $months = get_taxonomy_terms('month');
                foreach ($months as $month) { ?>
                    <label><input type="checkbox" name="month" value="<?= esc_attr($month->slug) ?>"><?= esc_html($month->name) ?></label><br>
                <?php } ?>
            </div>
            <div class="events-filter-option">
                <h4>Location:</h4>
                <?php
                $locations = get_taxonomy_terms('location'); ?>
                <select name="location">
                    <option value="">All Locations</option>
                    <?php 
                        foreach ($locations as $location) { ?>
                            <option value="<?= esc_attr($location->slug) ?>"><?= esc_html($location->name) ?></option>;
                    <?php } ?>
                </select>
            </div>
        </div>

        <article class="events-posts">
            <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        ?>
                        <div class="events-item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="events-item-image">
                                    <?php the_post_thumbnail() ?>
                                </div>
                            </a>
                            <h2 class="events-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="events-item-text"><?php the_content(); ?></div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p>Події не знайдено.</p>';
                }
            ?>
        </article>

    </section>

</main>

<?php
get_footer();
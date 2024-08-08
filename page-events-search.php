<?php
/* Template Name: Events Search */

get_header();
?>

<div class="search-bar">
    <?php get_template_part('template-parts/search-form'); ?>
</div>

<div class="content-area">
    <h2>Events List</h2>
    <div class="event-listing">
        <?php
        $args = array(
            'post_type' => 'event',
            'posts_per_page' => -1,
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => '_event_date',
                    'value' => isset($_GET['event_date']) ? sanitize_text_field($_GET['event_date']) : '',
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => '_event_location',
                    'value' => isset($_GET['location']) ? sanitize_text_field($_GET['location']) : '',
                    'compare' => 'LIKE'
                ),
            ),
        );

        $events = new WP_Query($args);

        if ($events->have_posts()) :
            while ($events->have_posts()) : $events->the_post();
                get_template_part('template-parts/event-template');
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No events found.</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>

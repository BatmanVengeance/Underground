<?php
/* Template Name: Front Page */

get_header();
?>

<div class="hero-section">
    <div class="hero-slideshow">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hero.jpg" alt="Hero Image">
        <div class="hero-text">
            <h1>Discover Your Next Adventure</h1>
            <div class="hero-search-form">
                <form method="get" action="<?php echo esc_url(home_url('/events-search/')); ?>">
                    <input type="text" name="s" placeholder="Search for tours, classes, or documentaries">
                    <input type="date" name="event_date">
                    <select name="location">
                        <!-- Populate dynamically -->
                    </select>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="content-area">
    <div class="filters-sidebar">
        <h3>Filters</h3>
        <?php get_template_part('template-parts/filters-sidebar'); ?>
    </div>

    <div class="listings-grid">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
            'meta_query' => array(
                array(
                    'key' => '_featured',
                    'value' => 'yes',
                    'compare' => '='
                )
            ),
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('template-parts/content-product');
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No items found.</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>

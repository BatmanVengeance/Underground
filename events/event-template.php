<div class="event-details">
    <h1><?php the_title(); ?></h1>
    <div class="media-carousel">
        <?php
        if (have_rows('event_images')) :
            while (have_rows('event_images')) : the_row();
                $image = get_sub_field('image');
                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
            endwhile;
        endif;
        ?>
    </div>
    <div class="event-description">
        <?php the_content(); ?>
    </div>
    <div class="booking-section">
        <h3>Book Your Spot</h3>
        <form method="post" action="<?php echo esc_url(wc_get_cart_url()); ?>">
            <input type="date" name="event_date" required>
            <input type="hidden" name="product_id" value="<?php the_ID(); ?>">
            <button type="submit">Book Now</button>
        </form>
    </div>
    <div class="reviews-section">
        <h3>Reviews</h3>
        <?php
        $comments = get_comments(array('post_id' => get_the_ID()));
        foreach ($comments as $comment) :
            echo '<p>' . esc_html($comment->comment_content) . ' - ' . esc_html($comment->comment_author) . '</p>';
        endforeach;
        ?>
    </div>
</div>

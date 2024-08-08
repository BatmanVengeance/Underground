<?php
get_header();
?>

<div class="vendor-store">
   <div class="vendor-profile">
       <h1><?php echo dokan_get_store_info(get_query_var('author'))['store_name']; ?></h1>
       <?php echo get_avatar(get_query_var('author'), 96); ?>
       <p><?php echo dokan_get_store_info(get_query_var('author'))['store_name']; ?></p>
   </div>

   <div class="vendor-products">
       <?php
       $author = get_query_var('author');
       $args = array(
           'post_type' => 'product',
           'posts_per_page' => 12,
           'author' => $author,
           'meta_query' => array(
               array(
                   'key' => '_visibility',
                   'value' => 'visible',
                   'compare' => '=',
               ),
           ),
       );
       $loop = new WP_Query($args);
       while ($loop->have_posts()) : $loop->the_post();
       ?>
           <div class="product-item">
               <a href="<?php the_permalink(); ?>">
                   <?php the_post_thumbnail('medium'); ?>
                   <h3><?php the_title(); ?></h3>
               </a>
           </div>
       <?php endwhile; wp_reset_query(); ?>
   </div>
</div>

<?php
get_footer();

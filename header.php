<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="masthead" class="site-header">
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <div class="site-title">
                <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <p><?php bloginfo('description'); ?></p>
            </div>
        </div>

        <nav id="site-navigation" class="main-navigation">
            <?php wp_nav_menu(array('theme_location' => 'menu-1')); ?>
        </nav>

        <div class="header-search">
            <?php get_search_form(); ?>
        </div>

        <div class="header-cart">
            <?php if (class_exists('WooCommerce')) : ?>
                <a href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_attr_e('View your shopping cart'); ?>">
                    <?php echo WC()->cart->get_cart_total(); ?>
                    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                </a>
            <?php endif; ?>
        </div>
    </header>

    <div id="content" class="site-content">

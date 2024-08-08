    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="site-info">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            <nav class="footer-navigation">
                <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
            </nav>
        </div>
    </footer><!-- #colophon -->

    <?php wp_footer(); ?>
</body>
</html>

</div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="site-info">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                <p>Newport First Presbyterian Church - Serving our community with faith, hope, and love.</p>
                <div class="footer-links">
                    <a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a> |
                    <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a> |
                    <a href="<?php echo esc_url(home_url('/events')); ?>">Events</a> |
                    <a href="<?php echo esc_url(home_url('/sermons')); ?>">Sermons</a>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

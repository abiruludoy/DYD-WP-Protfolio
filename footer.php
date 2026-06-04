<?php
/**
 * Template for displaying the page footer
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
        </main><!-- #main -->
        <footer id="colophon" class="site-footer">
            <?php get_template_part( 'template-parts/footer-content' ); ?>
        </footer><!-- #colophon -->
    </div><!-- #page -->
    <?php wp_footer(); ?>
</body>
</html>

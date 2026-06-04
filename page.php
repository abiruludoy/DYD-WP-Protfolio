<?php
/**
 * Template for displaying all pages
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header();
?>
<div class="gutter-wrapper">
    <div class="page-content">
        <?php
        while ( have_posts() ) {
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header>

                <?php
                if ( has_post_thumbnail() ) {
                    ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'entry-thumbnail' ) ); ?>
                    </div>
                    <?php
                }
                ?>

                <div class="entry-content">
                    <?php
                    the_content();
                    
                    wp_link_pages( array(
                        'before' => '<nav class="page-links">',
                        'after'  => '</nav>',
                    ) );
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        esc_html__( 'Edit this page', 'udoy-portfolio' ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer>
            </article>

            <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
        ?>
    </div>
</div>
<?php
get_footer();

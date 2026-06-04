<?php
/**
 * Main template file
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header();
?>
<div class="gutter-wrapper">
    <div class="archive-wrapper">
        <?php
        if ( have_posts() ) {
            if ( is_home() && ! is_front_page() ) {
                echo '<h1 class="page-title">' . esc_html( single_post_title( '', false ) ) . '</h1>';
            }

            echo '<div class="posts-grid">';
            while ( have_posts() ) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
                    <div class="post-card-inner">
                        <?php
                        if ( has_post_thumbnail() ) {
                            echo '<div class="post-thumbnail-wrapper">';
                            the_post_thumbnail( 'udoy-blog-thumb', array( 'class' => 'post-thumbnail' ) );
                            echo '</div>';
                        }
                        ?>
                        <div class="post-content">
                            <div class="post-meta">
                                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </time>
                                <span class="post-category">
                                    <?php
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        echo esc_html( $categories[0]->name );
                                    }
                                    ?>
                                </span>
                            </div>
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <p class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                Read More →
                            </a>
                        </div>
                    </div>
                </article>
                <?php
            }
            echo '</div>';

            // Pagination
            the_posts_pagination( array(
                'prev_text' => esc_html__( '← Previous', 'udoy-portfolio' ),
                'next_text' => esc_html__( 'Next →', 'udoy-portfolio' ),
                'mid_size'  => 2,
            ) );
        } else {
            echo '<p class="no-posts">' . esc_html__( 'Sorry, no posts found.', 'udoy-portfolio' ) . '</p>';
        }
        ?>
    </div>
</div>
<?php
get_footer();

<?php
/**
 * Template for displaying blog posts page (if separate from front page)
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header();
?>
<div class="gutter-wrapper">
    <div class="blog-header">
        <h1 class="blog-title"><?php esc_html_e( 'Latest Posts', 'udoy-portfolio' ); ?></h1>
        <p class="blog-subtitle"><?php esc_html_e( 'Insights, tips, and thoughts on web development.', 'udoy-portfolio' ); ?></p>
    </div>

    <div class="posts-grid">
        <?php
        if ( have_posts() ) {
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
        } else {
            echo '<p class="no-posts">' . esc_html__( 'Sorry, no posts found.', 'udoy-portfolio' ) . '</p>';
        }
        ?>
    </div>

    <?php
    the_posts_pagination( array(
        'prev_text' => esc_html__( '← Previous', 'udoy-portfolio' ),
        'next_text' => esc_html__( 'Next →', 'udoy-portfolio' ),
        'mid_size'  => 2,
    ) );
    ?>
</div>
<?php
get_footer();

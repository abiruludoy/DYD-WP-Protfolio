<?php
/**
 * Template for displaying a single post
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header();
?>
<div class="gutter-wrapper">
    <div class="single-post-wrapper">
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
            <header class="entry-header">
                <div class="post-meta-single">
                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                        <?php echo esc_html( get_the_date() ); ?>
                    </time>
                    <span class="category-badge">
                        <?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo esc_html( $categories[0]->name );
                        }
                        ?>
                    </span>
                </div>
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <p class="post-excerpt-header"><?php echo esc_html( get_the_excerpt() ); ?></p>
            </header>

            <?php
            if ( has_post_thumbnail() ) {
                ?>
                <div class="featured-image-single">
                    <?php the_post_thumbnail( 'large', array( 'class' => 'entry-thumbnail' ) ); ?>
                </div>
                <?php
            }
            ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <footer class="entry-footer-single">
                <div class="post-tags">
                    <?php
                    $tags = get_the_tags();
                    if ( $tags ) {
                        echo '<span class="tag-label">Tags:</span>';
                        foreach ( $tags as $tag ) {
                            echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="tag-link">';
                            echo esc_html( $tag->name );
                            echo '</a>';
                        }
                    }
                    ?>
                </div>
                <?php
                edit_post_link(
                    esc_html__( 'Edit this post', 'udoy-portfolio' ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer>

            <nav class="post-navigation">
                <div class="nav-links">
                    <div class="nav-previous">
                        <?php
                        previous_post_link(
                            '<span class="nav-subtitle">← %link</span>',
                            '%title',
                            false
                        );
                        ?>
                    </div>
                    <div class="nav-next">
                        <?php
                        next_post_link(
                            '<span class="nav-subtitle">%link →</span>',
                            '%title',
                            false
                        );
                        ?>
                    </div>
                </div>
            </nav>
        </article>

        <?php
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
        ?>
    </div>
</div>
<?php
get_footer();

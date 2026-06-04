<?php
/**
 * Template Tags and Custom Functions
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Get theme color
 */
function udoy_get_theme_color() {
    return get_theme_mod( 'udoy_primary_color', '#2563eb' );
}

/**
 * Output theme color
 */
function udoy_theme_color() {
    echo esc_attr( udoy_get_theme_color() );
}

/**
 * Check if on front page
 */
function udoy_is_front_page() {
    return is_front_page() && ! is_home();
}

/**
 * Get project thumbnail
 */
function udoy_get_project_thumbnail( $post_id = 0 ) {
    $post_id = $post_id > 0 ? $post_id : get_the_ID();
    return get_the_post_thumbnail( $post_id, 'udoy-project-full' );
}

/**
 * Output project thumbnail
 */
function udoy_project_thumbnail( $post_id = 0 ) {
    echo udoy_get_project_thumbnail( $post_id );
}

/**
 * Get section title with highlighting capability
 */
function udoy_format_section_title( $title ) {
    // Look for text within <span class="highlight">
    return preg_replace_callback(
        '/<span class="highlight">(.*?)<\/span>/i',
        function( $matches ) {
            return '<span class="highlight">' . esc_html( $matches[1] ) . '</span>';
        },
        $title
    );
}

/**
 * Get related projects
 */
function udoy_get_related_projects( $project_id = 0, $limit = 3 ) {
    $project_id = $project_id > 0 ? $project_id : get_the_ID();
    
    $terms = get_the_terms( $project_id, 'project-category' );
    
    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => $limit,
        'post__not_in'   => array( $project_id ),
    );

    if ( ! is_wp_error( $terms ) && ! empty( $terms ) && is_array( $terms ) ) {
        $term_ids = wp_list_pluck( $terms, 'term_id' );
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'project-category',
                'field'    => 'term_id',
                'terms'    => $term_ids,
            ),
        );
    }

    $query = new WP_Query( $args );

    return $query;
}

/**
 * Get social links
 */
function udoy_get_social_links() {
    $github = get_theme_mod( 'udoy_github_url', '#' );
    $linkedin = get_theme_mod( 'udoy_linkedin_url', '#' );
    $twitter = get_theme_mod( 'udoy_twitter_url', '#' );

    return array(
        array( 'name' => 'GitHub', 'url' => $github, 'icon' => 'github' ),
        array( 'name' => 'LinkedIn', 'url' => $linkedin, 'icon' => 'linkedin' ),
        array( 'name' => 'Twitter', 'url' => $twitter, 'icon' => 'twitter' ),
    );
}

/**
 * Get excerpt with custom length
 */
function udoy_get_excerpt( $post_id = 0, $length = 20 ) {
    $post_id = $post_id > 0 ? $post_id : get_the_ID();
    $excerpt = get_the_excerpt( $post_id );
    
    if ( empty( $excerpt ) ) {
        $excerpt = wp_trim_words( get_the_content( '', '', $post_id ), $length );
    }

    return $excerpt;
}

/**
 * Output excerpt
 */
function udoy_excerpt( $post_id = 0, $length = 20 ) {
    echo wp_kses_post( udoy_get_excerpt( $post_id, $length ) );
}

/**
 * Check if mobile
 */
function udoy_is_mobile() {
    return wp_is_mobile();
}

/**
 * Get blog archive page ID
 */
function udoy_get_blog_page_id() {
    return get_option( 'page_for_posts' );
}

/**
 * Get blog archive page URL
 */
function udoy_get_blog_url() {
    $page_id = udoy_get_blog_page_id();
    return $page_id ? get_permalink( $page_id ) : home_url( '/blog/' );
}

/**
 * Default menu fallback
 */
function udoy_portfolio_default_menu() {
    $home_url = esc_url( home_url( '/' ) );
    ?>
    <ul class="nav-menu">
        <li><a href="<?php echo is_front_page() ? '#about' : $home_url . '#about'; ?>"><?php esc_html_e( 'About', 'udoy-portfolio' ); ?></a></li>
        <li><a href="<?php echo is_front_page() ? '#skills' : $home_url . '#skills'; ?>"><?php esc_html_e( 'Skills', 'udoy-portfolio' ); ?></a></li>
        <li><a href="<?php echo is_front_page() ? '#projects' : $home_url . '#projects'; ?>"><?php esc_html_e( 'Projects', 'udoy-portfolio' ); ?></a></li>
        <li><a href="<?php echo is_front_page() ? '#contact' : $home_url . '#contact'; ?>"><?php esc_html_e( 'Contact', 'udoy-portfolio' ); ?></a></li>
    </ul>
    <?php
}


<?php
/**
 * Custom Post Types Registration
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Register Project Custom Post Type
 */
function udoy_portfolio_register_project_cpt() {
    $args = array(
        'labels'              => array(
            'name'                  => esc_html__( 'Projects', 'udoy-portfolio' ),
            'singular_name'         => esc_html__( 'Project', 'udoy-portfolio' ),
            'menu_name'             => esc_html__( 'Projects', 'udoy-portfolio' ),
            'all_items'             => esc_html__( 'All Projects', 'udoy-portfolio' ),
            'edit_item'             => esc_html__( 'Edit Project', 'udoy-portfolio' ),
            'new_item'              => esc_html__( 'New Project', 'udoy-portfolio' ),
            'view_item'             => esc_html__( 'View Project', 'udoy-portfolio' ),
            'search_items'          => esc_html__( 'Search Projects', 'udoy-portfolio' ),
            'not_found'             => esc_html__( 'No projects found', 'udoy-portfolio' ),
            'not_found_in_trash'    => esc_html__( 'No projects found in trash', 'udoy-portfolio' ),
        ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'menu_icon'           => 'dashicons-format-gallery',
        'supports'            => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'custom-fields',
        ),
        'rewrite'             => array(
            'slug'       => 'portfolio',
            'with_front' => false,
        ),
        'has_archive'         => true,
        'taxonomies'          => array( 'project-category' ),
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'udoy_portfolio_register_project_cpt' );

/**
 * Register Project Category Taxonomy
 */
function udoy_portfolio_register_project_taxonomy() {
    $args = array(
        'labels'            => array(
            'name'                  => esc_html__( 'Project Categories', 'udoy-portfolio' ),
            'singular_name'         => esc_html__( 'Project Category', 'udoy-portfolio' ),
            'menu_name'             => esc_html__( 'Categories', 'udoy-portfolio' ),
            'all_items'             => esc_html__( 'All Categories', 'udoy-portfolio' ),
            'edit_item'             => esc_html__( 'Edit Category', 'udoy-portfolio' ),
            'new_item_name'         => esc_html__( 'New Category', 'udoy-portfolio' ),
            'search_items'          => esc_html__( 'Search Categories', 'udoy-portfolio' ),
            'not_found'             => esc_html__( 'No categories found', 'udoy-portfolio' ),
        ),
        'public'            => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'project-category' ),
    );

    register_taxonomy( 'project-category', 'project', $args );
}
add_action( 'init', 'udoy_portfolio_register_project_taxonomy' );

/**
 * Add project category meta box
 */
function udoy_portfolio_add_project_meta_boxes() {
    add_meta_box(
        'project-meta',
        esc_html__( 'Project Details', 'udoy-portfolio' ),
        'udoy_portfolio_project_meta_callback',
        'project',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'udoy_portfolio_add_project_meta_boxes' );

/**
 * Project meta box callback
 */
function udoy_portfolio_project_meta_callback( $post ) {
    wp_nonce_field( 'udoy_project_nonce', 'udoy_project_nonce' );

    $category = get_post_meta( $post->ID, '_project_category', true );
    $tags = get_post_meta( $post->ID, '_project_tags', true );
    ?>
    <div class="meta-box-content">
        <p>
            <label for="project-category">
                <strong><?php esc_html_e( 'Category/Type:', 'udoy-portfolio' ); ?></strong>
            </label><br>
            <input 
                type="text" 
                id="project-category" 
                name="project-category" 
                value="<?php echo esc_attr( $category ); ?>" 
                placeholder="<?php esc_attr_e( 'e.g., WORDPRESS / WOOCOMMERCE', 'udoy-portfolio' ); ?>" 
                style="width: 100%; padding: 8px;"
            >
        </p>
        <p>
            <label for="project-tags">
                <strong><?php esc_html_e( 'Tags (comma-separated):', 'udoy-portfolio' ); ?></strong>
            </label><br>
            <input 
                type="text" 
                id="project-tags" 
                name="project-tags" 
                value="<?php echo esc_attr( is_array( $tags ) ? implode( ', ', $tags ) : $tags ); ?>" 
                placeholder="<?php esc_attr_e( 'e.g., WordPress, Elementor, WooCommerce', 'udoy-portfolio' ); ?>" 
                style="width: 100%; padding: 8px;"
            >
        </p>
    </div>
    <?php
}

/**
 * Save project meta
 */
function udoy_portfolio_save_project_meta( $post_id ) {
    if ( ! isset( $_POST['udoy_project_nonce'] ) || 
         ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['udoy_project_nonce'] ) ), 'udoy_project_nonce' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['project-category'] ) ) {
        update_post_meta( $post_id, '_project_category', sanitize_text_field( wp_unslash( $_POST['project-category'] ) ) );
    }

    if ( isset( $_POST['project-tags'] ) ) {
        $tags = array_map( 'trim', explode( ',', sanitize_text_field( wp_unslash( $_POST['project-tags'] ) ) ) );
        update_post_meta( $post_id, '_project_tags', $tags );
    }
}
add_action( 'save_post', 'udoy_portfolio_save_project_meta' );

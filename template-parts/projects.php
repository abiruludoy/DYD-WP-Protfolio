<?php
/**
 * Template part for displaying the projects section
 * Reads from Customizer settings (up to 6 projects).
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Section header from Customizer
$section_label    = get_theme_mod( 'udoy_projects_label', 'SELECTED WORK' );
$section_title    = get_theme_mod( 'udoy_projects_title', "Projects I've built" );
$section_subtitle = get_theme_mod( 'udoy_projects_subtitle', 'A curated selection of work — from concept to shipped product.' );
$view_all_text    = get_theme_mod( 'udoy_projects_view_all_text', 'View All Projects' );
$view_all_url     = get_theme_mod( 'udoy_projects_view_all_url', '' );

// Collect projects from Customizer slots
$default_project_data = array(
    1 => array(
        'title'       => 'E-Commerce Platform',
        'category'    => 'Web App',
        'description' => 'A full-stack e-commerce solution with real-time inventory, payment gateway integration, and an intuitive admin dashboard.',
        'tags'        => 'WordPress, Elementor, WooCommerce',
    ),
    2 => array(
        'title'       => 'AI Analytics Dashboard',
        'category'    => 'Data Visualization',
        'description' => 'Interactive analytics platform powered by AI that turns complex data into actionable business insights.',
        'tags'        => 'React, D3.js, Python',
    ),
    3 => array(
        'title'       => 'Mobile Banking App',
        'category'    => 'Mobile',
        'description' => 'Secure mobile banking with biometric login, instant transfers, and smart spending insights.',
        'tags'        => 'Flutter, Firebase, Dart',
    ),
    4 => array(
        'title'       => '',
        'category'    => '',
        'description' => '',
        'tags'        => '',
    ),
    5 => array(
        'title'       => '',
        'category'    => '',
        'description' => '',
        'tags'        => '',
    ),
    6 => array(
        'title'       => '',
        'category'    => '',
        'description' => '',
        'tags'        => '',
    ),
);

$projects = array();
for ( $i = 1; $i <= 6; $i++ ) {
    $default_data = $default_project_data[ $i ];
    $title = get_theme_mod( "udoy_project_{$i}_title", $default_data['title'] );
    if ( empty( $title ) ) {
        continue;
    }
    $image_id  = get_theme_mod( "udoy_project_{$i}_image", 0 );
    $image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'large' ) : '';

    $projects[] = array(
        'title'       => $title,
        'category'    => get_theme_mod( "udoy_project_{$i}_category", $default_data['category'] ),
        'description' => get_theme_mod( "udoy_project_{$i}_description", $default_data['description'] ),
        'tags'        => get_theme_mod( "udoy_project_{$i}_tags", $default_data['tags'] ),
        'url'         => get_theme_mod( "udoy_project_{$i}_url", '#' ),
        'image'       => $image_url,
    );
}
?>

<section class="projects-section" id="projects">
    <div class="projects-container">

        <!-- Section Header -->
        <div class="section-header animate-on-scroll">
            <?php if ( $section_label ) : ?>
                <span class="section-label"><?php echo esc_html( $section_label ); ?></span>
            <?php endif; ?>
            <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
            <?php if ( $section_subtitle ) : ?>
                <p class="section-subtitle"><?php echo esc_html( $section_subtitle ); ?></p>
            <?php endif; ?>
        </div>

        <!-- Projects Grid -->
        <div class="projects-grid">
            <?php if ( ! empty( $projects ) ) :
                foreach ( $projects as $index => $project ) :
                    $num    = str_pad( $index + 1, 2, '0', STR_PAD_LEFT );
                    $url    = ! empty( $project['url'] ) ? esc_url( $project['url'] ) : '#';
                    $tags   = array_filter( array_map( 'trim', explode( ',', $project['tags'] ) ) );
                    $demo_colors = array( '#2563eb', '#059669', '#d97706', '#db2777', '#7c3aed', '#0891b2' );
                    $demo_color  = $demo_colors[ $index % count( $demo_colors ) ];
                    ?>
                    <article class="project-card animate-on-scroll">

                        <!-- Visual -->
                        <div class="project-visual">
                            <?php if ( ! empty( $project['image'] ) ) : ?>
                                <a href="<?php echo $url; ?>" class="project-image-link">
                                    <img src="<?php echo esc_url( $project['image'] ); ?>"
                                         alt="<?php echo esc_attr( $project['title'] ); ?>"
                                         class="project-image" loading="lazy" />
                                </a>
                            <?php else : ?>
                                <div class="project-image-placeholder project-visual-placeholder" style="<?php echo esc_attr( '--demo-color: ' . $demo_color . ';' ); ?>">
                                    <div class="project-demo-visual" aria-hidden="true">
                                        <div class="pdv-bg"></div>
                                        <span class="pvp-num"><?php echo esc_html( $num ); ?></span>
                                        <div class="pdv-window">
                                            <div class="pdv-window-top">
                                                <span></span><span></span><span></span>
                                            </div>
                                            <div class="pdv-window-body">
                                                <span class="pdv-line" style="--w: 78%;"></span>
                                                <span class="pdv-line" style="--w: 54%;"></span>
                                                <div class="pdv-mini-grid">
                                                    <span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <a href="<?php echo $url; ?>" class="project-image-action" aria-label="<?php echo esc_attr( sprintf( esc_html__( 'View project: %s', 'udoy-portfolio' ), $project['title'] ) ); ?>">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M13.5 4.5h6v6" />
                                    <path d="M10.5 13.5L19.5 4.5" />
                                    <path d="M19.5 19.5h-15v-15" />
                                </svg>
                            </a>
                        </div>

                        <!-- Content -->
                        <div class="project-card-body project-card-content">
                            <?php if ( ! empty( $project['category'] ) ) : ?>
                                <span class="project-category"><?php echo esc_html( strtoupper( $project['category'] ) ); ?></span>
                            <?php endif; ?>

                            <h3 class="project-title">
                                <a href="<?php echo $url; ?>"><?php echo esc_html( $project['title'] ); ?></a>
                            </h3>

                            <?php if ( ! empty( $project['description'] ) ) : ?>
                                <p class="project-description"><?php echo esc_html( $project['description'] ); ?></p>
                            <?php endif; ?>

                            <?php if ( ! empty( $tags ) ) : ?>
                                <div class="project-tags">
                                    <?php foreach ( $tags as $tag ) : ?>
                                        <span class="tag"><?php echo esc_html( $tag ); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </article>
                <?php endforeach;
            else : ?>
                <div class="no-projects">
                    <p><?php esc_html_e( 'No projects added yet. Go to Appearance → Customize → Projects Section to add projects.', 'udoy-portfolio' ); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <!-- View All CTA -->
        <?php if ( ! empty( $view_all_url ) ) : ?>
            <div class="projects-cta animate-on-scroll">
                <a href="<?php echo esc_url( $view_all_url ); ?>" class="projects-cta-btn">
                    <?php echo esc_html( $view_all_text ); ?>
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>

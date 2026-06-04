<?php
/**
 * Template part for displaying the footer
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<?php
// Get customizer settings or fallbacks
$footer_logo_text = get_theme_mod( 'udoy_footer_logo_text', '' );
$footer_logo_text = ! empty( $footer_logo_text ) ? $footer_logo_text : get_bloginfo( 'name' );

$footer_description_setting = get_theme_mod( 'udoy_footer_description', '' );
$footer_description = ! empty( $footer_description_setting ) ? $footer_description_setting : get_bloginfo( 'description' );
$footer_description = ! empty( $footer_description ) ? $footer_description : esc_html__( 'Designing modern, responsive portfolio experiences for the web.', 'udoy-portfolio' );

$show_button = get_theme_mod( 'udoy_footer_show_button', false ); // Default to false to match screenshot
$footer_button_text = get_theme_mod( 'udoy_footer_button_text', 'Let’s build together' );
$footer_button_url  = get_theme_mod( 'udoy_footer_button_url', '#contact' );
$contact_link       = is_front_page() && strpos($footer_button_url, '#') === 0 ? $footer_button_url : esc_url( home_url( '/' . ltrim($footer_button_url, '/') ) );

$explore_title = get_theme_mod( 'udoy_footer_explore_title', 'QUICK LINKS' );

// Fallback menu link texts
$about_label = get_theme_mod( 'udoy_footer_about_label', 'About' );
$skills_label = get_theme_mod( 'udoy_footer_skills_label', 'Skills' );
$projects_label = get_theme_mod( 'udoy_footer_projects_label', 'Projects' );
$contact_label = get_theme_mod( 'udoy_footer_contact_label', 'Contact' );

// Services Section
$services_title = get_theme_mod( 'udoy_footer_services_title', 'SERVICES' );
$default_services = array(
    1 => array( 'label' => 'WordPress Development', 'url' => '#' ),
    2 => array( 'label' => 'Elementor Design', 'url' => '#' ),
    3 => array( 'label' => 'Next.js Frontend', 'url' => '#' ),
    4 => array( 'label' => 'UI/UX Design', 'url' => '#' ),
    5 => array( 'label' => 'SEO Optimization', 'url' => '#' ),
);

$show_social = get_theme_mod( 'udoy_footer_show_social', true );
$social_links = udoy_get_social_links();
$has_social_links = false;
foreach ( $social_links as $link ) {
    if ( ! empty( $link['url'] ) ) {
        $has_social_links = true;
        break;
    }
}

$copyright_text = get_theme_mod( 'udoy_footer_copyright_text', 'All rights reserved.' );
?>
<div class="footer-content">
    <div class="footer-wrapper footer-grid">
        <!-- Column 1: Brand & Socials -->
        <div class="footer-card footer-brand">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
                <span class="footer-logo-text"><?php echo esc_html( $footer_logo_text ); ?></span>
                <span class="footer-logo-dot">.</span>
            </a>
            <p class="footer-description"><?php echo esc_html( $footer_description ); ?></p>
            
            <?php if ( $show_social && $has_social_links ) : ?>
                <div class="social-links">
                    <?php
                    foreach ( $social_links as $link ) {
                        if ( empty( $link['url'] ) ) {
                            continue;
                        }
                        ?>
                        <a
                            href="<?php echo esc_url( $link['url'] ); ?>"
                            aria-label="<?php echo esc_attr( $link['name'] ); ?>"
                            class="social-link"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <?php
                            if ( isset( $link['icon'] ) && $link['icon'] === 'github' ) {
                                ?>
                                <svg class="social-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v 3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                </svg>
                                <?php
                            } elseif ( isset( $link['icon'] ) && $link['icon'] === 'linkedin' ) {
                                ?>
                                <svg class="social-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z" />
                                </svg>
                                <?php
                            } elseif ( isset( $link['icon'] ) && $link['icon'] === 'twitter' ) {
                                ?>
                                <svg class="social-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417a9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a14.995 14.995 0 008.134 2.34c9.76 0 15.114-8.09 15.114-15.114 0-.23-.005-.46-.015-.69A10.738 10.738 0 0024 4.59z" />
                                </svg>
                                <?php
                            }
                            ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            <?php endif; ?>

            <?php if ( $show_button && ! empty( $footer_button_text ) ) : ?>
                <a href="<?php echo esc_url( $contact_link ); ?>" class="btn btn-primary footer-button">
                    <?php echo esc_html( $footer_button_text ); ?>
                </a>
            <?php endif; ?>
        </div>

        <!-- Column 2: Quick Links -->
        <div class="footer-card footer-links">
            <h2 class="footer-title"><?php echo esc_html( $explore_title ); ?></h2>
            <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer menu', 'udoy-portfolio' ); ?>">
                <?php
                if ( has_nav_menu( 'footer' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'fallback_cb'    => 'udoy_portfolio_default_menu',
                        'depth'          => 1,
                    ) );
                } else {
                    $home_url = esc_url( home_url( '/' ) );
                    ?>
                    <ul class="footer-menu">
                        <li><a href="<?php echo is_front_page() ? '#about' : $home_url . '#about'; ?>"><?php echo esc_html( $about_label ); ?></a></li>
                        <li><a href="<?php echo is_front_page() ? '#skills' : $home_url . '#skills'; ?>"><?php echo esc_html( $skills_label ); ?></a></li>
                        <li><a href="<?php echo is_front_page() ? '#projects' : $home_url . '#projects'; ?>"><?php echo esc_html( $projects_label ); ?></a></li>
                        <li><a href="<?php echo is_front_page() ? '#contact' : $home_url . '#contact'; ?>"><?php echo esc_html( $contact_label ); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </nav>
        </div>

        <!-- Column 3: Services -->
        <div class="footer-card footer-services">
            <h2 class="footer-title"><?php echo esc_html( $services_title ); ?></h2>
            <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer services menu', 'udoy-portfolio' ); ?>">
                <?php
                if ( has_nav_menu( 'footer_services' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer_services',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ) );
                } else {
                    ?>
                    <ul class="footer-menu">
                        <?php for ( $i = 1; $i <= 5; $i++ ) : 
                            $label = get_theme_mod( "udoy_footer_service_{$i}_label", $default_services[$i]['label'] );
                            $url   = get_theme_mod( "udoy_footer_service_{$i}_url", $default_services[$i]['url'] );
                            if ( ! empty( $label ) ) :
                                ?>
                                <li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a></li>
                                <?php
                            endif;
                        endfor; ?>
                    </ul>
                    <?php
                }
                ?>
            </nav>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p class="footer-copyright">
            &copy; <?php echo esc_html( date( 'Y' ) ); ?> <span class="site-name"><?php echo esc_html( $footer_logo_text ); ?></span>. <?php echo esc_html( $copyright_text ); ?>
        </p>
        <a href="#page" class="back-to-top" aria-label="<?php esc_attr_e( 'Back to top', 'udoy-portfolio' ); ?>">
            <?php esc_html_e( 'Back to top', 'udoy-portfolio' ); ?> <span aria-hidden="true">&uarr;</span>
        </a>
    </div>
</div>

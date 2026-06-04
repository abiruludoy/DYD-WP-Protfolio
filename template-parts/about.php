<?php
/**
 * Template part for displaying the about section
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<section class="about-section" id="about">
    <div class="about-container">
        <!-- Left Content -->
        <div class="about-text animate-on-scroll">
            <span class="section-label">
                <?php esc_html_e( 'ABOUT ME', 'udoy-portfolio' ); ?>
            </span>
            <h2 class="section-title">
                <?php echo wp_kses_post( get_theme_mod( 'udoy_about_title', 'Passionate about building<br><span class="highlight">exceptional websites</span>' ) ); ?>
            </h2>

            <div class="about-description">
                <?php
                $about_content = get_theme_mod( 'udoy_about_content', 'I\'m Abirul Islam Udoy — a professional web developer specializing in WordPress, Elementor, and Next.js frontend development.' );
                echo wp_kses_post( $about_content );
                ?>
            </div>
        </div>

        <!-- Right Content - Feature Cards -->
        <div class="features-grid">
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-14m4 14l4-14m-8-3h.01" />
                    </svg>
                </div>
                <div class="feature-content">
                    <h3 class="feature-title"><?php esc_html_e( 'Clean Code', 'udoy-portfolio' ); ?></h3>
                    <p class="feature-description">
                        <?php esc_html_e( 'Writing maintainable, scalable code with modern best practices.', 'udoy-portfolio' ); ?>
                    </p>
                </div>
            </div>

            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>
                <div class="feature-content">
                    <h3 class="feature-title"><?php esc_html_e( 'Pixel Perfect', 'udoy-portfolio' ); ?></h3>
                    <p class="feature-description">
                        <?php esc_html_e( 'Meticulous attention to design details and visual consistency.', 'udoy-portfolio' ); ?>
                    </p>
                </div>
            </div>

            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div class="feature-content">
                    <h3 class="feature-title"><?php esc_html_e( 'Performance', 'udoy-portfolio' ); ?></h3>
                    <p class="feature-description">
                        <?php esc_html_e( 'Optimized for speed, SEO and exceptional user experience.', 'udoy-portfolio' ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

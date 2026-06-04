<?php
/**
 * Template part for displaying the hero section
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<section class="hero-section" id="hero">
    <div class="hero-container">
        <div class="hero-content">
            <!-- Label -->
            <div class="hero-label">
                <span class="badge">
                    <span class="badge-dot"></span>
                    <?php echo esc_html( get_theme_mod( 'udoy_hero_badge', 'WEB DEVELOPER & DESIGNER' ) ); ?>
                </span>
            </div>

            <!-- Main Heading -->
            <h1 class="hero-title">
                <?php
                $first_name = get_theme_mod( 'udoy_hero_first_name', 'Abirul' );
                $middle_name = get_theme_mod( 'udoy_hero_middle_name', 'Islam' );
                $last_name = get_theme_mod( 'udoy_hero_last_name', 'Udoy' );
                
                echo 'Hi, I\'m<br>';
                echo '<span class="highlight">' . esc_html( $first_name . ' ' . $middle_name ) . '</span><br>';
                echo '<span class="dark-text">' . esc_html( $last_name ) . '</span>';
                ?>
            </h1>

            <!-- Description -->
            <p class="hero-description">
                <?php 
                $desc = get_theme_mod( 'udoy_hero_description', 'I craft beautiful, performant websites using WordPress, Elementor & Next.js. Turning ideas into pixel-perfect digital experiences.' );
                if ( $desc === 'I craft beautiful, performant websites using WordPress, Elementor & Next.js. Turning ideas into pixel-perfect digital experiences.' ) {
                    echo 'I craft beautiful, performant websites using <strong class="typewriter-text" data-words=\'["WordPress", "Elementor", "Next.js"]\'>WordPress</strong>. Turning ideas into pixel-perfect digital experiences.';
                } else {
                    echo wp_kses_post( $desc );
                }
                ?>
            </p>

            <!-- CTA Buttons -->
            <div class="hero-buttons">
                <a href="#projects" class="btn btn-primary">
                    <?php esc_html_e( 'View My Work', 'udoy-portfolio' ); ?>
                    <span class="btn-arrow">→</span>
                </a>
                <a href="#about" class="btn btn-secondary">
                    <?php esc_html_e( 'About Me', 'udoy-portfolio' ); ?>
                </a>
            </div>

            <!-- Stats -->
            <div class="hero-stats">
                <div class="stat-item">
                    <p class="stat-number">
                        <?php echo esc_html( get_theme_mod( 'udoy_hero_projects_count', '50+' ) ); ?>
                    </p>
                    <p class="stat-label"><?php esc_html_e( 'Projects', 'udoy-portfolio' ); ?></p>
                </div>
                <div class="stat-item">
                    <p class="stat-number">
                        <?php echo esc_html( get_theme_mod( 'udoy_hero_experience', '3+' ) ); ?>
                    </p>
                    <p class="stat-label"><?php esc_html_e( 'Years Exp.', 'udoy-portfolio' ); ?></p>
                </div>
                <div class="stat-item">
                    <p class="stat-number">
                        <?php echo esc_html( get_theme_mod( 'udoy_hero_clients', '30+' ) ); ?>
                    </p>
                    <p class="stat-label"><?php esc_html_e( 'Happy Clients', 'udoy-portfolio' ); ?></p>
                </div>
            </div>
        </div>

        <!-- Right Content - Avatar Image -->
        <div class="hero-image">
            <div class="profile-image-wrapper">
                <?php
                $profile_image_id = get_theme_mod( 'udoy_profile_image' );
                if ( $profile_image_id ) {
                    echo wp_get_attachment_image( $profile_image_id, 'large', false, array(
                        'class' => 'profile-image',
                        'alt'   => esc_attr( get_bloginfo( 'name' ) ),
                    ) );
                } else {
                    $profile_initials = strtoupper( substr( $first_name, 0, 1 ) . substr( $last_name, 0, 1 ) );
                    $profile_initials = $profile_initials ? $profile_initials : 'UD';
                    ?>
                    <div class="profile-image-placeholder" role="img" aria-label="<?php esc_attr_e( 'Portfolio portrait placeholder', 'udoy-portfolio' ); ?>">
                        <div class="profile-art" aria-hidden="true">
                            <div class="profile-art-frame">
                                <span class="profile-art-initials"><?php echo esc_html( $profile_initials ); ?></span>
                                <span class="profile-art-ring"></span>
                            </div>
                            <div class="profile-art-card profile-art-card--top">
                                <span></span><span></span><span></span>
                            </div>
                            <div class="profile-art-card profile-art-card--bottom">
                                <span></span><span></span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

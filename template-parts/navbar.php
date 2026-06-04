<?php
/**
 * Template part for displaying the navbar
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<nav class="navbar-wrapper" id="navbar">
    <div class="navbar-container">
        <div class="navbar-content">
            <!-- Logo/Brand -->
            <div class="navbar-brand">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
                        <span class="logo-udoy">Udoy<span class="logo-dot">.</span></span>
                    </a>
                    <?php
                }
                ?>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="menu-toggle" id="menu-toggle" aria-label="<?php esc_attr_e( 'Toggle menu', 'udoy-portfolio' ); ?>" aria-expanded="false">
                <span class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <!-- Desktop Navigation -->
            <div class="nav-menu-wrapper">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'udoy_portfolio_default_menu',
                    'depth'          => 2,
                ) );
                ?>
            </div>

            <!-- CTA Button -->
            <div class="navbar-cta">
                <button class="btn-talk" id="btn-talk">
                    <?php esc_html_e( "Let's Talk", 'udoy-portfolio' ); ?>
                </button>
            </div>
        </div>
    </div>
</nav>


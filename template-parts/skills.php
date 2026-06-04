<?php
/**
 * Template part for displaying the skills section
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Fetch values from Customizer with default fallbacks
$skills_label = get_theme_mod( 'udoy_skills_label', 'SKILLS & EXPERTISE' );
$skills_title = get_theme_mod( 'udoy_skills_title', 'Technologies I work with' );

// Helper function to split comma-separated skills into array
if ( ! function_exists( 'udoy_parse_skills' ) ) {
    function udoy_parse_skills( $skills_string ) {
        if ( empty( $skills_string ) ) {
            return array();
        }
        return array_filter( array_map( 'trim', explode( ',', $skills_string ) ) );
    }
}
?>

<section class="skills-section" id="skills">
    <div class="skills-container">
        <!-- Header -->
        <div class="section-header animate-on-scroll">
            <span class="section-label">
                <?php echo esc_html( $skills_label ); ?>
            </span>
            <h2 class="section-title">
                <?php echo esc_html( $skills_title ); ?>
            </h2>
        </div>

        <!-- Skills Grid -->
        <div class="skills-grid">
            <?php
            for ( $i = 1; $i <= 6; $i++ ) {
                $default_title = '';
                $default_list  = '';
                if ( $i === 1 ) {
                    $default_title = 'Frontend';
                    $default_list  = 'React.js, Next.js, TypeScript, Tailwind CSS, HTML5/CSS3, JavaScript';
                } elseif ( $i === 2 ) {
                    $default_title = 'WordPress';
                    $default_list  = 'Elementor Pro, Custom Themes, WooCommerce, ACF, Plugin Development, PHP';
                } elseif ( $i === 3 ) {
                    $default_title = 'Tools & More';
                    $default_list  = 'Git & GitHub, Figma, REST APIs, SEO, Responsive Design, Performance';
                }

                $cat_title = get_theme_mod( "udoy_skills_cat{$i}_title", $default_title );
                $cat_list  = get_theme_mod( "udoy_skills_cat{$i}_list", $default_list );

                if ( ! empty( $cat_title ) ) :
                    ?>
                    <div class="skill-category animate-on-scroll">
                        <h3 class="skill-category-title"><?php echo esc_html( $cat_title ); ?></h3>
                        <div class="skill-tags">
                            <?php
                            $skills = udoy_parse_skills( $cat_list );
                            foreach ( $skills as $skill ) {
                                echo '<span class="skill-tag">' . esc_html( $skill ) . '</span>';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                endif;
            }
            ?>
        </div>
    </div>
</section>

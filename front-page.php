<?php
/**
 * Template for displaying the front page
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header();

// Display front page sections
get_template_part( 'template-parts/hero' );
get_template_part( 'template-parts/about' );
get_template_part( 'template-parts/skills' );
get_template_part( 'template-parts/projects' );
get_template_part( 'template-parts/contact' );

get_footer();

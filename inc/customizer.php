<?php
/**
 * Theme Customizer Settings
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Customize register
 */
function udoy_portfolio_customize_register( $wp_customize ) {
    
    // Add custom sections
    $wp_customize->add_section(
        'udoy_hero_section',
        array(
            'title'    => esc_html__( 'Hero Section', 'udoy-portfolio' ),
            'priority' => 30,
        )
    );

    $wp_customize->add_section(
        'udoy_about_section',
        array(
            'title'    => esc_html__( 'About Section', 'udoy-portfolio' ),
            'priority' => 40,
        )
    );

    $wp_customize->add_section(
        'udoy_skills_section',
        array(
            'title'    => esc_html__( 'Skills Section', 'udoy-portfolio' ),
            'priority' => 45,
        )
    );

    $wp_customize->add_section(
        'udoy_projects_section',
        array(
            'title'    => esc_html__( 'Projects Section', 'udoy-portfolio' ),
            'priority' => 47,
        )
    );

    $wp_customize->add_section(
        'udoy_contact_section',
        array(
            'title'    => esc_html__( 'Contact Section', 'udoy-portfolio' ),
            'priority' => 50,
        )
    );

    $wp_customize->add_section(
        'udoy_social_section',
        array(
            'title'    => esc_html__( 'Social Links', 'udoy-portfolio' ),
            'priority' => 60,
        )
    );

    // Hero Section Settings
    $wp_customize->add_setting(
        'udoy_hero_badge',
        array(
            'default'           => 'WEB DEVELOPER & DESIGNER',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_hero_badge',
        array(
            'label'       => esc_html__( 'Hero Badge Text', 'udoy-portfolio' ),
            'section'     => 'udoy_hero_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_hero_first_name',
        array(
            'default'           => 'Frist Name',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_hero_first_name',
        array(
            'label'       => esc_html__( 'First Name', 'udoy-portfolio' ),
            'section'     => 'udoy_hero_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_hero_middle_name',
        array(
            'default'           => 'Middle Name',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_hero_middle_name',
        array(
            'label'       => esc_html__( 'Middle Name', 'udoy-portfolio' ),
            'section'     => 'udoy_hero_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_hero_last_name',
        array(
            'default'           => 'Last Name',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_hero_last_name',
        array(
            'label'       => esc_html__( 'Last Name', 'udoy-portfolio' ),
            'section'     => 'udoy_hero_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_hero_description',
        array(
            'default'           => 'I craft beautiful, performant websites using WordPress, Elementor & Next.js.',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_hero_description',
        array(
            'label'       => esc_html__( 'Hero Description', 'udoy-portfolio' ),
            'section'     => 'udoy_hero_section',
            'type'        => 'textarea',
        )
    );

    $wp_customize->add_setting(
        'udoy_hero_projects_count',
        array(
            'default'           => '50+',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_hero_projects_count',
        array(
            'label'       => esc_html__( 'Projects Count', 'udoy-portfolio' ),
            'section'     => 'udoy_hero_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_hero_experience',
        array(
            'default'           => '3+',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_hero_experience',
        array(
            'label'       => esc_html__( 'Years of Experience', 'udoy-portfolio' ),
            'section'     => 'udoy_hero_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_hero_clients',
        array(
            'default'           => '30+',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_hero_clients',
        array(
            'label'       => esc_html__( 'Happy Clients', 'udoy-portfolio' ),
            'section'     => 'udoy_hero_section',
            'type'        => 'text',
        )
    );

    // Profile Image
    $wp_customize->add_setting(
        'udoy_profile_image',
        array(
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'udoy_profile_image',
            array(
                'label'       => esc_html__( 'Profile Image', 'udoy-portfolio' ),
                'section'     => 'udoy_hero_section',
                'mime_type'   => 'image',
            )
        )
    );

    // About Section Settings
    $wp_customize->add_setting(
        'udoy_about_title',
        array(
            'default'           => 'Passionate about building exceptional websites',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_about_title',
        array(
            'label'       => esc_html__( 'About Title', 'udoy-portfolio' ),
            'section'     => 'udoy_about_section',
            'type'        => 'textarea',
        )
    );

    $wp_customize->add_setting(
        'udoy_about_content',
        array(
            'default'           => 'I\'m a professional web developer specializing in WordPress and Next.js.',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );
    $wp_customize->add_control(
        'udoy_about_content',
        array(
            'label'       => esc_html__( 'About Content', 'udoy-portfolio' ),
            'section'     => 'udoy_about_section',
            'type'        => 'textarea',
        )
    );

    // Skills Section Settings
    $wp_customize->add_setting(
        'udoy_skills_label',
        array(
            'default'           => 'SKILLS & EXPERTISE',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_label',
        array(
            'label'       => esc_html__( 'Skills Section Label', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_skills_title',
        array(
            'default'           => 'Technologies I work with',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_title',
        array(
            'label'       => esc_html__( 'Skills Section Title', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'text',
        )
    );

    // Category 1: Frontend
    $wp_customize->add_setting(
        'udoy_skills_cat1_title',
        array(
            'default'           => 'Frontend',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat1_title',
        array(
            'label'       => esc_html__( 'Category 1 Title', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_skills_cat1_list',
        array(
            'default'           => 'React.js, Next.js, TypeScript, Tailwind CSS, HTML5/CSS3, JavaScript',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat1_list',
        array(
            'label'       => esc_html__( 'Category 1 Skills (comma-separated)', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'textarea',
        )
    );

    // Category 2: WordPress
    $wp_customize->add_setting(
        'udoy_skills_cat2_title',
        array(
            'default'           => 'WordPress',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat2_title',
        array(
            'label'       => esc_html__( 'Category 2 Title', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_skills_cat2_list',
        array(
            'default'           => 'Elementor Pro, Custom Themes, WooCommerce, ACF, Plugin Development, PHP',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat2_list',
        array(
            'label'       => esc_html__( 'Category 2 Skills (comma-separated)', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'textarea',
        )
    );

    // Category 3: Tools & More
    $wp_customize->add_setting(
        'udoy_skills_cat3_title',
        array(
            'default'           => 'Tools & More',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat3_title',
        array(
            'label'       => esc_html__( 'Category 3 Title', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_skills_cat3_list',
        array(
            'default'           => 'Git & GitHub, Figma, REST APIs, SEO, Responsive Design, Performance',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat3_list',
        array(
            'label'       => esc_html__( 'Category 3 Skills (comma-separated)', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'textarea',
        )
    );

    // Category 4: Add new category
    $wp_customize->add_setting(
        'udoy_skills_cat4_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat4_title',
        array(
            'label'       => esc_html__( 'Category 4 Title (Optional)', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_skills_cat4_list',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat4_list',
        array(
            'label'       => esc_html__( 'Category 4 Skills (comma-separated)', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'textarea',
        )
    );

    // Category 5: Add new category
    $wp_customize->add_setting(
        'udoy_skills_cat5_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat5_title',
        array(
            'label'       => esc_html__( 'Category 5 Title (Optional)', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_skills_cat5_list',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat5_list',
        array(
            'label'       => esc_html__( 'Category 5 Skills (comma-separated)', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'textarea',
        )
    );

    // Category 6: Add new category
    $wp_customize->add_setting(
        'udoy_skills_cat6_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat6_title',
        array(
            'label'       => esc_html__( 'Category 6 Title (Optional)', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_skills_cat6_list',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_skills_cat6_list',
        array(
            'label'       => esc_html__( 'Category 6 Skills (comma-separated)', 'udoy-portfolio' ),
            'section'     => 'udoy_skills_section',
            'type'        => 'textarea',
        )
    );

    // =========================================================
    // Projects Section Settings
    // =========================================================
    $wp_customize->add_setting( 'udoy_projects_label', array(
        'default'           => 'SELECTED WORK',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'udoy_projects_label', array(
        'label'   => esc_html__( 'Projects Section Label', 'udoy-portfolio' ),
        'section' => 'udoy_projects_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'udoy_projects_title', array(
        'default'           => 'Projects I\'ve built',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'udoy_projects_title', array(
        'label'   => esc_html__( 'Projects Section Title', 'udoy-portfolio' ),
        'section' => 'udoy_projects_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'udoy_projects_subtitle', array(
        'default'           => 'A curated selection of work — from concept to shipped product.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'udoy_projects_subtitle', array(
        'label'   => esc_html__( 'Projects Section Subtitle', 'udoy-portfolio' ),
        'section' => 'udoy_projects_section',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'udoy_projects_view_all_text', array(
        'default'           => 'View All Projects',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'udoy_projects_view_all_text', array(
        'label'   => esc_html__( '"View All" Button Text', 'udoy-portfolio' ),
        'section' => 'udoy_projects_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'udoy_projects_view_all_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'udoy_projects_view_all_url', array(
        'label'       => esc_html__( '"View All" Button URL (leave blank to hide)', 'udoy-portfolio' ),
        'section'     => 'udoy_projects_section',
        'type'        => 'url',
    ) );

    // ---- Individual Project Slots (up to 6) ----
    for ( $p = 1; $p <= 6; $p++ ) :
        $default_titles = array(
            1 => 'E-Commerce Platform',
            2 => 'AI Analytics Dashboard',
            3 => 'Mobile Banking App',
            4 => '',
            5 => '',
            6 => '',
        );
        $default_cats = array(
            1 => 'Web App',
            2 => 'Data Visualization',
            3 => 'Mobile',
            4 => '',
            5 => '',
            6 => '',
        );
        $default_descs = array(
            1 => 'A full-stack e-commerce solution with real-time inventory, payment gateway integration, and an intuitive admin dashboard.',
            2 => 'Interactive analytics platform powered by machine learning that transforms raw data into actionable business insights.',
            3 => 'Secure, intuitive mobile banking with biometric authentication, instant transfers, and AI-powered spending insights.',
            4 => '',
            5 => '',
            6 => '',
        );
        $default_tags = array(
            1 => 'React, Node.js, Stripe, PostgreSQL',
            2 => 'Python, TensorFlow, D3.js, FastAPI',
            3 => 'Flutter, Firebase, Dart, Plaid API',
            4 => '',
            5 => '',
            6 => '',
        );

        $optional = $p > 3 ? ' (Optional)' : '';
        $label_prefix = sprintf( esc_html__( 'Project %d', 'udoy-portfolio' ), $p );

        $wp_customize->add_setting( "udoy_project_{$p}_title", array(
            'default'           => $default_titles[ $p ],
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( "udoy_project_{$p}_title", array(
            'label'   => $label_prefix . esc_html__( ' — Title', 'udoy-portfolio' ) . $optional,
            'section' => 'udoy_projects_section',
            'type'    => 'text',
        ) );

        $wp_customize->add_setting( "udoy_project_{$p}_category", array(
            'default'           => $default_cats[ $p ],
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( "udoy_project_{$p}_category", array(
            'label'   => $label_prefix . esc_html__( ' — Category', 'udoy-portfolio' ),
            'section' => 'udoy_projects_section',
            'type'    => 'text',
        ) );

        $wp_customize->add_setting( "udoy_project_{$p}_description", array(
            'default'           => $default_descs[ $p ],
            'sanitize_callback' => 'sanitize_textarea_field',
        ) );
        $wp_customize->add_control( "udoy_project_{$p}_description", array(
            'label'   => $label_prefix . esc_html__( ' — Description', 'udoy-portfolio' ),
            'section' => 'udoy_projects_section',
            'type'    => 'textarea',
        ) );

        $wp_customize->add_setting( "udoy_project_{$p}_tags", array(
            'default'           => $default_tags[ $p ],
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( "udoy_project_{$p}_tags", array(
            'label'   => $label_prefix . esc_html__( ' — Tags (comma-separated)', 'udoy-portfolio' ),
            'section' => 'udoy_projects_section',
            'type'    => 'text',
        ) );

        $wp_customize->add_setting( "udoy_project_{$p}_url", array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( "udoy_project_{$p}_url", array(
            'label'   => $label_prefix . esc_html__( ' — Project URL', 'udoy-portfolio' ),
            'section' => 'udoy_projects_section',
            'type'    => 'url',
        ) );

        $wp_customize->add_setting( "udoy_project_{$p}_image", array(
            'sanitize_callback' => 'absint',
        ) );
        $wp_customize->add_control(
            new WP_Customize_Media_Control(
                $wp_customize,
                "udoy_project_{$p}_image",
                array(
                    'label'     => $label_prefix . esc_html__( ' — Image', 'udoy-portfolio' ),
                    'section'   => 'udoy_projects_section',
                    'mime_type' => 'image',
                )
            )
        );
    endfor;

    // Contact Section Settings
    $wp_customize->add_setting(
        'udoy_email',
        array(
            'default'           => 'hello@udoy.dev',
            'sanitize_callback' => 'sanitize_email',
        )
    );
    $wp_customize->add_control(
        'udoy_email',
        array(
            'label'       => esc_html__( 'Email Address', 'udoy-portfolio' ),
            'section'     => 'udoy_contact_section',
            'type'        => 'email',
        )
    );

    $wp_customize->add_setting(
        'udoy_phone',
        array(
            'default'           => '+8801234567890',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_phone',
        array(
            'label'       => esc_html__( 'Phone Number', 'udoy-portfolio' ),
            'section'     => 'udoy_contact_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_whatsapp',
        array(
            'default'           => '+8801234567890',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_whatsapp',
        array(
            'label'       => esc_html__( 'WhatsApp Number', 'udoy-portfolio' ),
            'section'     => 'udoy_contact_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_location',
        array(
            'default'           => 'Bangladesh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_location',
        array(
            'label'       => esc_html__( 'Location', 'udoy-portfolio' ),
            'section'     => 'udoy_contact_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_contact_description',
        array(
            'default'           => 'Have a project in mind? I\'d love to hear about it.',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );
    $wp_customize->add_control(
        'udoy_contact_description',
        array(
            'label'       => esc_html__( 'Contact Description', 'udoy-portfolio' ),
            'section'     => 'udoy_contact_section',
            'type'        => 'textarea',
        )
    );

    $wp_customize->add_setting(
        'udoy_contact_form_id',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_contact_form_id',
        array(
            'label'       => esc_html__( 'Contact Form 7 ID', 'udoy-portfolio' ),
            'section'     => 'udoy_contact_section',
            'type'        => 'text',
        )
    );

    // Color Settings
    $wp_customize->add_setting(
        'udoy_primary_color',
        array(
            'default'           => '#2563eb',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'udoy_primary_color',
            array(
                'label'       => esc_html__( 'Primary Color', 'udoy-portfolio' ),
                'section'     => 'colors',
            )
        )
    );

    // Social Links Settings
    $wp_customize->add_setting(
        'udoy_github_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'udoy_github_url',
        array(
            'label'       => esc_html__( 'GitHub URL', 'udoy-portfolio' ),
            'section'     => 'udoy_social_section',
            'type'        => 'url',
        )
    );

    $wp_customize->add_setting(
        'udoy_linkedin_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'udoy_linkedin_url',
        array(
            'label'       => esc_html__( 'LinkedIn URL', 'udoy-portfolio' ),
            'section'     => 'udoy_social_section',
            'type'        => 'url',
        )
    );

    $wp_customize->add_setting(
        'udoy_twitter_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'udoy_twitter_url',
        array(
            'label'       => esc_html__( 'Twitter URL', 'udoy-portfolio' ),
            'section'     => 'udoy_social_section',
            'type'        => 'url',
        )
    );

    // Footer Section Settings
    $wp_customize->add_section(
        'udoy_footer_section',
        array(
            'title'    => esc_html__( 'Footer Section', 'udoy-portfolio' ),
            'priority' => 70,
        )
    );

    // Footer Logo Text
    $wp_customize->add_setting(
        'udoy_footer_logo_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_logo_text',
        array(
            'label'       => esc_html__( 'Logo Text (Leave empty to use Site Title)', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'text',
        )
    );

    // Footer Description
    $wp_customize->add_setting(
        'udoy_footer_description',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_description',
        array(
            'label'       => esc_html__( 'Footer Description', 'udoy-portfolio' ),
            'description' => esc_html__( 'Leave empty to use site description.', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'textarea',
        )
    );

    // Show/Hide brand button
    $wp_customize->add_setting(
        'udoy_footer_show_button',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_show_button',
        array(
            'label'       => esc_html__( 'Show Let’s build together button', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'checkbox',
        )
    );

    // Footer Button Text
    $wp_customize->add_setting(
        'udoy_footer_button_text',
        array(
            'default'           => 'Let’s build together',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_button_text',
        array(
            'label'       => esc_html__( 'Button Text', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'text',
        )
    );

    // Footer Button URL
    $wp_customize->add_setting(
        'udoy_footer_button_url',
        array(
            'default'           => '#contact',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_button_url',
        array(
            'label'       => esc_html__( 'Button URL', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'url',
        )
    );

    // Footer Explore Title
    $wp_customize->add_setting(
        'udoy_footer_explore_title',
        array(
            'default'           => 'QUICK LINKS',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_explore_title',
        array(
            'label'       => esc_html__( 'Explore Column Title', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'text',
        )
    );

    // Fallback menu labels
    $wp_customize->add_setting(
        'udoy_footer_about_label',
        array(
            'default'           => 'About',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_about_label',
        array(
            'label'       => esc_html__( 'Fallback Link: About Label', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_footer_skills_label',
        array(
            'default'           => 'Skills',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_skills_label',
        array(
            'label'       => esc_html__( 'Fallback Link: Skills Label', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_footer_projects_label',
        array(
            'default'           => 'Projects',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_projects_label',
        array(
            'label'       => esc_html__( 'Fallback Link: Projects Label', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'udoy_footer_contact_label',
        array(
            'default'           => 'Contact',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_contact_label',
        array(
            'label'       => esc_html__( 'Fallback Link: Contact Label', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'text',
        )
    );

    // Footer Services Section Settings
    $wp_customize->add_setting(
        'udoy_footer_services_title',
        array(
            'default'           => 'SERVICES',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_services_title',
        array(
            'label'       => esc_html__( 'Services Column Title', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'text',
        )
    );

    $default_services_labels = array(
        1 => 'WordPress Development',
        2 => 'Elementor Design',
        3 => 'Next.js Frontend',
        4 => 'UI/UX Design',
        5 => 'SEO Optimization'
    );

    for ( $i = 1; $i <= 5; $i++ ) {
        $wp_customize->add_setting(
            "udoy_footer_service_{$i}_label",
            array(
                'default'           => $default_services_labels[$i],
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            "udoy_footer_service_{$i}_label",
            array(
                'label'       => sprintf( esc_html__( 'Service %d Label', 'udoy-portfolio' ), $i ),
                'section'     => 'udoy_footer_section',
                'type'        => 'text',
            )
        );

        $wp_customize->add_setting(
            "udoy_footer_service_{$i}_url",
            array(
                'default'           => '#',
                'sanitize_callback' => 'esc_url_raw',
            )
        );
        $wp_customize->add_control(
            "udoy_footer_service_{$i}_url",
            array(
                'label'       => sprintf( esc_html__( 'Service %d URL', 'udoy-portfolio' ), $i ),
                'section'     => 'udoy_footer_section',
                'type'        => 'text',
            )
        );
    }

    // Footer Connect Title
    $wp_customize->add_setting(
        'udoy_footer_connect_title',
        array(
            'default'           => 'Stay connected',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_connect_title',
        array(
            'label'       => esc_html__( 'Connect Column Title', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'text',
        )
    );

    // Footer Connect Text
    $wp_customize->add_setting(
        'udoy_footer_connect_text',
        array(
            'default'           => 'Follow me for project updates, launch news, and design inspiration.',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_connect_text',
        array(
            'label'       => esc_html__( 'Connect Text', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'textarea',
        )
    );

    // Show/Hide Email
    $wp_customize->add_setting(
        'udoy_footer_show_email',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_show_email',
        array(
            'label'       => esc_html__( 'Show Email link', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'checkbox',
        )
    );

    // Show/Hide Socials
    $wp_customize->add_setting(
        'udoy_footer_show_social',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_show_social',
        array(
            'label'       => esc_html__( 'Show Social links', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'checkbox',
        )
    );

    // Footer Copyright Text
    $wp_customize->add_setting(
        'udoy_footer_copyright_text',
        array(
            'default'           => 'All rights reserved.',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'udoy_footer_copyright_text',
        array(
            'label'       => esc_html__( 'Copyright Text', 'udoy-portfolio' ),
            'section'     => 'udoy_footer_section',
            'type'        => 'text',
        )
    );

    // Color: Background
    $wp_customize->add_setting(
        'udoy_footer_bg_color',
        array(
            'default'           => '#f8fafc',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'udoy_footer_bg_color',
            array(
                'label'       => esc_html__( 'Footer Background Color', 'udoy-portfolio' ),
                'section'     => 'udoy_footer_section',
            )
        )
    );

    // Color: Text
    $wp_customize->add_setting(
        'udoy_footer_text_color',
        array(
            'default'           => '#475569',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'udoy_footer_text_color',
            array(
                'label'       => esc_html__( 'Footer Text Color', 'udoy-portfolio' ),
                'section'     => 'udoy_footer_section',
            )
        )
    );

    // Color: Title
    $wp_customize->add_setting(
        'udoy_footer_title_color',
        array(
            'default'           => '#0f172a',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'udoy_footer_title_color',
            array(
                'label'       => esc_html__( 'Footer Title/Logo Color', 'udoy-portfolio' ),
                'section'     => 'udoy_footer_section',
            )
        )
    );
}
add_action( 'customize_register', 'udoy_portfolio_customize_register' );

/**
 * Output custom CSS based on customizer settings
 */
function udoy_portfolio_custom_css() {
    $primary_color = get_theme_mod( 'udoy_primary_color', '#2563eb' );
    $primary_rgb   = sscanf( $primary_color, '#%02x%02x%02x' );
    $primary_rgb_str = is_array( $primary_rgb ) && 3 === count( $primary_rgb )
        ? sprintf( '%d, %d, %d', $primary_rgb[0], $primary_rgb[1], $primary_rgb[2] )
        : '37, 99, 235';
    $primary_soft  = 'rgba(' . $primary_rgb_str . ', 0.1)';

    // Footer customizer styles
    $footer_bg_color = get_theme_mod( 'udoy_footer_bg_color', '#0f172a' );
    $footer_text_color = get_theme_mod( 'udoy_footer_text_color', '#94a3b8' );
    $footer_title_color = get_theme_mod( 'udoy_footer_title_color', '#ffffff' );
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr( $primary_color ); ?>;
            --primary-rgb: <?php echo esc_attr( $primary_rgb_str ); ?>;
        }

        .highlight,
        .section-label,
        .badge,
        a:hover {
            color: <?php echo esc_attr( $primary_color ); ?>;
        }

        .btn-primary,
        .btn.btn-primary,
        .btn-talk {
            background-color: <?php echo esc_attr( $primary_color ); ?>;
        }

        .feature-icon,
        .contact-icon {
            background-color: <?php echo esc_attr( $primary_soft ); ?>;
        }

        .feature-icon svg,
        .contact-icon svg {
            color: <?php echo esc_attr( $primary_color ); ?>;
        }

        /* --- Custom Premium Footer Styles --- */
        .site-footer {
            background: <?php echo esc_attr( $footer_bg_color ); ?> !important;
            color: <?php echo esc_attr( $footer_text_color ); ?> !important;
            border-top: 1px solid <?php echo (hexdec(substr($footer_bg_color, 1, 2)) + hexdec(substr($footer_bg_color, 3, 2)) + hexdec(substr($footer_bg_color, 5, 2)) > 500) ? 'rgba(0,0,0,0.06)' : 'rgba(255,255,255,0.08)'; ?> !important;
            position: relative;
            overflow: hidden;
        }
        
        .site-footer::before {
            content: '';
            position: absolute;
            top: -20%;
            left: -10%;
            width: 60%;
            height: 140%;
            background: radial-gradient(circle, rgba(var(--primary-rgb), 0.04) 0%, transparent 70%);
            pointer-events: none;
        }

        .site-footer .footer-card {
            border: none !important;
            background: transparent !important;
            backdrop-filter: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            transition: none !important;
        }

        .site-footer .footer-card:hover {
            transform: none !important;
            box-shadow: none !important;
            border-color: transparent !important;
            background: transparent !important;
        }

        @media (min-width: 768px) {
            .site-footer .footer-grid {
                grid-template-columns: 1.5fr 0.8fr 0.8fr;
                gap: 3.5rem;
            }
        }

        .site-footer .footer-logo-text {
            color: <?php echo esc_attr( $footer_title_color ); ?> !important;
            background: none !important;
            -webkit-text-fill-color: initial !important;
            -webkit-background-clip: initial !important;
            font-weight: 800;
            font-size: 1.5rem;
        }

        .site-footer .footer-logo-dot {
            color: var(--primary-color) !important;
        }

        .site-footer .footer-description {
            color: <?php echo esc_attr( $footer_text_color ); ?> !important;
            opacity: 0.85;
            font-size: 0.9375rem;
            line-height: 1.6;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
            max-width: 320px;
        }

        .site-footer .footer-title {
            color: <?php echo esc_attr( $footer_title_color ); ?> !important;
            font-size: 0.875rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            margin-bottom: 1.25rem;
        }

        .site-footer .footer-menu {
            gap: 0.75rem;
        }

        .site-footer .footer-menu a {
            color: <?php echo esc_attr( $footer_text_color ); ?> !important;
            opacity: 0.85;
            font-size: 0.9375rem;
            transition: all 0.2s ease;
        }

        .site-footer .footer-menu a:hover {
            color: var(--primary-color) !important;
            opacity: 1;
            padding-left: 0;
        }

        .site-footer .social-links {
            display: flex;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .site-footer .social-link {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: <?php echo esc_attr( $footer_text_color ); ?> !important;
            background-color: <?php echo (hexdec(substr($footer_bg_color, 1, 2)) + hexdec(substr($footer_bg_color, 3, 2)) + hexdec(substr($footer_bg_color, 5, 2)) > 500) ? '#f1f5f9' : 'rgba(255,255,255,0.08)'; ?> !important;
            border: 1px solid <?php echo (hexdec(substr($footer_bg_color, 1, 2)) + hexdec(substr($footer_bg_color, 3, 2)) + hexdec(substr($footer_bg_color, 5, 2)) > 500) ? '#e2e8f0' : 'rgba(255,255,255,0.12)'; ?> !important;
            transition: all 0.25s ease !important;
        }

        .site-footer .social-link:hover {
            color: #ffffff !important;
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(var(--primary-rgb), 0.25);
        }

        .site-footer .footer-bottom {
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid <?php echo (hexdec(substr($footer_bg_color, 1, 2)) + hexdec(substr($footer_bg_color, 3, 2)) + hexdec(substr($footer_bg_color, 5, 2)) > 500) ? 'rgba(0,0,0,0.06)' : 'rgba(255,255,255,0.06)'; ?> !important;
        }

        .site-footer .footer-copyright {
            color: <?php echo esc_attr( $footer_text_color ); ?> !important;
            opacity: 0.8;
            font-size: 0.875rem;
        }

        .site-footer .footer-copyright .site-name {
            color: <?php echo esc_attr( $footer_title_color ); ?> !important;
            font-weight: 600;
        }

        .site-footer .back-to-top {
            color: <?php echo esc_attr( $footer_text_color ); ?> !important;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            transition: all 0.2s ease;
        }

        .site-footer .back-to-top:hover {
            color: var(--primary-color) !important;
            transform: translateY(-2px);
        }
    </style>
    <?php
}
add_action( 'wp_head', 'udoy_portfolio_custom_css' );

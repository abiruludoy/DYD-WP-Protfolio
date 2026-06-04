<?php
/**
 * Template part for displaying the contact section
 *
 * @package Udoy_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<section class="contact-section" id="contact">
    <div class="contact-container">
        <!-- Left Content -->
        <div class="contact-info animate-on-scroll">
            <span class="section-label">
                <?php esc_html_e( 'GET IN TOUCH', 'udoy-portfolio' ); ?>
            </span>
            <h2 class="section-title">
                <?php esc_html_e( 'Let\'s work together', 'udoy-portfolio' ); ?>
            </h2>

            <p class="contact-description">
                <?php echo wp_kses_post( get_theme_mod( 'udoy_contact_description', 'Have a project in mind? I\'d love to hear about it. Drop me a message and let\'s create something amazing together.' ) ); ?>
            </p>

            <?php
                $contact_email = sanitize_email( get_theme_mod( 'udoy_email', 'hello@udoy.dev' ) );
                $contact_phone = preg_replace( '/[^0-9+]/', '', get_theme_mod( 'udoy_phone', '+8801234567890' ) );
                $contact_whatsapp = preg_replace( '/[^0-9]/', '', get_theme_mod( 'udoy_whatsapp', '+8801234567890' ) );
            ?>

            <div class="contact-details">
                <!-- Email -->
                <a class="contact-detail contact-link" href="<?php echo esc_url( 'mailto:' . $contact_email ); ?>">
                    <div class="contact-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="contact-info-text">
                        <p class="contact-label"><?php esc_html_e( 'Email', 'udoy-portfolio' ); ?></p>
                        <span class="contact-value">
                            <?php echo esc_html( $contact_email ); ?>
                        </span>
                    </div>
                </a>

                <!-- Phone -->
                <a class="contact-detail contact-link" href="<?php echo esc_url( 'tel:' . $contact_phone ); ?>">
                    <div class="contact-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5.25A2.25 2.25 0 015.25 3h2.25c.373 0 .712.208.877.533l1.5 3.25a.75.75 0 01-.16.841l-.66.66a16.007 16.007 0 006.586 6.586l.66-.66a.75.75 0 01.84-.161l3.25 1.5c.325.165.533.504.533.877V18.75A2.25 2.25 0 0118.75 21H16.5a16.5 16.5 0 01-13.5-13.5V5.25z" />
                        </svg>
                    </div>
                    <div class="contact-info-text">
                        <p class="contact-label"><?php esc_html_e( 'Phone', 'udoy-portfolio' ); ?></p>
                        <span class="contact-value">
                            <?php echo esc_html( get_theme_mod( 'udoy_phone', '+8801234567890' ) ); ?>
                        </span>
                    </div>
                </a>

                <!-- WhatsApp -->
                <a class="contact-detail contact-link" href="<?php echo esc_url( 'https://wa.me/' . $contact_whatsapp ); ?>" target="_blank" rel="noopener noreferrer">
                    <div class="contact-icon whatsapp-icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#DBEAFE" d="M12 2.04C6.48 2.04 2.04 6.48 2.04 12S6.48 21.96 12 21.96 21.96 17.52 21.96 12 17.52 2.04 12 2.04z" />
                            <path fill="#2563EB" d="M16.5 14.7c-.25.72-1.5 1.56-1.75 1.66-.22.07-.45.11-.65.04-.2-.06-.84-.31-1.29-.51-.45-.18-.94-.36-1.41-.63-.47-.28-.92-.61-1.34-.99-.42-.39-.86-.84-1.13-1.37-.24-.47-.29-.81-.2-1.07.08-.22.32-.52.56-.79.25-.27.29-.36.48-.61.19-.25.18-.45.06-.71-.12-.26-.6-1.44-.82-1.98-.22-.55-.45-.48-.62-.48-.16 0-.35-.01-.54-.01-.19 0-.5.07-.76.35-.25.27-.96.94-.96 2.3 0 1.36.98 2.69 1.12 2.88.14.18 1.94 3.04 4.8 4.26 1.84.84 2.58.73 3.04.68.44-.05 1.4-.57 1.6-1.12.2-.55.2-1.02.14-1.12-.06-.1-.24-.17-.5-.3z" />
                        </svg>
                    </div>
                    <div class="contact-info-text">
                        <p class="contact-label"><?php esc_html_e( 'WhatsApp', 'udoy-portfolio' ); ?></p>
                        <span class="contact-value">
                            <?php echo esc_html( get_theme_mod( 'udoy_whatsapp', '+8801234567890' ) ); ?>
                        </span>
                    </div>
                </a>

                <!-- Location -->
                <div class="contact-detail">
                    <div class="contact-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="contact-info-text">
                        <p class="contact-label"><?php esc_html_e( 'Location', 'udoy-portfolio' ); ?></p>
                        <p class="contact-value">
                            <?php echo esc_html( get_theme_mod( 'udoy_location', 'Bangladesh' ) ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Content - Contact Form -->
        <div class="contact-form-wrapper animate-on-scroll">
            <?php
            $contact_form_id = absint( get_theme_mod( 'udoy_contact_form_id', 0 ) );

            // Use Contact Form 7 only when a valid form ID is configured.
            if ( $contact_form_id && shortcode_exists( 'contact-form-7' ) ) {
                echo do_shortcode( sprintf( '[contact-form-7 id="%d" title="Contact Form"]', $contact_form_id ) );
            } else {
                ?>
                <form class="contact-form" id="contact-form-fallback">
                    <div class="form-group">
                        <input 
                            type="text" 
                            name="name" 
                            placeholder="<?php esc_attr_e( 'Your Name', 'udoy-portfolio' ); ?>" 
                            class="form-input" 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <input 
                            type="email" 
                            name="email" 
                            placeholder="<?php esc_attr_e( 'Your Email', 'udoy-portfolio' ); ?>" 
                            class="form-input" 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <textarea 
                            name="message" 
                            placeholder="<?php esc_attr_e( 'Your Message', 'udoy-portfolio' ); ?>" 
                            class="form-textarea" 
                            rows="5" 
                            required
                        ></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <?php esc_html_e( 'Send Message', 'udoy-portfolio' ); ?>
                    </button>

                    <div class="form-status" id="form-status"></div>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</section>

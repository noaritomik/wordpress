<?php
/*
Template Name: Contact
*/
$form_name = '';
$form_email = '';
$form_subject = '';
$form_message = '';
$contact_notice = '';
$contact_notice_type = '';

if ('POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['mdps_contact_nonce'])) {
    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mdps_contact_nonce'])), 'mdps_send_contact_message')) {
        $contact_notice = 'Your session expired. Please try again.';
        $contact_notice_type = 'error';
    } else {
        $form_name = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
        $form_email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
        $form_subject = sanitize_text_field(wp_unslash($_POST['subject'] ?? ''));
        $form_message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

        if (!$form_name || !$form_email || !$form_subject || !$form_message || !is_email($form_email)) {
            $contact_notice = 'Please complete all fields with a valid email address.';
            $contact_notice_type = 'error';
        } else {
            $admin_email = get_option('admin_email');
            $mail_subject = sprintf('New contact request: %s', $form_subject);
            $mail_message = "Name: {$form_name}\n";
            $mail_message .= "Email: {$form_email}\n";
            $mail_message .= "Subject: {$form_subject}\n\n";
            $mail_message .= $form_message;
            $headers = array('Reply-To: ' . $form_name . ' <' . $form_email . '>');

            if (wp_mail($admin_email, $mail_subject, $mail_message, $headers)) {
                $contact_notice = 'Your message has been sent successfully.';
                $contact_notice_type = 'success';
                $form_name = '';
                $form_email = '';
                $form_subject = '';
                $form_message = '';
            } else {
                $contact_notice = 'The message could not be sent. Please try again later.';
                $contact_notice_type = 'error';
            }
        }
    }
}

get_header(); ?>

<main class="container">

    <section class="contact-hero">
        <p class="eyebrow">Contact</p>
        <h1><?php the_title(); ?></h1>
        <div class="content narrow-content">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </section>

    <section class="contact-content">
        <div class="contact-grid">
            <div class="contact-form">
                <h2>Send us a Message</h2>
                <p class="form-note">Messages from this form will be sent to <?php echo esc_html(get_option('admin_email')); ?>.</p>

                <?php if ($contact_notice) : ?>
                    <div class="notice-panel <?php echo esc_attr($contact_notice_type); ?>">
                        <p><?php echo esc_html($contact_notice); ?></p>
                    </div>
                <?php endif; ?>

                <form class="contact-form-element" method="post" action="<?php echo esc_url(get_permalink()); ?>">
                    <?php wp_nonce_field('mdps_send_contact_message', 'mdps_contact_nonce'); ?>
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" value="<?php echo esc_attr($form_name); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" value="<?php echo esc_attr($form_email); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <select id="subject" name="subject" required>
                            <option value="" <?php selected($form_subject, ''); ?>>Select a subject</option>
                            <option value="support" <?php selected($form_subject, 'support'); ?>>Technical Support</option>
                            <option value="sales" <?php selected($form_subject, 'sales'); ?>>Sales Inquiry</option>
                            <option value="refund" <?php selected($form_subject, 'refund'); ?>>Refund Request</option>
                            <option value="other" <?php selected($form_subject, 'other'); ?>>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="6" required><?php echo esc_textarea($form_message); ?></textarea>
                    </div>

                    <button type="submit" class="cta-button">Send Message</button>
                </form>
            </div>

            <div class="contact-info">
                <h2>Contact Information</h2>

                <div class="contact-item">
                    <h3>Email</h3>
                    <p><?php echo esc_html(get_option('admin_email')); ?></p>
                    <p>Use the contact form for support and sales questions.</p>
                </div>

                <div class="contact-item">
                    <h3>Phone</h3>
                    <p>+1 (555) 123-4567</p>
                    <p>Monday to Friday, 9:00 AM to 6:00 PM</p>
                </div>

                <div class="contact-item">
                    <h3>Address</h3>
                    <p>123 Digital Avenue<br>
                    Tech City, TC 12345<br>
                    United States</p>
                </div>

                <div class="contact-item">
                    <h3>Business Hours</h3>
                    <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                    <p>Saturday: 10:00 AM - 4:00 PM</p>
                    <p>Sunday: Closed</p>
                </div>

                <div class="social-links">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" class="social-link">Facebook</a>
                        <a href="#" class="social-link">Twitter</a>
                        <a href="#" class="social-link">Instagram</a>
                        <a href="#" class="social-link">LinkedIn</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-grid">
            <div class="faq-item">
                <h4>How do I download my purchase?</h4>
                <p>After purchase, you'll receive an email with download links. You can also access your downloads from your account dashboard.</p>
            </div>
            <div class="faq-item">
                <h4>Do you offer refunds?</h4>
                <p>Yes, we offer a 30-day money-back guarantee. If you're not satisfied, contact us for a full refund.</p>
            </div>
            <div class="faq-item">
                <h4>Can I get support after purchase?</h4>
                <p>Absolutely! We provide ongoing support for all our products. Contact us anytime with questions.</p>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
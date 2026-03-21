<?php
/*
Template Name: Contact
*/
get_header(); ?>

<main class="container">

    <section class="contact-hero">
        <h1>Get In Touch</h1>
        <p>Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
    </section>

    <section class="contact-content">
        <div class="contact-grid">
            <div class="contact-form">
                <h2>Send us a Message</h2>
                <form class="contact-form-element">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <select id="subject" name="subject" required>
                            <option value="">Select a subject</option>
                            <option value="support">Technical Support</option>
                            <option value="sales">Sales Inquiry</option>
                            <option value="refund">Refund Request</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="6" required></textarea>
                    </div>

                    <button type="submit" class="cta-button">Send Message</button>
                </form>
            </div>

            <div class="contact-info">
                <h2>Contact Information</h2>

                <div class="contact-item">
                    <h3>📧 Email</h3>
                    <p>support@yourstore.com</p>
                    <p>sales@yourstore.com</p>
                </div>

                <div class="contact-item">
                    <h3>📞 Phone</h3>
                    <p>+1 (555) 123-4567</p>
                    <p>Mon-Fri: 9AM - 6PM EST</p>
                </div>

                <div class="contact-item">
                    <h3>📍 Address</h3>
                    <p>123 Digital Avenue<br>
                    Tech City, TC 12345<br>
                    United States</p>
                </div>

                <div class="contact-item">
                    <h3>🕒 Business Hours</h3>
                    <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                    <p>Saturday: 10:00 AM - 4:00 PM</p>
                    <p>Sunday: Closed</p>
                </div>

                <div class="social-links">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" class="social-link">📘 Facebook</a>
                        <a href="#" class="social-link">🐦 Twitter</a>
                        <a href="#" class="social-link">📷 Instagram</a>
                        <a href="#" class="social-link">💼 LinkedIn</a>
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
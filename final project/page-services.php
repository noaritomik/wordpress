<?php
/*
Template Name: Services
*/
get_header(); ?>

<main class="container">

    <section class="services-hero">
        <h1>Our Digital Products & Services</h1>
        <p>Discover our comprehensive collection of premium digital products designed to accelerate your creative projects</p>
    </section>

    <section class="services-grid">
        <div class="service-card">
            <div class="service-icon">🎨</div>
            <h3>UI/UX Design Kits</h3>
            <p>Complete design systems with components, patterns, and templates for modern web and mobile applications.</p>
            <ul>
                <li>Wireframe templates</li>
                <li>Component libraries</li>
                <li>Design guidelines</li>
                <li>Prototype assets</li>
            </ul>
            <a href="<?php echo get_post_type_archive_link('product'); ?>?product_category=ui-kits" class="service-link">Browse UI Kits →</a>
        </div>

        <div class="service-card">
            <div class="service-icon">📱</div>
            <h3>Mobile App Templates</h3>
            <p>Ready-to-use mobile app designs for iOS and Android with pixel-perfect layouts and modern interfaces.</p>
            <ul>
                <li>iOS & Android designs</li>
                <li>Dark mode variants</li>
                <li>Interactive prototypes</li>
                <li>Source files included</li>
            </ul>
            <a href="<?php echo get_post_type_archive_link('product'); ?>?product_category=mobile-templates" class="service-link">Browse Templates →</a>
        </div>

        <div class="service-card">
            <div class="service-icon">💻</div>
            <h3>Website Templates</h3>
            <p>Professional website templates for business, portfolio, e-commerce, and landing pages.</p>
            <ul>
                <li>Responsive designs</li>
                <li>SEO optimized</li>
                <li>Easy customization</li>
                <li>Multiple layouts</li>
            </ul>
            <a href="<?php echo get_post_type_archive_link('product'); ?>?product_category=website-templates" class="service-link">Browse Templates →</a>
        </div>

        <div class="service-card">
            <div class="service-icon">🎯</div>
            <h3>Icon Packs</h3>
            <p>Comprehensive icon collections in multiple styles and formats for all your design needs.</p>
            <ul>
                <li>SVG & PNG formats</li>
                <li>Multiple styles</li>
                <li>Regular updates</li>
                <li>Commercial license</li>
            </ul>
            <a href="<?php echo get_post_type_archive_link('product'); ?>?product_category=icons" class="service-link">Browse Icons →</a>
        </div>

        <div class="service-card">
            <div class="service-icon">📊</div>
            <h3>Infographics & Illustrations</h3>
            <p>Custom illustrations, infographics, and vector graphics for marketing and presentation needs.</p>
            <ul>
                <li>Vector format</li>
                <li>Scalable graphics</li>
                <li>Brand customization</li>
                <li>Print ready</li>
            </ul>
            <a href="<?php echo get_post_type_archive_link('product'); ?>?product_category=illustrations" class="service-link">Browse Graphics →</a>
        </div>

        <div class="service-card">
            <div class="service-icon">🎪</div>
            <h3>Custom Design Services</h3>
            <p>Professional design services tailored to your specific needs and brand requirements.</p>
            <ul>
                <li>Custom UI/UX design</li>
                <li>Brand identity</li>
                <li>Logo design</li>
                <li>Consultation</li>
            </ul>
            <a href="<?php echo get_page_link(get_page_by_title('Contact')); ?>" class="service-link">Get Quote →</a>
        </div>
    </section>

    <section class="pricing-section">
        <h2>Simple, Transparent Pricing</h2>
        <div class="pricing-grid">
            <div class="pricing-card">
                <h3>Individual License</h3>
                <div class="price">$29<span>/product</span></div>
                <ul>
                    <li>✓ Single product use</li>
                    <li>✓ Personal projects</li>
                    <li>✓ Email support</li>
                    <li>✓ Free updates</li>
                </ul>
                <a href="#" class="cta-button">Get Started</a>
            </div>

            <div class="pricing-card featured">
                <div class="badge">Most Popular</div>
                <h3>Business License</h3>
                <div class="price">$99<span>/product</span></div>
                <ul>
                    <li>✓ Unlimited use</li>
                    <li>✓ Commercial projects</li>
                    <li>✓ Priority support</li>
                    <li>✓ All updates included</li>
                    <li>✓ Team license (5 users)</li>
                </ul>
                <a href="#" class="cta-button">Choose Business</a>
            </div>

            <div class="pricing-card">
                <h3>Enterprise License</h3>
                <div class="price">$299<span>/product</span></div>
                <ul>
                    <li>✓ Everything in Business</li>
                    <li>✓ Custom development</li>
                    <li>✓ White-label options</li>
                    <li>✓ Dedicated support</li>
                    <li>✓ Custom integrations</li>
                </ul>
                <a href="#" class="cta-button">Contact Sales</a>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <h2>Ready to Get Started?</h2>
        <p>Join thousands of creators who trust our digital products for their projects</p>
        <div class="cta-buttons">
            <a href="<?php echo get_post_type_archive_link('product'); ?>" class="cta-button">Browse Products</a>
            <a href="<?php echo get_page_link(get_page_by_title('Contact')); ?>" class="cta-button secondary">Contact Us</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
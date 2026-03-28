<?php
/*
Template Name: Services
*/
get_header();

$product_archive_url = get_post_type_archive_link('product');
$contact_page = get_page_by_path('contact');
$contact_url = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
$templates_term = get_term_by('name', 'Templates', 'product_category');
$assets_term = get_term_by('name', 'Design Assets', 'product_category');
$ebooks_term = get_term_by('name', 'Ebooks', 'product_category');
$guides_term = get_term_by('name', 'Guides', 'product_category');

$services = array(
    array(
        'icon' => 'UI',
        'title' => 'Template Collections',
        'description' => 'Landing pages, portfolio layouts, and starter screens that are ready to adapt to your brand.',
        'items' => array('Homepage sections', 'Portfolio layouts', 'Business-ready structure', 'Responsive presentation'),
        'url' => $templates_term ? get_term_link($templates_term) : $product_archive_url,
        'label' => 'Browse Templates',
    ),
    array(
        'icon' => 'DA',
        'title' => 'Design Assets',
        'description' => 'UI kits, icon packs, and reusable design parts that speed up your workflow and keep projects consistent.',
        'items' => array('Reusable components', 'Business icon packs', 'Social media graphics', 'Clean visual systems'),
        'url' => $assets_term ? get_term_link($assets_term) : $product_archive_url,
        'label' => 'Browse Design Assets',
    ),
    array(
        'icon' => 'EB',
        'title' => 'Learning Resources',
        'description' => 'Practical ebooks and walkthroughs that help beginners and freelancers build with more confidence.',
        'items' => array('WordPress learning', 'UX writing basics', 'Step-by-step guides', 'Project-ready advice'),
        'url' => $ebooks_term ? get_term_link($ebooks_term) : $product_archive_url,
        'label' => 'Browse Ebooks',
    ),
    array(
        'icon' => 'GD',
        'title' => 'Launch Guides',
        'description' => 'Checklists and planning resources that help you organize a site launch without missing the essentials.',
        'items' => array('Launch checklists', 'Content planning', 'Pre-publish review', 'Delivery support'),
        'url' => $guides_term ? get_term_link($guides_term) : $product_archive_url,
        'label' => 'Browse Guides',
    ),
    array(
        'icon' => 'WD',
        'title' => 'Website Setup Support',
        'description' => 'Guidance for structuring product pages, landing pages, and content layouts inside your WordPress theme.',
        'items' => array('Content planning', 'Template advice', 'Catalog structure', 'Simple launch support'),
        'url' => $contact_url,
        'label' => 'Request Help',
    ),
    array(
        'icon' => 'CS',
        'title' => 'Custom Services',
        'description' => 'If you need something beyond the ready-made catalog, use the contact page to discuss a custom request.',
        'items' => array('Tailored product packs', 'Theme adjustments', 'Content cleanup', 'Storefront consultation'),
        'url' => $contact_url,
        'label' => 'Contact Us',
    ),
);
?>

<main class="container">

    <section class="services-hero">
        <p class="eyebrow">Services and products</p>
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

    <section class="products-section">
        <h2>What We Offer</h2>
        <p class="section-intro">Each service area connects directly to products or guidance your visitors can actually use.</p>
        <div class="services-grid">
            <?php foreach ($services as $service) : ?>
                <article class="service-card">
                    <div class="service-icon"><?php echo esc_html($service['icon']); ?></div>
                    <h3><?php echo esc_html($service['title']); ?></h3>
                    <p><?php echo esc_html($service['description']); ?></p>
                    <ul>
                        <?php foreach ($service['items'] as $item) : ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo esc_url($service['url']); ?>" class="service-link"><?php echo esc_html($service['label']); ?></a>
                </article>
            <?php endforeach; ?>
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
                <a href="<?php echo esc_url($product_archive_url); ?>" class="cta-button">Get Started</a>
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
                <a href="<?php echo esc_url($product_archive_url); ?>" class="cta-button">Choose Business</a>
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
                <a href="<?php echo esc_url($contact_url); ?>" class="cta-button">Contact Sales</a>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <h2>Ready to Get Started?</h2>
        <p>Join thousands of creators who trust our digital products for their projects</p>
        <div class="cta-buttons">
            <a href="<?php echo esc_url($product_archive_url); ?>" class="cta-button">Browse Products</a>
            <a href="<?php echo esc_url($contact_url); ?>" class="cta-button secondary">Contact Us</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
<?php
/*
Template Name: About Us
*/
get_header();

$published_products = wp_count_posts('product');
$published_posts = wp_count_posts('post');
$contact_page = get_page_by_path('contact');
$contact_url = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
?>

<main class="container">

    <section class="about-hero">
        <p class="eyebrow">About the store</p>
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

    <section class="about-content">
        <div class="about-grid">
            <div class="about-text">
                <h2>Our Story</h2>
                <p>We built this digital store to make high-quality resources easier to find, easier to use, and easier to trust. Every product is designed to save time without sacrificing clarity or professional polish.</p>

                <p>Instead of shipping generic files, we focus on useful assets that help students, freelancers, and small teams launch pages, improve presentations, and create better user experiences.</p>

                <h3>Why Choose Us?</h3>
                <ul>
                    <li><strong>Useful products:</strong> Everything is made for real project work, not filler content.</li>
                    <li><strong>Clean structure:</strong> Files are organized so they are easy to edit and reuse.</li>
                    <li><strong>Consistent quality:</strong> The catalog follows a clear visual and content standard.</li>
                    <li><strong>Ongoing growth:</strong> New items are added as the store expands.</li>
                </ul>
            </div>

            <div class="about-stats">
                <div class="stat-item">
                    <h3><?php echo esc_html((string) (($published_products->publish ?? 0))); ?>+</h3>
                    <p>Products available</p>
                </div>
                <div class="stat-item">
                    <h3><?php echo esc_html((string) (($published_posts->publish ?? 0))); ?>+</h3>
                    <p>Articles and updates</p>
                </div>
                <div class="stat-item">
                    <h3><?php echo esc_html((string) wp_count_terms(array('taxonomy' => 'product_category', 'hide_empty' => true))); ?></h3>
                    <p>Product categories</p>
                </div>
                <div class="stat-item">
                    <h3>Fast</h3>
                    <p>Built for quick launch cycles</p>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section">
        <h2>Meet Our Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <div class="member-avatar">
                    <span>ND</span>
                </div>
                <h4>Nadia</h4>
                <p>Product Design Lead</p>
                <p>Shapes the layout, systems, and product presentation across the store.</p>
            </div>
            <div class="team-member">
                <div class="member-avatar">
                    <span>AR</span>
                </div>
                <h4>Andre</h4>
                <p>Development Lead</p>
                <p>Builds the WordPress structure and keeps the storefront reliable.</p>
            </div>
            <div class="team-member">
                <div class="member-avatar">
                    <span>MC</span>
                </div>
                <h4>Mira</h4>
                <p>Content Strategist</p>
                <p>Turns technical products into content customers can understand quickly.</p>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <h2>Want to see what the team has built?</h2>
        <p>Browse the product library or reach out if you need a custom package for your project.</p>
        <div class="cta-buttons">
            <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="cta-button">View Products</a>
            <a href="<?php echo esc_url($contact_url); ?>" class="cta-button secondary">Contact Us</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
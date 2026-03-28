<?php
get_header();

$contact_page = get_page_by_path('contact');
$contact_url = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
?>

<main class="container">

    <header class="archive-header">
        <p class="eyebrow">Category</p>
        <h1><?php single_term_title(); ?></h1>
        <?php
        $description = term_description();
        if ($description) {
            echo '<p>' . wp_kses_post($description) . '</p>';
        } else {
            echo '<p>Filtered products from this category.</p>';
        }
        ?>
    </header>

    <div class="archive-actions">
        <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="back-link">View all products</a>
    </div>

    <?php if (have_posts()) : ?>
        <div class="products-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article class="product-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="product-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('product_thumb'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <h3>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="product-excerpt"><?php the_excerpt(); ?></div>
                    <a class="view-product" href="<?php the_permalink(); ?>">View Product</a>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p class="empty-state">No products found in this category.</p>
    <?php endif; ?>

    <section class="cta-section">
        <h2>Need something more specific?</h2>
        <p>If you cannot find the right item in this category, use the contact page and describe what you need.</p>
        <div class="cta-buttons">
            <a href="<?php echo esc_url($contact_url); ?>" class="cta-button">Contact Us</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>

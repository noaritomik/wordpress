<?php
get_header();

$contact_page = get_page_by_path('contact');
$contact_url = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
?>

<main class="container">

    <header class="archive-header">
        <p class="eyebrow">Product catalog</p>
        <h1><?php post_type_archive_title(); ?></h1>
        <?php
        $description = get_the_archive_description();
        if ($description) {
            echo '<p>' . wp_kses_post($description) . '</p>';
        } else {
            echo '<p>Browse the full collection of digital products, organized to help you find the right asset quickly.</p>';
        }
        ?>
    </header>

    <?php
    $categories = get_terms(array(
        'taxonomy' => 'product_category',
        'hide_empty' => true,
    ));

    if ($categories && !is_wp_error($categories)) : ?>
        <div class="product-categories-filter">
            <h3>Categories:</h3>
            <ul>
                <li><a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="<?php echo !is_tax() ? 'active' : ''; ?>">All Products</a></li>
                <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="<?php echo is_tax('product_category', $category->term_id) ? 'active' : ''; ?>">
                            <?php echo esc_html($category->name); ?> (<?php echo esc_html((string) $category->count); ?>)
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (have_posts()) : ?>
        <div class="products-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article class="product-card">
                    <?php $product_terms = wp_get_post_terms(get_the_ID(), 'product_category', array('fields' => 'names')); ?>
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
                    <?php if ($product_terms && !is_wp_error($product_terms)) : ?>
                        <p class="product-taxonomy"><?php echo esc_html(implode(', ', $product_terms)); ?></p>
                    <?php endif; ?>
                    <div class="product-excerpt"><?php the_excerpt(); ?></div>
                    <a class="view-product" href="<?php the_permalink(); ?>">View Product</a>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p class="empty-state">No products found. <a href="<?php echo esc_url(admin_url('post-new.php?post_type=product')); ?>">Add your first product</a>.</p>
    <?php endif; ?>

    <section class="cta-section">
        <h2>Need help choosing the right product?</h2>
        <p>Use the contact page if you want help picking the best template, guide, or design asset for your project.</p>
        <div class="cta-buttons">
            <a href="<?php echo esc_url($contact_url); ?>" class="cta-button">Contact Us</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>

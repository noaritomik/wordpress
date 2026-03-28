<?php
get_header();

$product_archive_url = get_post_type_archive_link('product');
$product_count = wp_count_posts('product');
$featured_categories = get_terms(array(
    'taxonomy' => 'product_category',
    'hide_empty' => true,
    'number' => 4,
));
?>

<main class="container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="hero">
            <p class="eyebrow">Digital resources for creators, studios, and growing brands</p>
            <h1><?php the_title(); ?></h1>
            <div class="content narrow-content">
                <?php the_content(); ?>
            </div>
            <div class="cta-buttons">
                <a href="<?php echo esc_url($product_archive_url); ?>" class="cta-button">Browse Products</a>
                <a href="#products" class="cta-button secondary">See Latest Releases</a>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <section class="metrics-strip">
        <div class="stat-item">
            <h3><?php echo esc_html((string) (($product_count->publish ?? 0))); ?>+</h3>
            <p>Live products in the catalog</p>
        </div>
        <div class="stat-item">
            <h3><?php echo esc_html((string) wp_count_terms(array('taxonomy' => 'product_category', 'hide_empty' => true))); ?></h3>
            <p>Organized product categories</p>
        </div>
        <div class="stat-item">
            <h3>24/7</h3>
            <p>Access to your digital downloads</p>
        </div>
    </section>

    <?php if ($featured_categories && !is_wp_error($featured_categories)) : ?>
        <section class="products-section">
            <h2>Shop by Category</h2>
            <p class="section-intro">Explore the product library by category to find templates, guides, and design assets faster.</p>
            <div class="services-grid">
                <?php foreach ($featured_categories as $category) : ?>
                    <article class="service-card">
                        <div class="service-icon">#</div>
                        <h3><?php echo esc_html($category->name); ?></h3>
                        <p><?php echo esc_html($category->description ? $category->description : 'Curated digital resources ready for your next project.'); ?></p>
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="service-link">Browse Category</a>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <section id="products" class="products-section">
        <h2>Latest Products</h2>
        <p class="section-intro">Fresh additions to the store, selected to help you build, launch, and present your work more effectively.</p>

        <?php
        $products = new WP_Query(array(
            'post_type' => 'product',
            'posts_per_page' => 6,
            'orderby' => 'date',
            'order' => 'DESC',
        ));

        if ($products->have_posts()) : ?>
            <div class="products-grid">
                <?php while ($products->have_posts()) : $products->the_post(); ?>
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
            <div class="view-all">
                <a href="<?php echo esc_url($product_archive_url); ?>" class="cta-button">View All Products</a>
            </div>
        <?php else : ?>
            <p class="empty-state">No products found. <a href="<?php echo esc_url(admin_url('post-new.php?post_type=product')); ?>">Add your first product</a>.</p>
        <?php endif; wp_reset_postdata(); ?>
    </section>

    <section class="cta-section">
        <h2>Need a faster way to launch your next project?</h2>
        <p>Use the ready-made templates, UI kits, and guides in the store to cut production time and keep your work consistent.</p>
        <div class="cta-buttons">
            <a href="<?php echo esc_url($product_archive_url); ?>" class="cta-button">Explore the Catalog</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>

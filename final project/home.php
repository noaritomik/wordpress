<?php get_header(); ?>

<main class="container">

    <section class="hero">
        <h1>Welcome to <?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
        <a href="#products" class="cta-button">Browse Products</a>
    </section>

    <section id="products" class="products-section">
        <h2>Latest Products</h2>

        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 6,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $products = new WP_Query($args);

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
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <div class="product-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a class="view-product" href="<?php the_permalink(); ?>">
                            View Product →
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="view-all">
                <a href="<?php echo get_post_type_archive_link('product'); ?>" class="cta-button">View All Products</a>
            </div>
        <?php else : ?>
            <p>No products found. <a href="<?php echo admin_url('post-new.php?post_type=product'); ?>">Add your first product</a>.</p>
        <?php endif; wp_reset_postdata(); ?>
    </section>

</main>

<?php get_footer(); ?>
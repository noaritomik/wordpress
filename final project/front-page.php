<?php get_header(); ?>

<main class="container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="hero">
            <h1><?php the_title(); ?></h1>
            <div class="content">
                <?php the_content(); ?>
            </div>
            <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="cta-button">Browse Products</a>
        </section>
    <?php endwhile; endif; ?>

    <section id="products" class="products-section">
        <h2>Latest Products</h2>

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
                        <a class="view-product" href="<?php the_permalink(); ?>">View Product -></a>
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="view-all">
                <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="cta-button">View All Products</a>
            </div>
        <?php else : ?>
            <p>No products found. <a href="<?php echo esc_url(admin_url('post-new.php?post_type=product')); ?>">Add your first product</a>.</p>
        <?php endif; wp_reset_postdata(); ?>
    </section>

</main>

<?php get_footer(); ?>

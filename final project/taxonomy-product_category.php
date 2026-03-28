<?php get_header(); ?>

<main class="container">

    <header class="archive-header">
        <h1><?php single_term_title(); ?></h1>
        <?php
        $description = term_description();
        if ($description) {
            echo '<p>' . wp_kses_post($description) . '</p>';
        }
        ?>
    </header>

    <p>
        <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>"><- View all products</a>
    </p>

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
                    <a class="view-product" href="<?php the_permalink(); ?>">View Product -></a>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p>No products found in this category.</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>

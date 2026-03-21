<?php get_header(); ?>

<main class="container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="single-product">
            <?php if (has_post_thumbnail()) : ?>
                <div class="product-hero">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="product-content">
                <h1><?php the_title(); ?></h1>

                <div class="product-meta">
                    <?php
                    $categories = get_the_terms(get_the_ID(), 'product_category');
                    if ($categories && !is_wp_error($categories)) :
                        $category_names = array();
                        foreach ($categories as $category) {
                            $category_names[] = '<a href="' . get_term_link($category) . '">' . $category->name . '</a>';
                        }
                        echo '<p class="product-categories">Categories: ' . implode(', ', $category_names) . '</p>';
                    endif;
                    ?>
                </div>

                <div class="product-description">
                    <?php the_content(); ?>
                </div>

                <div class="product-actions">
                    <a href="#" class="cta-button download-button">Download Now</a>
                    <a href="<?php echo get_post_type_archive_link('product'); ?>" class="back-link">← Back to Products</a>
                </div>
            </div>
        </article>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
<?php
get_header();

$archive_url = get_post_type_archive_link('product');
$contact_page = get_page_by_path('contact');
$contact_url = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
?>

<main class="container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        $download_url = get_post_meta(get_the_ID(), 'download_url', true);
        $download_link = $download_url ? $download_url : $contact_url;
        $categories = get_the_terms(get_the_ID(), 'product_category');
        ?>

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
                    if ($categories && !is_wp_error($categories)) :
                        $category_names = array();
                        foreach ($categories as $category) {
                            $category_names[] = '<a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>';
                        }
                        echo '<p class="product-categories">Categories: ' . implode(', ', $category_names) . '</p>';
                    endif;
                    ?>
                </div>

                <div class="product-description">
                    <?php if (has_excerpt()) : ?>
                        <p class="section-intro"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php endif; ?>
                    <?php the_content(); ?>
                </div>

                <div class="product-actions">
                    <a href="<?php echo esc_url($download_link); ?>" class="cta-button download-button"><?php echo $download_url ? 'Download Now' : 'Request This Product'; ?></a>
                    <a href="<?php echo esc_url($archive_url); ?>" class="back-link">Back to Products</a>
                </div>
            </div>
        </article>

        <?php
        $related_args = array(
            'post_type' => 'product',
            'posts_per_page' => 3,
            'post__not_in' => array(get_the_ID()),
        );

        if ($categories && !is_wp_error($categories)) {
            $related_args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_category',
                    'field' => 'term_id',
                    'terms' => wp_list_pluck($categories, 'term_id'),
                ),
            );
        }

        $related_products = new WP_Query($related_args);
        ?>

        <?php if ($related_products->have_posts()) : ?>
            <section class="products-section">
                <h2>Related Products</h2>
                <div class="products-grid">
                    <?php while ($related_products->have_posts()) : $related_products->the_post(); ?>
                        <article class="product-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="product-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('product_thumb'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="product-excerpt"><?php the_excerpt(); ?></div>
                            <a class="view-product" href="<?php the_permalink(); ?>">View Product</a>
                        </article>
                    <?php endwhile; ?>
                </div>
            </section>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>

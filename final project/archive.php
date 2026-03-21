<?php get_header(); ?>

<main class="container">

    <header class="archive-header">
        <h1><?php post_type_archive_title(); ?></h1>
        <?php
        $description = get_the_archive_description();
        if ($description) {
            echo '<p>' . $description . '</p>';
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
                <li><a href="<?php echo get_post_type_archive_link('product'); ?>" class="<?php echo !is_tax() ? 'active' : ''; ?>">All Products</a></li>
                <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="<?php echo get_term_link($category); ?>" class="<?php echo is_tax('product_category', $category->term_id) ? 'active' : ''; ?>">
                            <?php echo $category->name; ?> (<?php echo $category->count; ?>)
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
        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p>No products found. <a href="<?php echo admin_url('post-new.php?post_type=product'); ?>">Add your first product</a>.</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
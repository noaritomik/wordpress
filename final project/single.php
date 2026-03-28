<?php
get_header();

$blog_page_id = (int) get_option('page_for_posts');
$blog_url = $blog_page_id ? get_permalink($blog_page_id) : home_url('/blog/');
?>

<main class="container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="single-post-shell">
            <header class="single-post-header">
                <p class="eyebrow">Blog Post</p>
                <h1><?php the_title(); ?></h1>
                <div class="post-meta-row">
                    <span><?php echo esc_html(get_the_date()); ?></span>
                    <span>By <?php the_author(); ?></span>
                    <span><?php the_category(', '); ?></span>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-hero">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="post-content-wrap">
                <div class="post-content-body">
                    <?php the_content(); ?>
                </div>

                <div class="post-footer-meta">
                    <p><strong>Tags:</strong> <?php echo get_the_tag_list('', ', ', '') ? wp_kses_post(get_the_tag_list('', ', ', '')) : 'No tags'; ?></p>
                </div>

                <div class="product-actions">
                    <a href="<?php echo esc_url($blog_url); ?>" class="back-link">Back to Blog</a>
                </div>
            </div>
        </article>

        <?php
        $related_posts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post__not_in' => array(get_the_ID()),
            'ignore_sticky_posts' => true,
            'category__in' => wp_get_post_categories(get_the_ID()),
        ));
        ?>

        <?php if ($related_posts->have_posts()) : ?>
            <section class="products-section">
                <h2>Related Articles</h2>
                <div class="posts-grid blog-grid">
                    <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                        <article class="post-card blog-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <p class="post-meta-chip"><?php echo esc_html(get_the_date()); ?></p>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="excerpt"><?php the_excerpt(); ?></div>
                            <a class="read-more" href="<?php the_permalink(); ?>">Read Article</a>
                        </article>
                    <?php endwhile; ?>
                </div>
            </section>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
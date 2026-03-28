<?php
/*
Template Name: Blog
*/
get_header();

$paged = max(1, get_query_var('paged'), get_query_var('page'));
$blog_query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => $paged,
    'ignore_sticky_posts' => true,
));
?>

<main class="container">

    <header class="archive-header blog-header">
        <p class="eyebrow">Blog</p>
        <h1><?php the_title(); ?></h1>
        <div class="content narrow-content">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </header>

    <?php if ($blog_query->have_posts()) : ?>
        <div class="posts-grid blog-grid">
            <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                <article class="post-card blog-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <p class="post-meta-chip"><?php echo esc_html(get_the_date()); ?></p>
                    <h2>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="excerpt"><?php the_excerpt(); ?></div>
                    <a class="read-more" href="<?php the_permalink(); ?>">Read Article</a>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $blog_query->max_num_pages,
                'current' => $paged,
            ));
            ?>
        </div>
    <?php else : ?>
        <p class="empty-state">No blog posts found yet.</p>
    <?php endif; wp_reset_postdata(); ?>

</main>

<?php get_footer(); ?>

<?php get_header(); ?>

<main class="container">

    <header class="archive-header blog-header">
        <p class="eyebrow">Latest content</p>
        <h1>Latest Content</h1>
        <p>Browse the newest articles, updates, and published entries from across the site.</p>
    </header>

    <?php if (have_posts()) : ?>
        <div class="posts-grid blog-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article class="post-card blog-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <p class="post-meta-chip"><?php echo esc_html(get_the_date()); ?></p>
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div class="excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a class="read-more" href="<?php the_permalink(); ?>">Read Article</a>
                </article>
            <?php endwhile; ?>
        </div>
        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>

        <p class="empty-state">No content found.</p>

    <?php endif; ?>

</main>

<?php get_footer(); ?>
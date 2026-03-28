<?php get_header(); ?>

<main class="container">

    <header class="archive-header">
        <h1>Search Results</h1>
        <p>Showing results for: <strong><?php echo esc_html(get_search_query()); ?></strong></p>
    </header>

    <?php if (have_posts()) : ?>
        <div class="posts-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article class="post-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <h2>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <div class="excerpt"><?php the_excerpt(); ?></div>

                    <a class="read-more" href="<?php the_permalink(); ?>">Read More -></a>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p>No results found. Try a different keyword.</p>
        <?php get_search_form(); ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>

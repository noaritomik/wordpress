<?php get_header(); ?>

<main class="container">

    <h1>Latest Content</h1>

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
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div class="excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a class="read-more" href="<?php the_permalink(); ?>">
                        View Details →
                    </a>
                </article>
            <?php endwhile; ?>
        </div>
        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>

        <p>No content found.</p>

    <?php endif; ?>

</main>

<?php get_footer(); ?>
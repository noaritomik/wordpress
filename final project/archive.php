<?php get_header(); ?>

<main class="container">

    <header class="archive-header blog-header">
        <p class="eyebrow">Archive</p>
        <h1><?php the_archive_title(); ?></h1>
        <?php
        $description = get_the_archive_description();
        if ($description) {
            echo '<p>' . wp_kses_post($description) . '</p>';
        } else {
            echo '<p>Browse archived posts and entries from this section of the site.</p>';
        }
        ?>
    </header>

    <?php if (have_posts()) : ?>
        <div class="posts-grid blog-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article class="post-card blog-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large'); ?>
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
        <p class="empty-state">No content found in this archive.</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
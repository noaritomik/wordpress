<?php get_header(); ?>

<main class="container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="archive-header">
            <h1><?php the_title(); ?></h1>

            <?php if (has_excerpt()) : ?>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
            <?php endif; ?>
        </section>

        <article class="page-shell">
            <div class="content page-content">
                <?php the_content(); ?>
            </div>
        </article>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
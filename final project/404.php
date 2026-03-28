<?php get_header(); ?>

<main class="container">

    <section class="not-found">
        <h1>Page not found</h1>
        <p>The page you are looking for does not exist or has been moved.</p>

        <p>
            <a class="cta-button" href="<?php echo esc_url(home_url('/')); ?>">Back to Home</a>
        </p>

        <?php get_search_form(); ?>
    </section>

</main>

<?php get_footer(); ?>

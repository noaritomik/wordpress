<?php get_header(); ?>

<main>
<?php if (have_posts()): while(have_posts()): the_posts();?>
    <h2><?php the_title();?></h2>
    <?php the_content(); ?>
    <?php endwhile; else: ?>
        <p>No posts found</p>
    
    <?php endif; ?>
    

    <?php get_footer(); ?>

    

</main>    
<?php get_header();?>

<main class="single-post">
    <?php if (have_posts()) : while(have_posts()):the_post();?>
    <article <?php post_class('post-card');?>>
        <?php if(has_post_thumbnail());?>
        <div class='post-thumb'>
            <?php the_post_thumbnail('large');?>
        </div>
        <?php endif;?>
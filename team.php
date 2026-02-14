<?php
/* Template Name: Team(Posts Category)*/
get_header()?>

<main class="team-page section-pad">
    <header class="team-intro">
        <h1 id="heading"><?php the_title();?></h1>
    </header>

<?php
    $team = new Wp_Query([
        'post_type' => 'post',
        'posts_per_page' => -1,
        'category_name' => 'team'
        'orderby' => 'title'
        'order' => "ASC"
    ])
?>

<?php if($team->have_posts()):?>
    <ul class = 'team-grid'>
        <?php while($team ->have_posts()):$team ->the_post();
        $role = get_field('role');
        $shortbio = get_field('short_bio');
        $email = get_field('email');
        $linkedin = get_Field('linkedin');?>

        <li class='team-card'>
            <div class = 'team-photo'>
                    <?php if(has_post_thumbnail()){
                        the_post_thumbnail('team_avatar',['alt'=>get_the_title()]);

                    }?>
            </div>

            <div class = 'team-info'>
                <h3 class='team-name'>
                    <?php the_title();?>
                </h3>
<?php if($role);?><p class='team-role'><?php echo esc_html($role);?></p><?php endif;?>
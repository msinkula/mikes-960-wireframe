<?php get_header(); ?>

<!-- Begin Single (New) Production -->
<div id="content">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<article class="post" id="post-<?php the_ID(); ?>">
    <h1><?php the_title(); ?></h1>
    <?php the_post_thumbnail('large'); ?>
    <?php the_content(''); ?>    
</article>
<?php endwhile; ?>
<?php endif; ?>
</div>
<!-- Begin Single (New) Production -->

<?php get_footer();?>
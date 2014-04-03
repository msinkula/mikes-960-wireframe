<?php get_header(); ?>

<!-- BEGIN CONTENT -->
<div id="content">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<article class="post" id="post-<?php the_ID(); ?>">
<?php add_memberprofile(); ?>    
</article>
<?php endwhile; ?>
<?php endif; ?>
<small>single-staff-member.php</small>
</div>
<!-- END CONTENT -->

<?php get_footer();?>
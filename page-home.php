<?php get_header(); ?>

<!-- Begin Spotlight -->
<div id="spotlight">
<?php add_flexslider(); ?>
</div>
<!-- End Spotlight -->

<!-- Begin Content -->
<div id="content">
<?php query_posts('showposts=5'); // show 5 latest posts ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	<article class="post-box" id="post-box-<?php the_ID(); ?>">
    <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    <p class="postdata">Posted on <?php the_time('M j, Y') ?> in <?php the_category(', ') ?></p>
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail(array(130,130)); ?></a>
    <?php the_excerpt(); ?>
    <p class="full-story"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Full Story &raquo;</a></p>
    </article>
<?php endwhile; ?>
<?php endif; ?>
<nav class="post-navigation">
    <span class="post-navigation-previous"><?php previous_posts_link('&laquo; Newer Postings'); ?></span>
    <span class="post-navigation-next"><?php next_posts_link('Older Postings &raquo;'); ?></span>
</nav>
</div>
<!-- End Content -->

<?php get_footer();?>
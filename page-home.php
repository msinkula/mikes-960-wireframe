<?php /* Template Name: Home Page */ ?>

<?php get_header(); ?>

<!-- Begin Spotlight -->
<div id="spotlight">
<?php add_flexslider(); ?>
</div>
<!-- End Spotlight -->

<!-- Begin Content -->
<div id="content">

	<!-- Begin Content Loop -->
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <?php the_content(''); ?>
    <?php endwhile; ?>
    <?php endif; ?>
    <!-- End Content Loop -->

    <!-- Begin News Loop -->
    <?php rewind_posts(); // stop loop one ?>
    <?php query_posts('showposts=5'); // show 5 latest posts ?>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article class="post-box" id="post-box-<?php the_ID(); ?>">
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <p class="postdata">Posted on <?php the_time('M j, Y') ?> in <?php the_category(', ') ?></p>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
            <?php the_excerpt(); ?>
            <p class="full-story"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Full Story &raquo;</a></p>
        </article>
    <?php endwhile; ?>
    <?php endif; ?>
    <!-- End News Loop -->

</div>
<!-- End Content -->

<?php get_footer();?>
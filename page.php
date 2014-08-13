<?php get_header(); ?>

<!-- Begin Content -->
<div id="content" class="page-<?php the_ID(); ?>">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	<article class="page" id="post-<?php the_ID(); ?>">
    <h1><?php the_title(); ?></h1>
    <?php the_post_thumbnail('large'); ?>
    <?php the_content(); ?>
	</article>
<?php endwhile; ?>
<?php endif; ?>

<!-- Begin Page Excerpt -->
<?php $page_excerpts = array('post_type' => 'page','numberposts' => -1,'post_status' => null,'post_parent' => $post->ID,'order' => ASC,'orderby' => 'menu_order'); $child_pages = get_posts($page_excerpts); ?>
<?php foreach ($child_pages as $post) : setup_postdata($post); ?>
    <article class="page-excerpt" id="page-excerpt-<?php the_ID(); ?>">
    <h2><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></h2>
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
    <?php the_excerpt(); // get child page excerpts ?>
    <p class="full-story"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read More &raquo;</a></p>
    </article>
<?php endforeach; ?> 
<!-- End Page Excerpt -->

</div>
<!-- End Content -->

<?php get_footer();?>
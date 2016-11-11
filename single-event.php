<?php get_header(); ?>

<!-- Begin Single (New) Production -->
<div id="content">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<article class="post" id="post-<?php the_ID(); ?>">
    <h1><?php the_title(); ?></h1>
    <?php 
    // Gets the event start month from the meta field
    $start_month = get_post_meta( $post->ID, '_start_month', true );
    // Gets the event start day
    $start_day = get_post_meta( $post->ID, '_start_day', true );
    // Gets the event start year
    $start_year = get_post_meta( $post->ID, '_start_year', true );
    // Gets the event end month from the meta field
    $end_month = get_post_meta( $post->ID, '_end_month', true );
    // Gets the event start day
    $end_day = get_post_meta( $post->ID, '_end_day', true );
    // Gets the event start year
    $end_year = get_post_meta( $post->ID, '_end_year', true );
    // Gets the even location
    $location = get_post_meta( $post->ID, '_event_location', true );
    ?>
    <p><strong>Date:</strong>&nbsp;<?php echo $start_month . '/' . $start_day . '/' . $start_year; ?> to <?php echo $end_month . '/' . $end_day . '/' . $end_year; ?> </p>
    <p><strong>Location:</strong>&nbsp;<?php echo $location; ?></p>
    <?php the_post_thumbnail('large'); ?>
    <?php the_content(''); ?> 
    <small>single-event.php</small>
</article>
<?php endwhile; ?>
<?php endif; ?>
</div>

<!-- Begin Single (New) Production -->

<?php get_footer();?>
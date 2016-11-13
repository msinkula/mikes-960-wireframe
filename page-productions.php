<?php /* Template Name: Productions Page */ ?>

<?php get_header(); ?>

<!-- Begin Content -->
<div id="content" class="page-<?php the_ID(); ?>">   
    
    <!-- Begin Productions Loop -->
    <?php rewind_posts(); // stop loop one ?>
    <?php query_posts('post_type=event'); // show productions ?>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article class="post-box" id="post-box-<?php the_ID(); ?>">
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <?php 
            // Gets the event start month from the meta field
            $start_month = get_post_meta( $post->ID, '_start_month', true );
            // Gets the event start day
            $start_day = get_post_meta( $post->ID, '_start_day', true );
            // Gets the event start year
            $start_year = get_post_meta( $post->ID, '_start_year', true );
            // Gets the event end month from the meta field
            $end_month = get_post_meta( $post->ID, '_end_month', true );
            // Gets the event end day
            $end_day = get_post_meta( $post->ID, '_end_day', true );
            // Gets the event end year
            $end_year = get_post_meta( $post->ID, '_end_year', true );
            // Gets the even location
            $location = get_post_meta( $post->ID, '_event_location', true );
            ?>
            <p><strong>Date:</strong>&nbsp;<?php echo $start_month . '/' . $start_day . '/' . $start_year; ?> to <?php echo $end_month . '/' . $end_day . '/' . $end_year; ?><br><strong>Location:</strong>&nbsp;<?php echo $location;?></p>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
            <p><?php echo get_the_excerpt(); ?>&nbsp;<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><em>Full Story &raquo;</em></a></p>

        </article>
    <?php endwhile; ?>
    <?php endif; ?>
    <!-- End Productions Loop --> 
    
    <small>page-productions.php</small>
    
</div>
<!-- End Content -->

<?php get_footer();?>
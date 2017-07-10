<?php

// Register Sidebar
register_sidebars(array(
	'name' => 'sidebar',
	'description' => 'Widgets in this area will be shown in the side bar.',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>'
	));

// Register Menus
function register_my_menus() {
  register_nav_menus(array('main-menu' => __( 'Main Menu' ), 'footer-menu' => __( 'Footer Menu')));
}
add_action( 'init', 'register_my_menus' );
//

// Custom Post Type for Productions
/* function create_productions_post_type() {
    
    register_post_type( 'productions', array(
        'labels' => array(
        'name' => __( 'Productions' ),
        'singular_name' => __( 'Production' )
        ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),

        'has_archive' => true,
        'rewrite' => array('slug' => 'productionz') , // slug name must be different than post type name ?
        )
    );
    
}
add_action( 'init', 'create_productions_post_type' );
*/
//

// Create Page Excerpts
add_post_type_support( 'page', 'excerpt' );

// create thumbnails for excerpts using the featured image
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );	}
	
// display attachment images as a flexslider gallery
function add_flexslider() { 
	
	$attachments = get_children(array('post_parent' => get_the_ID(), 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'attachment', 'post_mime_type' => 'image', ));
	
	if ($attachments) { // see if there are images attached to posting ?>
        
    <!-- Begin Slider --> 
    <div class="flexslider">
    <ul class="slides">
    
    <?php // create the list items for images with captions
    
    foreach ( $attachments as $attachment ) { 
	
		$theImage = wp_get_attachment_image($attachment->ID, 'full');
		$theBlockquote = get_post_field('post_excerpt', $attachment->ID);
		$theLink = get_post_field('post_content', $attachment->ID);
	
        echo '<li>';
		
        	echo $theImage;
			echo '<blockquote class="home">&ldquo;'.$theBlockquote.'&rdquo;</blockquote>';
      
        echo '</li>';
        
    } ?>
    
    </ul>
    </div>
    <!-- End Slider -->
        
	<?php } // end see if images
	
} // end add flexslider

?>
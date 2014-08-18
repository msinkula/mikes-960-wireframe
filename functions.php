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
	
// Show Gravatar in Comments	
function show_avatar($comment, $size) {				
	 $email=strtolower(trim($comment->comment_author_email));
	 $rating = "G"; // [G | PG | R | X]
	 
	if (function_exists('get_avatar')) {
      echo get_avatar($email, $size);
   	} 
   	else {
      
      $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=
         " . md5($emaill) . "&size=" . $size."&rating=".$rating;
      echo "<img src='$grav_url'/>";
   	}		
}

// Create Page Excerpts
add_post_type_support( 'page', 'excerpt' );

// create thumbnails for excerpts using the featured image
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );	}
	
// display attachment images as a flexslider gallery
function add_flexslider() { 
	
	$attachments = get_children(array('post_parent' => get_the_ID(), 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'attachment', 'post_mime_type' => 'image','caption' => $attachment->post_excerpt, 'description' => $attachment->post_content, ));
	
	if ($attachments) { // see if there are images attached to posting ?>
        
    <!-- Begin Slider --> 
    <div class="flexslider">
    <ul class="slides">
    
    <?php // create the list items for images with captions
    
    foreach ( $attachments as $attachment_id => $attachment ) { 
	
		$theImage = wp_get_attachment_image($attachment_id, 'full');
		$theBlockquote = get_post_field('post_excerpt', $attachment->ID);
		$theLink = get_post_field('post_content', $attachment->ID);
    
		/*$key = "buy-tickets-button";
		$value = get_post_meta($post->ID, $key, true);*/
	
        echo '<li>';
		
		if (is_page('Home')) { // use full size image for home page
			
        	echo $theImage;
			echo '<blockquote class="home">&ldquo;'.$theBlockquote.'&rdquo;</blockquote>';
			echo '<a href="'.$theLink.'"><button class="home">Learn More&nbsp;&raquo;</button></a>';
			
		}
		
		else { // use large size image for all other pages & posts
			
			echo wp_get_attachment_image($attachment_id, 'large');
			echo '<p>';
			echo get_post_field('post_excerpt', $attachment->ID);
			echo '</p>';
			
			/*if (!empty($value)) {
	
			echo '<a href="'.$value.'"><button class="buy-tickets">Buy Tickets&nbsp;&raquo;</button></a>';

			}*/
			
		}
      
        echo '</li>';
        
    } ?>
    
    </ul>
    </div>
    <!-- End Slider -->
        
	<?php } // end see if images
	
} // end add flexslider
		
	
// add the staff member profile for single view
function add_memberprofile() {
	
	$theme_url = get_template_directory_uri();
	$custom = get_post_custom();
	$name = get_the_title();
	$name_slug = basename(get_permalink());
	$photo_url = wp_get_attachment_url(get_post_thumbnail_id());
	$title = $custom["_staff_member_title"][0];
	$email = $custom["_staff_member_email"][0];
	$phone = $custom["_staff_member_phone"][0];
	$bio = $custom["_staff_member_bio"][0];
	$fb_url	= $custom["_staff_member_fb"][0];
	$tw_url	= $custom["_staff_member_tw"][0];

	if (!empty($photo_url)) { // image
		echo '<img class="staff-member-photo" src="'.$photo_url.'" alt = "'.$name.'">';
	}
	
	if (!empty($name)) { // name
		echo '<h1>'.$name.'</h1>';
	}
	
	if (!empty($email)) { // email
		echo '<p><a href="mailto:'.$email.'">'.$email.'</a></p>';
	}
	
	if (!empty($phone)) { // phone
		echo '<p>'.$phone.'</p>';
	}
	
	if (!empty($fb_url)) { // facebook
		echo '<a href="'.$fb_url.'" target="_blank"><img class="staff-icon-social" src="'.$theme_url.'/images/img-facebook.png" alt = "'.$name.'"></a>'; 
	}
	
	if (!empty($tw_url)) { // twitter 
		echo '<a href="'.$tw_url.'" target="_blank"><img class="staff-icon-social" src="'.$theme_url.'/images/img-twitter.png" alt = "'.$name.'"></a>'; 
	}
	
	if (!empty($bio)) { // bio
		echo '<section class="staff-bio">'.$bio.'</section>';
	}
	
} // end add the staff member profile for single view


// get buy tickets button for shows pages
/*function get_buy_tickets_button() {

	$key = "buy-tickets-button";
	$value = get_post_meta($post->ID, $key, true);

	if (!empty($value)) {
	
	echo '<a href="'.$value.'"><button class="buy-tickets">Buy Tickets&nbsp;&raquo;</button></a>';

	}	
	
}*/ // end get buy tickets button for shows pages

// add the meta box for Staff Members
function admin_init(){

	add_meta_box("staff_member_parent_id", "Staff Member Parent ID", "set_staff_member_parent_id", "staff-member", "normal", "low");

}

	add_action("admin_init", "admin_init");

	function set_staff_member_parent_id() { // set the parent ID for Staff Member profiles

		global $post;
		$custom = get_post_custom($post->ID);
		$parent_id = $custom['parent_id'][0];
		
		echo '<p>The number 2 below specifies that all Staff Members will be in the About Us section of the website. DO NOT CHANGE IT!</p>'; // message to user to not change this fucking thing
		echo '<input type="text" id="parent_id" name="parent_id" value="2" />'; // creates the value of 2 for the about us section
		echo '<input type="hidden" name="parent_id_noncename" value="' . wp_create_nonce(__FILE__) . '" />'; // create a custom nonce for submit verification later
		
	}
	
	function save_staff_member_parent_id($post_id) { // save the meta data
	
	global $post;
	
		if (!wp_verify_nonce($_POST['parent_id_noncename'],__FILE__)) return $post_id;
		
		if (isset($_POST['parent_id']) && ($_POST['post_type'] == "staff-member")) {
			$data = $_POST['parent_id'];
			update_post_meta($post_id, 'parent_id', $data);
		}
	}
	
	add_action("save_post", "save_staff_member_parent_id");

// end add the meta box for Staff Members
?>
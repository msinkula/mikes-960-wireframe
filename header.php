<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php if (is_front_page() || is_home() || is_archive()) { bloginfo('description'); } elseif ( is_single() || is_page()) { the_title(); } if ( is_page() && $post->post_parent ) { $parent_title = get_the_title($post->post_parent); echo ' | '; echo $parent_title; } echo ' | '; bloginfo('name'); ?> | Seattle, WA.</title>

<!-- Begin Meta -->
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<!-- End Meta -->

<!-- Begin Meta for Facebook -->
<meta property="og:title" content="<?php the_title(); ?>"/>
<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
<meta property="og:url" content="<?php the_permalink(); ?>"/>
<?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumbnail'); ?>
<?php if ($fb_image) : ?>
<meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
<?php endif; ?>
<meta property="og:type" content="<?php if (is_single() || is_page()) { echo "article"; } else { echo "website";} ?>"
/>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<!-- End Meta for Facebook -->

<!-- Begin Links -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/ico-poop.png" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/flexslider.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/calendar.css" type="text/css" media="all" />
<!-- End Links -->

<!-- Begin Scripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/toggle.js"></script>
<!-- End Scripts -->

<!-- Begin Flex Slider -->
<script type="text/javascript">
    
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "fade",
		slideshow: true,
      });
    });
	
</script>
<!-- End Flex Slider -->

<!-- Begin WP Head Function -->
<?php wp_head(); ?>
<!-- End WP Head Function -->

</head>

<body class="<?php if (is_page('Home')) { echo 'home'; } elseif (is_page()) { echo 'pages'; } elseif ( is_home() || is_single() || is_archive()) { echo 'postings';} ?>">

<!-- Begin Header -->
<div id="header">

	<!-- Begin Logo -->
    <div id="logo">
    <a href="<?php echo get_settings('home'); ?>" title="Wireframe's Home Page"><img src="<?php bloginfo('template_directory'); ?>/images/FPO-logo.png" alt="Wireframe" /></a>
  </div>
	<!-- End Logo -->
    
    <!-- Begin Tchotchkes -->
    <div id="tchotchkes">
        
        <!-- Begin Download Notice -->
        <div id="notice">
        <p><a href="https://github.com/msinkula/mikes-960-wireframe/archive/master.zip">Download this theme!</a></p>
        </div>
        <!-- End Download Notice -->
    
    </div>
    <!-- End Tchotchkes -->
</div>
<!-- End Header -->

<!-- Begin Main Menu -->
<div id="menu-main">
<h4 id="menu-main-title"><a href="#">Menu<span class="icon"><img src="<?php bloginfo('template_directory'); ?>/images/img-mobile.png" /></span></a></h4>
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?></div>
<!-- End Main Menu --> 

<!-- Begin Middle -->
<div id="middle">

<!-- Begin Breadcrumbs -->
<div id="breadcrumbs">
<?php if ( !is_page('Home') ) { if (function_exists('bcn_display')) { bcn_display(); } } ?></div>
<!-- End Breadcrumbs -->

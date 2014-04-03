<!-- Begin Sidebar -->
<div id="sidebar" class="page-<?php the_ID(); ?>">

	<!-- Begin Sub Pages -->
	<?php if ( !is_404() ) { if ( !is_search() ) { 
	
        if ($post->post_parent) { // if has post parent 
			
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0" ); 
			$parent_link = get_permalink($post->post_parent); 
			$parent_title = get_the_title($post->post_parent);
		
		} // end if has post parent 
		
        if ($children) { // if children ?>
        
        	<h2 class="sub-menu-title"><a href="<?php echo $parent_link; ?>"><?php  echo $parent_title; ?></a>:</h2>
        	<ul class="sub-menu">
        	<?php echo $children; ?>
        	</ul>
            
		<?php } // end if children ?>   
 
    <?php } } ?>	
    <!-- End Sub Pages -->
    
    <!-- Begin Blog Categories -->
    <?php 
	
	if (!('staff-member' == get_post_type())) { // if is not the staff memeber custom post type
		
		if ( is_home() || is_single() || is_archive() ) { ?> 
		<h2 class="sub-menu-title">Blog:</h2>
		<ul class="sub-menu">
		<?php wp_list_categories('exclude=&title_li='); ?>
		</ul>
    	<?php } 
	
	} ?>
    <!-- End Blog Categories -->
    
    <!-- Begin Dynamic Sidebar -->
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) : else : ?>					
    <?php endif; ?>
    <!-- End Dynamic Sidebar -->
    
    <!-- Begin Donate Link -->
    <div id="donate">
    <a href="../donate/"><button>Donate&nbsp;&raquo;</button></a>
    </div>
    <!-- End Tickets Link -->
    
</div>
<!-- End Sidebar -->
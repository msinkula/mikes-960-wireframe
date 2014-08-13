<!-- Begin Sidebar -->
<div id="sidebar" class="page-<?php the_ID(); ?>">

	<!-- Begin Sub Pages -->
	<?php  
	
        if ($post->post_parent) { // if has post parent 
			
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0" ); 
			$parent_link = get_permalink($post->post_parent); 
			$parent_title = get_the_title($post->post_parent);
		
			if ($children) { // if children ?>
			
				<h2 class="sub-menu-title"><a href="<?php echo $parent_link; ?>"><?php  echo $parent_title; ?></a>:</h2>
				<ul class="sub-menu">
				<?php echo $children; ?>
				</ul>
				
			<?php } // end if children
		
		} // end if has post parent    
 
    ?>	
    <!-- End Sub Pages -->
    
    <!-- Begin Blog Categories -->
    <?php 
	
	if ( is_home() || is_single() || is_archive() ) { ?> 
        <h2 class="sub-menu-title">Blog:</h2>
        <ul class="sub-menu">
        <?php wp_list_categories('exclude=&title_li='); ?>
        </ul>
        
	<?php } ?>
    <!-- End Blog Categories -->
    
    <!-- Begin Dynamic Sidebar -->
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) : else : ?>					
    <?php endif; ?>
    <!-- End Dynamic Sidebar -->
    
    
</div>
<!-- End Sidebar -->
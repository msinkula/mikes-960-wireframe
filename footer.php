<?php get_sidebar(); ?>

</div>
<!-- End Middle -->

<!-- Begin Links -->
<div id="menu-footer">
<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?></div>
</div>
<!-- End Links --> 

<!-- Begin FOOTER -->
<div id="footer">
	<p>&copy; 1970 - <?php echo date("Y"); ?> <a href="<?php get_site_url(); ?>"><?php bloginfo('name'); ?></a>. All rights reserved. <span class="alignright"><?php wp_register('','...'); ?>&nbsp;&nbsp;&nbsp;<?php wp_loginout(); ?>...</span></p>
</div>
<!-- End Footer -->

<!-- Begin Analytics -->

<!-- End Analytics -->

<!--[if lt IE 9]>
<script language="JavaScript" type="text/javascript">
alert("It appears that you are using an outdated version of Internet Explorer that does not support HTML5 or CSS3.")
</script><![endif]-->

<!-- Begin WP Footer -->
<?php wp_footer(); ?>
<!-- End WP Footer -->

</body>
</html>
<?php get_header(); ?>

<!-- START CONTENT -->
<div id="content">
<h1>404 Error:</h1>
<p>The page you are looking for does not exist... Try a search?</p>
<form method="get" class="searchform" action="<?php bloginfo('home'); ?>/">
<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" class="textfield" />
<input type="submit" name="submit" class="submit" value="Search" />
</form>
</div>
<!-- END CONTENT -->

<?php get_footer(); ?>
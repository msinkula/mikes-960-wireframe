// responsive navigation

window.onload = function() {
		
	// toggle the main menu and current sub-menu
	jQuery("#menu-main-title").click(function() { 
		jQuery(".menu-main-menu-container").slideToggle();
		return false;
	});

};

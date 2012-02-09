	<div data-role="header" >
		<h1><?php bloginfo('name'); ?></h1>
	</div>

	
<div data-role="navbar" data-iconpos="left">
		<ul>
			<li><a href="<?php bloginfo('url'); ?>" data-icon="home"><?php _e('Home') ?></a></li>
			<li><a href="<?php echo site_url().'?light_mobile_dialog_nav'; ?>" data-icon="grid" data-rel="dialog" data-inline="true" data-transition="pop"><?php _e('Nav') ?></a></li>
			<li><a href="<?php echo site_url().'?light_mobile_dialog_search'; ?>" data-icon="search" data-rel="dialog" data-inline="true" data-transition="pop"><?php _e('Search') ?></a></li>
		</ul>
	</div>

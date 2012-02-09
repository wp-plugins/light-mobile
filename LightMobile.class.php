<?php

class LightMobile{

	const HOME_PATH = "/theme/home.php";
	const SINGLE_PATH = "/theme/single.php";
	const PAGE_PATH = "/theme/page.php";
	const HEADER_PATH = "/theme/header.php";
	const ARCHIVE_PATH = "/theme/archive.php";
	const SEARCH_PATH = "/theme/search.php";
	
	/* Theme */
	
	public static function displayHeader($title = '',$hide = false){
	?>
		<html> 
			<head> 
				<title><?php echo $title ?></title> 
				
				<meta name="viewport" content="width=device-width, initial-scale=1"> 

				<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
				<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
				<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
			</head> 

			<body> 
				<div data-role="page">
				<?php if(!$hide){ ?>
				<?php include( __DIR__ . self::HEADER_PATH); ?>
				<?php } ?>
					<div data-role="content">
	<?php
	}
	
	public static function displayFooter($hide = false){
	?>
					</div>
				<?php if(!$hide){ ?>
					<div data-role="navbar">
						<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
					</div>
				<?php } ?>
				</div>
			</body>
		</html>
	<?php
	}
	
	public static function displayHome(){
	
		global $query_string;
		query_posts($query_string);
		include( __DIR__ . self::HOME_PATH);
	?>

	
	<?php
	}
	
	public static function displaySingle(){
	
		global $query_string;
		query_posts($query_string);
		if( file_exists ( __DIR__ . self::SINGLE_PATH )){
			include(__DIR__ . self::SINGLE_PATH);
		}else{
			include(__DIR__ . self::HOME_PATH);
		}
		
		
	}
	public static function displayPage(){
	
		global $query_string;
		query_posts($query_string);
		if( file_exists ( __DIR__ . self::PAGE_PATH )){
			include(__DIR__ . self::PAGE_PATH);
		}else{
			include(__DIR__ . self::HOME_PATH);
		}
		
		
	}
	public static function displayArchive(){
	
		global $query_string;
		query_posts($query_string);
		if( file_exists ( __DIR__ . self::ARCHIVE_PATH )){
			include(__DIR__ . self::ARCHIVE_PATH);
		}else{
			include(__DIR__ . self::HOME_PATH);
		}
		
		
	}
	public static function displaySearch(){
	
		global $query_string;
		query_posts($query_string);
		if( file_exists ( __DIR__ . self::SEARCH_PATH )){
			include(__DIR__ . self::SEARCH_PATH);
		}else{
			include(__DIR__ . self::HOME_PATH);
		}
		
		
	}
	
	/* Dialogs */
	public static function dialogNav(){
		LightMobile::displayHeader(__('Navigation'),true);
		?>
		<div data-role="header" data-theme="d">
			<h1><?php _e('Navigation') ?></h1>

		</div>
		<div data-role="content" data-theme="c">
			<ul data-role="listview" data-inset="true">
				<li data-role="list-divider"><?php _e('Pages') ?></li>
				<?php
				  $pages = get_pages();
				  foreach ( $pages as $pagg ) {
					$option = '<li><a href="' . $pagg->guid . '">';
					$option .= $pagg->post_title;
					$option .= '</a></li>';
					echo $option;
				  }
				?>
			</ul>
			<ul data-role="listview" data-inset="true">
				<li data-role="list-divider"><?php _e('Categories') ?></li>
				<?php
					$categories=  get_categories(); 
					foreach ($categories as $category) {
						?>
							<li><a href="<?php echo get_category_link($category->cat_ID) ?>"><?php echo $category->cat_name; ?></a></li>
						<?php
					}
				?>
			</ul>
		</div>
		<?php
		LightMobile::displayFooter(true);
	}
	public static function dialogSearch(){
		LightMobile::displayHeader(__('Search'),true);
		?>
		<div data-role="header" data-theme="d">
			<h1><?php _e('Search') ?></h1>

		</div>
		<div data-role="content" data-theme="c">
			<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div data-role="fieldcontain">
					<input type="search" data-inline="true" name="s" id="s" />
					<input type="submit" data-inline="true" name="submit" value="<?php _e( 'Search' ); ?>" />
				</div>
			</form>
		</div>
		<?php
		LightMobile::displayFooter(true);
	}
}
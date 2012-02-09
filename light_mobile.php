<?php
/**
 * @package Light_Mobile
 * @version 1.0.2
 */
/*
Plugin Name: Light Mobile
Plugin URI: 
Description: Automatically adds a mobile verion of your site
Author: Zen Mabelin
Version: 1.0.2
Author URI: http://codertalks.com/
*/
require_once('LightMobile.class.php');
function light_mobile_init(){



	$mobile_browser = 0;
	 
	if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
		$mobile_browser++;
	}
	 
	if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
		$mobile_browser++;
	}    
	 
	$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
	$mobile_agents = array(
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
		'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
		'wapr','webc','winw','winw','xda ','xda-');
	 
	if (in_array($mobile_ua,$mobile_agents)) {
		$mobile_browser++;
	}
	 
	if (isset($_SERVER['ALL_HTTP']) && strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini') > 0) {
		$mobile_browser++;
	}
	 
	if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows') > 0) {
		$mobile_browser = 0;
	}



	if($mobile_browser>0 && !is_admin()){
		LightMobile::displayHeader();
		
		if(is_page()){
			LightMobile::displaySingle();
		}
		elseif(is_single()){
			LightMobile::displaySingle();
		}elseif(is_archive()){
			LightMobile::displayArchive();
		}elseif(is_search()){
			LightMobile::displaySearch();
		}else{
			LightMobile::displayHome();
		}
		LightMobile::displayFooter();
		exit;
	}
}
function light_mobile_dialogs(){
	if(isset($_GET['light_mobile_dialog_nav'])){
		LightMobile::dialogNav();
		exit;
	}
	if(isset($_GET['light_mobile_dialog_search'])){
		LightMobile::dialogSearch();
		exit;
	}
}
add_action('wp','light_mobile_init');
add_action('init','light_mobile_dialogs');
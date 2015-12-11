<?php
/*
 * Lean Machine plugin
 *
 * @author 3lywa - Ali Al-Munayer
 *
 *
 */

elgg_register_event_handler('init', 'system', 'custompage_init');

function custompage_init() {
   
	// Register a pagehandler
	elgg_register_page_handler('custompage', 'custompage_page_handler');
	
	// Extend the main CSS
	elgg_extend_view('css/elgg', 'css/elgg/custompage.css');
	
	        $params = array(
        'name' => 'custompage',
        'href' => '/custompage',
        'title' => 'Lean Machine',
        "class" => '',
        'item_class' => '',
	'priority' => '1',
        'text' => elgg_echo('custompage:custompage')
			);
	
	// Add a menu item to the main site menu
    elgg_register_menu_item('user_menu', $params);	
}

function custompage_page_handler($page, $handler) {
	
	if (!isset($page[0])) {
		$page[0] = 'index';
	}
	
	$plugin_path = elgg_get_plugins_path();
	$pages = $plugin_path . 'custompage/pages/custompage';
		
	switch ($page[0]) {
		case 'index':
			include "$pages/index.php";
			break;
		default:
			return false;
	}
	return true;
}
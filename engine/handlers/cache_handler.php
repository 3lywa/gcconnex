<?php
/**
 * Cache handler.
 *
 * External access to cached CSS and JavaScript views. The cached file URLS
 * should be of the form: cache/<type>/<viewtype>/<name/of/view>.<unique_id>.<type> where
 * type is either css or js, view is the name of the cached view, and
 * unique_id is an identifier that is updated every time the cache is flushed.
 * The simplest way to maintain a unique identifier is to use the lastcache
 * variable in Elgg's config object.
 *
 * @see elgg_register_simplecache_view()
 *
 * @package Elgg.Core
 * @subpackage Cache
 */

 // all instances of mysql where changed to mysqli to address depricated calls with php5.5  - CdG
 
 
// Get dataroot
require_once(dirname(dirname(__FILE__)) . '/settings.php');
//$mysql_dblink = mysql_connect($CONFIG->dbhost, $CONFIG->dbuser, $CONFIG->dbpass, true);
$mysql_dblink = mysqli_connect($CONFIG->dbhost, $CONFIG->dbuser, $CONFIG->dbpass, $CONFIG->dbname);
if (!$mysql_dblink) {
	echo 'Cache error: unable to connect to database server';
	exit;
}

//if (!mysql_select_db($CONFIG->dbname, $mysql_dblink)) {
if (!mysqli_select_db($mysql_dblink, $CONFIG->dbname)) {
	echo 'Cache error: unable to connect to Elgg database';
	exit;
}

$query = "select name, value from {$CONFIG->dbprefix}datalists
		where name in ('dataroot', 'simplecache_enabled')";

$result = mysqli_query($mysql_dblink, $query);
if (!$result) {
	echo 'Cache error: unable to get the data root';
	exit;
}
//while ($row = mysql_fetch_object($result)) {
while ($row = mysqli_fetch_object($result)) {
	${$row->name} = $row->value;
}
mysqli_free_result($result);


$dirty_request = $_GET['request'];
// only alphanumeric characters plus /, ., and _ and no '..'
$filter = array("options" => array("regexp" => "/^(\.?[_a-zA-Z0-9\/]+)+$/"));
$request = filter_var($dirty_request, FILTER_VALIDATE_REGEXP, $filter);
if (!$request || !$simplecache_enabled) {
	echo 'Cache error: bad request';
	exit;
}

// testing showed regex to be marginally faster than array / string functions over 100000 reps
// it won't make a difference in real life and regex is easier to read.
// <type>/<viewtype>/<name/of/view.and.dots>.<ts>.<type>
$regex = '|([^/]+)/([^/]+)/(.+)\.([^\.]+)\.([^.]+)$|';
preg_match($regex, $request, $matches);

$type = $matches[1];
$viewtype = $matches[2];
$view = $matches[3];
$ts = $matches[4];

// If is the same ETag, content didn't changed.
$etag = $ts;
if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && trim($_SERVER['HTTP_IF_NONE_MATCH']) == "\"$etag\"") {
	header("HTTP/1.1 304 Not Modified");
	exit;
}

switch ($type) {
	case 'css':
		header("Content-type: text/css", true);
		$view = "css/$view";
		break;
	case 'js':
		header('Content-type: text/javascript', true);
		$view = "js/$view";
		break;
}

header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', strtotime("+6 months")), true);
header("Pragma: public", true);
header("Cache-Control: public", true);
header("ETag: \"$etag\"");

$filename = $dataroot . 'views_simplecache/' . md5($viewtype . $view);

if (file_exists($filename)) {
	readfile($filename);
} else {
	// someone trying to access a non-cached file or a race condition with cache flushing
	mysqli_close($mysql_dblink);
	require_once(dirname(dirname(__FILE__)) . "/start.php");

	global $CONFIG;
	if (!in_array($view, $CONFIG->views->simplecache)) {
		header("HTTP/1.1 404 Not Found");
		exit;
	}

	elgg_set_viewtype($viewtype);
	echo elgg_view($view);
}

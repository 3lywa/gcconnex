<?php
/**
 * Custom Page plugin, page
 * 
 */

// We keep this for logged in users only
gatekeeper();

// Get the user
$user = elgg_get_logged_in_user_entity();
$title = elgg_echo('custompage:contact');

static $projects = array();
$query = "SELECT (SELECT count(t.owner_id) from tasks t where t.project_id=p.id and t.owner_id>0) assigned, (SELECT count(t.owner_id) from tasks t where t.project_id=p.id and t.owner_id=0) unassigned,p.* FROM projects p JOIN users u on u.username='$user->username' JOIN project_has_users pu on pu.project_id=p.id AND u.id = pu.user_id";
$result = get_data($query);
if ($result) {
	$counter = 0;
	foreach ($result as $row) {
		$projects[$counter]=$row;
		$counter++; 
	}
}

static $tasks= array();
$query = "SELECT p.id, GROUP_CONCAT(distinct col.title) title, GROUP_CONCAT(distinct col.position) position, GROUP_CONCAT(stat.total) total FROM projects p, users u, project_has_users pu, columns col, project_daily_column_stats stat WHERE u.username = '$user->username' AND u.id = pu.user_id AND pu.project_id = p.id AND col.project_id = p.id AND stat.project_id = p.id AND stat.column_id=col.id AND stat.day = (SELECT MAX(DAY) FROM project_daily_column_stats WHERE project_id = p.id) GROUP BY p.id order by position";
$result = get_data($query);
if ($result) {
	$counter = 0;
	foreach ($result as $row) {
		$tasks[$counter]=$row;
		$counter++; 
	}
}

static $unassignedTasks= array();
$query = "SELECT p.id, GROUP_CONCAT(distinct col.title) title, GROUP_CONCAT(distinct col.position) position, GROUP_CONCAT(stat.total) total FROM projects p, users u, project_has_users pu, columns col, project_daily_column_stats stat WHERE u.username = '$user->username' AND u.id = pu.user_id AND pu.project_id = p.id AND col.project_id = p.id AND stat.project_id = p.id AND stat.column_id=col.id AND stat.day = (SELECT MAX(DAY) FROM project_daily_column_stats WHERE project_id = p.id) GROUP BY p.id order by position";
$result = get_data($query);
if ($result) {
	$counter = 0;
	foreach ($result as $row) {
		$tasks[$counter]=$row;
		$counter++; 
	}
}


// All projects
$vars = array(
	'count' => count($projects),
	'projects' => $projects,
	'tasks' => $tasks
);
$content = elgg_view('custompage/content', $vars);

$vars = array(
	'content' => $content,
);
$body = elgg_view_layout('one_column', $vars);

echo elgg_view_page($title, $body);
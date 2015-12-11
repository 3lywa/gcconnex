<?php

$tag = get_input('aggregation-tag');
$parent_guid = (int)get_input('parent_id');

$children = elgg_get_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => 'idea',
	'limit' => 100,
	'metadata_names' => array('tags'),
	'metadata_values' => array($tag)
));

//error_log("AGG ideas tag: " . $tag . "  found: " . count($children));

foreach( $children as $child ){
	add_entity_relationship($child->guid, 'child-idea', $parent_guid);
//	error_log("AGG idea: " . $child->guid);
}

forward("/ideas/view/$parent_guid");
?>
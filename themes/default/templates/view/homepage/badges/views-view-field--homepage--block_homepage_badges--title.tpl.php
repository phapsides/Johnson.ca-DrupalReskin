<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
 
if ((isset($row->field_field_link[0]['raw']['url'])) && ($row->field_field_link[0]['raw']['url'] != '')) {
	$output_parsed = '<a href="' . $row->field_field_link[0]['raw']['url'] . '"';
	
	if (isset($row->field_field_link[0]['raw']['attributes']['target'])) {
		$output_parsed .= ' target="' . $row->field_field_link[0]['raw']['attributes']['target'] .'"';
	}

	$output_parsed .= '>';
	$output_parsed .= $output . '</a>';

	$output = $output_parsed;
}
?>
<h2 class="block-title"><?php print $output; ?></h2>

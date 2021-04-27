<?php 

function printLocation() {
	$postName = $post->post_name; //Get the slug of the current page
	$currentPage = substr($postName, 0, strpos($postName, '-'));
	if ($currentPage) { 
		$thisPage = $currentPage; 
		$loc2 = substr($postName, strrpos($postName, '-') +1);
		return $locTitle = ucfirst($currentPage) . ' and ' . ucfirst($loc2);
	} else { 
		$thisPage = $postName; 
		return $locTitle = ucfirst($thisPage);
	} 
};

add_shortcode('print_location', 'printLocation');

?>
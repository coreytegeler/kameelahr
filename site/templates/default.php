<?php
snippet('header');
	$cells = new Pages();
	$slug = $page->slug();
	if( $parent = page( $slug ) ) {
		if( $cells = $parent->children()->visible() ) {
			snippet( 'cells', array( 'cells' => $cells ) );
		}
	}
snippet('footer');
?>
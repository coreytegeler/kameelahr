<?php
if( isset( $cells ) ) {
	echo '<div id="cells">';
		$cells = $cells->sortBy( 'published', 'desc' );
		if( sizeof( $cells ) ) {
			foreach( $cells as $index => $cell ) {
				$title = $cell->title();
				$titleLength = strlen( $title );
				if( $titleLength >= 75 ) {
					$cellWidth = 'large';
				} else if( $titleLength >= 25 ) {
					$cellWidth = 'medium';
				} else {
					$cellWidth = 'small';
				}
				$published = $cell->date( 'M d, Y', 'published' );
				$type = $cell->intendedTemplate();
				$parent = $cell->parent()->slug();
		 		echo '<div class="cell ' . $type . ' ' . $parent . '" data-length="' . $cellWidth . '" style="">';
		 			echo '<a href="' . $cell->url() . '">';
			 			echo '<div class="wrap">';
			 				if( $cell->image() ) {
				 				echo '<div class="artwork">';
								 	echo $cell->image();
							 		// echo '<div class="texture"></div>';
								echo '</div>';
							} else if( $cell->body() && !$cell->body()->empty() ) {
								echo '<div class="text">';
									$excerpt = str::excerpt( $cell->body()->kirbytext(), 1800, false );
									echo $excerpt;
								echo '</div>';
							} else {
								echo '<div class="event">';
									echo '<h2>';
							 			$title = $cell->title();
							 			$safeTitle = $cell->safeTitle();
							 			if( !$safeTitle || !$safeTitle->empty() ) {
							 				echo $safeTitle;
							 			} else {
							 				echo $title;	
							 			}
						 			echo '</h2>';
						 		echo '</div>';
							}
							echo '<div class="meta">';
					 			echo '<span>' . $published . '</span>';
					 			echo '<span>' . $type . '</span>';
					 		echo '</div>';
					 	echo '</div>';
				 	echo '</a>';
			 	echo '</div>';
			}
		}
	echo '</div>';
}
?>
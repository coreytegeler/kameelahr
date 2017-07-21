<?php
if( isset( $cells ) ) {
  echo '</div>';
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
				$opacity = rand( 0.01, 0.1 );
				$background = 'background:rgba(0,0,0,' . $opacity . ')';
		 		echo '<div class="cell ' . $type . ' ' . $parent . '" data-length="' . $cellWidth . '" style="' . $background . '">';
		 			echo '<a href="' . $cell->url() . '">';
			 			echo '<div class="wrap">';
				 			echo '<div class="meta">' . $published . '</div>';
				 			echo '<h2>';
					 			$title = $cell->title();
					 			$safeTitle = $cell->safeTitle();
					 			if( !$safeTitle || !$safeTitle->empty() ) {
					 				echo $safeTitle;
					 			} else {
					 				echo $title;	
					 			}
				 			echo '</h2>';
				 			echo '<div class="meta">';
				 				echo $type;
				 			echo '</div>';
					 	echo '</div>';
				 	echo '</a>';
				 	echo $cell->image();
			 	echo '</div>';
			}
		}
	echo '</div>';
}
?>
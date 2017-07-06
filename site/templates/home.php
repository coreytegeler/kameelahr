<?php
snippet('header');
	
echo '<div id="cells">';
	if( $artworks = page( 'artwork' ) ) {
		foreach ( $artworks->children() as $index => $artwork ) {
			$title = $artwork->title();
			$titleLength = strlen( $title );
			if( $titleLength >= 75 ) {
				$cellWidth = 'large';
			} else if( $titleLength >= 25 ) {
				$cellWidth = 'medium';
			} else {
				$cellWidth = 'small';
			}
	 		echo '<div class="cell" data-length="' . $cellWidth . '">';
	 			echo '<div class="line"></div>';
	 			// echo '<div class="line right"></div>';
	 			echo '<a href="' . $artwork->url() . '">';
		 			echo '<div class="meta">November 11th, 2017</div>';
		 			echo '<h2>';
		 				echo $title;
		 			echo '</h2>';
		 		echo '</a>';
		 	echo '</div>';
		 	// if( $index != $artworks->children()->length() - 1 ) {
		 	// 	echo '<div class="cell"><h2>&mdash;</h2></div>';
		 	// }
		}
	}
echo '</div>';

snippet('footer');
?>
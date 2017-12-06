<?php
snippet('header');
	echo '<div class="content">';
		echo '<div class="inner max">';
			if( $exhibitions = $page->exhibitions()->toStructure() ) {
				echo '<h2>Exhibitions</h2>';
				echo '<ul>';
					foreach( $exhibitions as $exhibition ) {
						echo '<li>';
							$exhibition_link = $exhibition->link();
							echo ( !$exhibition_link->empty() ? '<a href="' . $exhibition_link . '" target="_blank">' : '' );
								echo $exhibition->title();
							echo ( !$exhibition_link->empty() ?  '</a>' : '' );
						echo '</li>';
					}
				echo '</ul>';
			}

			if( $talks = $page->talks()->toStructure() ) {
				echo '<h2>Talks & Readings</h2>';
				echo '<ul>';
					foreach( $talks as $talk ) {
						echo '<li>';
							$talk_link = $talk->link();
							echo ( !$talk_link->empty() ? '<a href="' . $talk_link . '" target="_blank">' : '' );
								echo $talk->title();
							echo ( !$talk_link->empty() ?  '</a>' : '' );
						echo '</li>';
					}
				echo '</ul>';
			}

			if( $press = $page->press()->toStructure() ) {
				echo '<h2>Press</h2>';
				echo '<ul>';
					foreach( $press as $press ) {
						echo '<li>';
							$press_link = $press->link();
							echo ( !$press_link->empty() ? '<a href="' . $press_link . '" target="_blank">' : '' );
								echo $press->title();
							echo ( !$press_link->empty() ?  '</a>' : '' );
						echo '</li>';
					}
				echo '</ul>';
			}
		echo '</div>';
	echo '</div>';
snippet('footer');
?>
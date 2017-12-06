<?php
snippet('header');

if( $title = $page->title() ) {
	echo '<em id="title">' . $title . '</em></br></br>';
}
echo '<div id="intro">';
	if( $intro = $page->intro() ) {
		echo '<span id="intro">' . $intro . ' </span>';
	}
	if( $nodes = $page->nodes()->toStructure() ) {
		foreach( $nodes as $node ) {
			$title = $node->title();
			$slug = $node->slug();
			echo '<span class="node" data-id="' . $slug . '">';
				echo '<span class="title">' . $title . '</span>';
				echo '<div class="content" data-id="' . $slug . '">';
					if( $images = $node->image() ) {
						$images = explode( ', ', $images );
						echo '<div class="images">';
							foreach( $images as $image ) {
								if( $file = $page->image( $image ) ) {
									echo '<img src="' . $file->url() . '"/>';
								}
							}
						echo '</div>';
					}
				echo '</div>';
			echo '</span>';
		}
	}
echo '</div>';
snippet('footer');
?>
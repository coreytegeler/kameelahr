<?php
snippet('header');
echo '<div class="content">';
	echo '<div class="full">';
		echo '<div class="inner">';
			echo '<div class="statement">';
				echo '<h2><span>' . $page->statement()->kirbytext() . '</span></h2>';
			echo '</div>';
			echo '<div class="columns">';
				echo '<div class="column">';
					echo '<div class="bio">';
						echo '<h2>Bio</h2>';
						echo $page->bio()->kirbytext();
					echo '</div>';
				echo '</div>';
				echo '<div class="column">';
					echo '<div class="contact">';
						echo '<h2>Contact</h2>';
						echo $page->contact()->kirbytext();
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
echo '</div>';
snippet('footer');
?>
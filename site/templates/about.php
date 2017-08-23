<?php
snippet('header');
echo '<div class="content">';
	echo '<div class="inner full">';
		echo '<div class="column">';
			echo '<div class="body">';
				echo '<div class="bio">';
					echo $page->bio()->kirbytext();
				echo '</div>';
			echo '</div>';
		echo '</div>';
		echo '<div class="column">';
			echo '<div class="body">';
				echo '<div class="statement">';
					echo $page->statement()->kirbytext();
				echo '</div>';
				echo '<div class="contact">';
					echo $page->contact()->kirbytext();
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
echo '</div>';
snippet('footer');
?>
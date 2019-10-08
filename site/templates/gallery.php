<?php snippet('header'); ?>
<div class="thumbs">

	<?php $subs = $page->children();
	foreach ( $subs as $index => $sub ):
		$link = $sub->ext_link();
		$thumb = $sub->images()->first(); ?>
		<figure class="<?= $sub->intendedTemplate() ?> thumb">
			<?php
			echo $link->isNotEmpty() ? '<a href="' .  $link . '" target="_blank">' : null;
				echo $thumb;
			echo $link->isNotEmpty() ? '</a>' : null;
			?>
		</figure>
	<?php endforeach; ?>

</div>
<?php snippet('footer'); ?>
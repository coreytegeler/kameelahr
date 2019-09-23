<?php snippet('header'); ?>
<div class="thumbs">

	<?php $subs = $page->children();
	foreach ( $subs as $index => $sub ):
		$thumb = $sub->images()->first(); ?>
		<figure class="<?= $sub->intendedTemplate() ?> thumb">
			<a href="<?=  $sub->url() ?>">
				<?= $thumb; ?>
			</a>
		</figure>
	<?php endforeach; ?>

</div>
<?php snippet('footer'); ?>
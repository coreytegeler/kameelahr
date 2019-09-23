<?php snippet('header'); ?>
<div class="thumbs">

	<?php $pubs = $page->children();
	foreach ( $pubs as $index => $pub ):
		$thumb = $pub->images()->first(); ?>
		<figure class="pub thumb">
			<a href="<?=  $pub->url() ?>">
				<?= $thumb; ?>
			</a>
		</figure>
	<?php endforeach; ?>

</div>
<?php snippet('footer'); ?>
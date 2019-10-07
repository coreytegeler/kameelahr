<?php snippet('header'); ?>
<div id="events">

	<?php
	$today = date( 'Y-m-d' );
	$events = $page->children()->listed()->sortBy(function( $page ) {
		return $page->date()->toDate();
	})->flip();

	$new_section = '';
	$last_section = '';
	foreach( $events as $index => $event ):
		$past = strtotime( $event->date()->toDate( 'Y-m-d' ) ) < strtotime( $today );
		if( $past ):
			$new_section = 'Past';
		else:
			$new_section = $event->date()->toDate( 'F Y' );
		endif;

		if( $last_section !== $new_section ):
			if( $last_section !== '' ): ?>
					</ul>
				</div>
			</div>
			<?php endif ?>
			<div class="row">
				<div class="col labels"> 
					<strong><?= $new_section ?></strong>
				</div>
				<div class="col events">
					<ul>

		<?php endif; ?>

		<li class="">
			<?= $event->title() ?>, <?= $event->date()->toDate( 'F d, Y' ) ?>, <?= $event->location() ?>
		</li>

		<?php $last_section = $new_section;
	endforeach; ?>

</div>
<?php snippet('footer'); ?>
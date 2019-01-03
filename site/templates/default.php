<?php snippet('header'); ?>
	

	<section>
			
		<?php snippet( 'carousel' ); ?>

	</section>

	<section>

		<div class="text-inner">

			<div class="text-max">

				<?php if( $bismillah = $site->files()->first() ): ?>

					<div class="bismillah">

						<?php echo $bismillah->resize( 900, null, 100 ); ?>

					</div>

				<?php endif; ?>

				<?php if( $about = $site->about()->kirbytext() ): ?>

					<?php echo $about; ?>

				<?php endif; ?>

			</div>

		</div>

	</section>


<?php snippet('footer'); ?>
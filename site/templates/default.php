<?php snippet('header'); ?>
	
	<div class="sections">

		<section>

			<div class="section-inner">
				
				<?php snippet( 'carousel' ); ?>

			</div>

		</section>

		<section>

			<div class="section-inner">

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

	</div>


<?php snippet('footer'); ?>
<?php snippet('header'); ?>
	
	<div class="sections">

		<section>

			<div class="section-inner">

				<h1>
						
					<?php echo $site->title(); ?>

				</h1>

				
				<?php snippet( 'carousel' ); ?>

			</div>

		</section>

		<section>

			<div class="section-inner">

				<h1>&nbsp;</h1>


				<div class="text-max">

					<?php if( $bismillah = $site->files()->first() ): ?>

						<div class="bismillah">

							<?php echo $bismillah->resize( 900, null, 100 ); ?>

						</div>

					<?php endif; ?>

					
						
					<div class="text-columns">

						<?php if( $about = page( 'home' )->about()->kirbytext() ): ?>

							<div class="about">

								<?php echo $about; ?>

							</div>

						<?php endif; ?>

						<?php if( $info = page( 'home' )->info()->kirbytext() ): ?>

							<div class="info">

								<?php echo $info; ?>

							</div>

						<?php endif; ?>

					</div>

				</div>

			</div>

		</section>

	</div>


<?php snippet('footer'); ?>
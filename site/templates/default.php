<?php snippet('header'); ?>
	
	<div class="sections">

		<section>

			<div class="section-inner">

				<header>
					<h1>&nbsp;</h1>
				</header>

				<?php snippet( 'carousel' ); ?>

			</div>

		</section>

		<section>

			<div class="section-inner">

				<div class="text-max">

					<?php if( $text = $page->text()->blocks() ): ?>

						<?php echo $text; ?>

					<?php endif; ?>

					</div>

				</div>

			</div>

		</section>

	</div>


<?php snippet('footer'); ?>
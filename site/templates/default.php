<?php
snippet('header');
$text = $page->text()->kirbytext();
?>
	
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

					<nav role="navigation">

						<?php foreach( $pages->visible() as $nav_page ): ?>

							<a class="nav-link<?= $nav_page->is( $page ) ? ' active' : '' ?>" href="<?= $nav_page->url() ?>"><?= $nav_page->title() ?> </a>

						<?php endforeach; ?>

					</nav>
						

					<?php snippet( 'captions' ); ?>


					<div class="text">

						<?php echo $text; ?>

					</div>


				</div>

			</div>

		</section>

	</div>


<?php snippet('footer'); ?>
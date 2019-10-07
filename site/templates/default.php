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
					<?php if( strpos( $page->intendedTemplate(), 'single' ) !== false ): ?>
						<?php $images = $page->images() ?>
					    <div class="slide-captions">

					        <?php $index = 0;
					        foreach ( $images as $image ):
								$caption = $image->caption()->blocks(); ?>
								<figcaption class="<?= ( !$index ? 'current' : '' ) ?>" data-index="<?= $index ?>">
				              		<?php echo $caption; ?>
				                </figcaption>
					        <?php $index++;
						    endforeach; ?>

					    </div>
					<?php elseif( $text = $page->text()->blocks() ): ?>

						<?php echo $text; ?>

					<?php endif; ?>

					</div>

				</div>

			</div>

		</section>

	</div>


<?php snippet('footer'); ?>
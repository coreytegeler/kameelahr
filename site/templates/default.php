<?php
snippet('header');
$text = $page->text()->kirbytext();
?>
	
	<div class="sections">

		<section>

			<div class="section-inner">

				<!-- <h1> -->
						
					<?#php echo $site->title(); ?>

				<!-- </h1> -->

				
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

							<?php $active = $nav_page->is( $page ); ?>

							<a class="nav-link<?= $active ? ' active' : '' ?>" href="<?= $nav_page->url() ?>"><?= $nav_page->title() ?> </a>
						<?php endforeach; ?>

					</nav>
						

					<?php if( $page->is( 'work' ) && $images = $page->files() ): ?>

						<?php $index = 0; ?>

			      <?php foreach( $images as $image ): ?>
			        
			        <?php $caption = $image->caption(); ?>

		          <figcaption class="caption<?= ( !$index ? ' current' : '' ) ?>">

		            <?php if( $caption->isNotEmpty() ): ?>

	            		<?php echo $caption->kirbytext(); ?>

            		<?php endif; ?>
		                
              </figcaption>

              <?php $index++; ?>

			      <?php endforeach; ?>

					<?php endif; ?>


					<div class="text">

						<?php echo $text; ?>

					</div>



					<!-- </div> -->

				</div>

			</div>

		</section>

	</div>


<?php snippet('footer'); ?>
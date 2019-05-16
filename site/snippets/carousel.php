
<div id="carousel">
  <div class="slides">

  	<?php if( $images = $page->files() ): ?>

      <?php $index = 0; ?>

      <?php foreach ( $images as $image ): ?>
        
        <?php $caption = $image->caption(); ?>

          <figure class="slide <?= ( !$index ? 'current' : '' ) ?>">
          	
            <?= $image->resize( 900, 900, 100 ); ?>

            <?#php if( $caption->isNotEmpty() ): ?>

              <!-- <figcaption> -->

            		<?#php echo $caption->kirbytext(); ?>

              <!-- </figcaption> -->

            <?#php endif; ?>

          </figure>

          <?php $index++; ?>

      <?php endforeach; ?>

    <?php endif; ?>

  </div>

  <div class=""><?= $site->copyright()->kirbytext() ?></div>

  <div class="arrow left" data-direction="left"></div>
  <div class="arrow right" data-direction="right"></div>
</div>
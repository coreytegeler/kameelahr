<div id="carousel">
  <div class="slides">

  	<?php if( $images = $page->files() ): ?>

      <?php $index = 0; ?>

      <?php foreach ( $images as $image ): ?>
        
        <?php $caption = $image->caption(); ?>

          <div class="slide <?= ( !$index ? 'current' : '' ) ?>">
          	
            <figure style="background-image:url(<?= $image->resize( 900, 900, 100 )->url(); ?>)">
              <?#= $image->resize( 900, 900, 100 ); ?>
            </figure>

            <figcaption><?= $site->copyright()->kirbytext() ?></figcaption>

          </div>

          <?php $index++; ?>

      <?php endforeach; ?>

    <?php endif; ?>

  </div>
  
  <?php if( sizeof( $images ) > 1 ): ?>
    <div class="arrow left" data-direction="left"></div>
    <div class="arrow right" data-direction="right"></div>
  <?php endif; ?>
</div>
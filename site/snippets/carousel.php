<div id="carousel">
  <div class="slides">

  	<?php if( $images = $page->files() ): ?>

      <?php $index = 0; ?>

      <?php foreach ( $images as $image ): ?>
        
        <?php $caption = $image->caption(); ?>

          <figure class="slide <?= ( !$index ? 'current' : '' ) ?>">
          	
            <?= $image->resize( 900, 900, 100 ); ?>

          </figure>

          <?php $index++; ?>

      <?php endforeach; ?>

    <?php endif; ?>

  </div>
  <div class=""><?= $site->copyright()->kirbytext() ?></div>
  <?php if( sizeof( $images ) > 1 ): ?>
    <div class="arrow left" data-direction="left"></div>
    <div class="arrow right" data-direction="right"></div>
  <?php endif; ?>
</div>
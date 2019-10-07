<?php if( $images = $page->files() ): ?>
  <div class="carousel">
    <div class="slides">

        <?php $index = 0;
        foreach ( $images as $image ):
          
          $caption = $image->caption(); ?>

            <figure class="slide <?= ( !$index ? 'current' : '' ) ?>" data-index="<?= $index ?>">
            	
              <?php echo $image->resize( 900, 900, 100 ); ?>

            </figure>

        <?php $index++;
        endforeach; ?>

    </div>

    <?php if( sizeof( $images ) > 1 ): ?>
      <div class="arrow left" data-direction="left"></div>
      <div class="arrow right" data-direction="right"></div>
    <?php endif; ?>

  </div>
<?php endif; ?>
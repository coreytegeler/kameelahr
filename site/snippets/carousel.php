
<div class="carousel">
  <div class="slides">

  	<?php if( $images = page( 'home' )->files() ): ?>

      <?php foreach ( $images as $index => $image ): ?>
        
        <?php $caption = $image->caption(); ?>

          <figure class="slide <?= ( !$index ? 'current' : '' ) ?>" data-slug="<?php $title ?>">
          	
            <?= $image; ?>

            <?php if( $caption->isNotEmpty() ): ?>

              <figcaption>
            		<?php echo $caption; ?>
              </figcaption>

            <?php endif; ?>

          </figure>

      <?php endforeach; ?>

    <?php endif; ?>

  </div>
  <div class="arrow left" data-direction="left"></div>
  <div class="arrow right" data-direction="right"></div>
</div>
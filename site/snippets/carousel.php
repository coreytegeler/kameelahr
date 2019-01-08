
<div class="carousel">
  <div class="slides">

  	<?php if( $images = page( 'home' )->files() ): ?>

      <?php foreach ( $images as $index => $image ): ?>
        
        <?php $title = $image->filename(); ?>
        <?php $caption = $image->caption(); ?>

          <figure class="slide <?= ( !$index ? 'current' : '' ) ?>" data-slug="<?php $title ?>">
          	
            <div class="img" style="background-image:url(<?= $image->url() ?>)">
            </div>

            <?php if( $caption->isNotEmpty() ): ?>

              <figcaption>
              	<div class="inner">
              		<?php echo $image->caption(); ?>
              	</div>
              </figcaption>

            <?php endif; ?>

          </figure>

      <?php endforeach; ?>

    <?php endif; ?>

  </div>
  <div class="arrow left" data-direction="left"></div>
  <div class="arrow right" data-direction="right"></div>
</div>
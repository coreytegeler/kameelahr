<?php if( $images = $page->files() ): ?>
  <div class="carousel">
    <div class="slides">

        <?php foreach ( $images as $index => $image ):
          
          $caption = $image->caption(); ?>

            <figure class="slide <?= ( !$index ? 'current' : '' ) ?>" data-slug="<?php $title ?>">
            	
              <?php echo $image->resize( 900, 900, 100 );

              if( $caption->isNotEmpty() ): ?>

                <figcaption>
              		<?php echo $caption; ?>
                </figcaption>

              <?php endif; ?>

            </figure>

        <?php endforeach; ?>

    </div>

    <?php if( sizeof( $images ) > 1 ): ?>
      <div class="arrow left" data-direction="left"></div>
      <div class="arrow right" data-direction="right"></div>
    <?php endif; ?>

  </div>
<?php endif; ?>
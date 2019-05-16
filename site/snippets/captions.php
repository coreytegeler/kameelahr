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
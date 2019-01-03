
<div class="carousel">
  <div class="slides">

    <?php if( $nodes = $pages->filterBy( 'intendedTemplate', 'node' ) ): ?>

      <?php foreach ( $nodes as $index => $node ): ?>

      	<?php if( $image = $node->images()->first() ): ?>
        
          <?php $title = $image->filename(); ?>
          <?php $caption = $image->caption(); ?>

	          <div class="slide <?= ( !$index ? 'current' : '' ) ?>" data-slug="<?php $title ?>">
	            <div class="scroll">

	              <div class="wrap">
	                <img src="<?php echo $image->url(); ?>"/>
	              </div>

	              <?php if( $caption->isNotEmpty() ): ?>

	                <div class="caption">
	                	<div class="inner">
	                		<?php echo $image->caption(); ?>
	                	</div>
	                </div>

	              <?php endif; ?>

	            </div>
	          </div>

				<?php endif; ?>

      <?php endforeach; ?>

    <?php endif; ?>

  </div>
  <div class="arrow left" data-direction="left"></div>
  <div class="arrow right" data-direction="right"></div>
</div>
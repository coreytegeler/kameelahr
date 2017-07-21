<?php
snippet('header');
  if( $images = $page->images() ) {
    echo '<div class="carousel">';
      echo '<div class="slides">';
        foreach ( $images as $index => $image ) {
          echo '<div class="slide">';
            echo '<div class="image" style="background-image:url(' . $image->url() . ')"></div>';
            if( $caption = $image->caption() ) {
              echo '<div class="caption"><div class="inner">' . $caption .  '</div></div>';
            }
          echo '</div>';
        }
      echo '</div>';
      if( sizeof( $images ) > 1 ) {
        echo '<div class="arrow left" data-direction="left"></div>';
        echo '<div class="arrow right" data-direction="right"></div>';
      }
    echo '</div>';
  }
snippet('footer');
?>
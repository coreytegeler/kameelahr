<?php
snippet('header');
$title = $page->safeTitle();
if( $title->empty() ) {
  $title = $page->title();
}
$intro = $page->intro()->kirbytext();
$images = $page->images();
echo '<div class="carousel">';
  echo '<div class="slides">';
    echo '<div class="slide intro current" data-slug="intro">';
      echo '<div class="border">';
        echo '<div class="texture"></div>';
        echo '<div class="inner">';
          echo '<h2>' . $title . '</h2>';
          echo '<div class="body">';
            echo $intro;
          echo '</div>';
        echo '</div>';      
      echo '</div>';
    echo '</div>';
    if( $images ) {
      foreach ( $images as $index => $image ) {
        echo '<div class="slide image" data-slug="' . $image->filename() . '">';
          echo '<div class="border">';
            echo '<div class="texture"></div>';
            echo '<div class="img" style="background-image:url(' . $image->url() . ')"></div>';
          echo '</div>';
        echo '</div>';
      }
    }
  echo '</div>';
  echo '<div class="arrow left" data-direction="left"></div>';
  echo '<div class="arrow right" data-direction="right"></div>';
echo '</div>';
snippet('footer');
?>
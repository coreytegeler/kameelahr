<?php
snippet('header');
$title = $page->safeTitle();
if( $title->empty() ) {
  $title = $page->title();
}
$intro = $page->intro()->kirbytext();
$images = $page->images();
echo '<div class="content">';
  echo '<div class="carousel">';
    echo '<div class="slides">';
      echo '<div class="slide intro current" data-slug="intro">';
        echo '<div class="scroll">';
          echo '<div class="content">';
            echo '<div class="texture"></div>';
            echo '<div class="inner">';
              echo '<h1>' . $title . '</h1>';
              echo '<div class="body">';
                echo $intro;
              echo '</div>';
            echo '</div>';
          echo '</div>';      
        echo '</div>';
      echo '</div>';
      if( $images ) {
        foreach ( $images as $index => $image ) {
          echo '<div class="slide image" data-slug="' . $image->filename() . '">';
            echo '<div class="scroll">';
              echo '<div class="texture"></div>';
              echo '<div class="img" style="background-image:url(' . $image->url() . ')"></div>';
              echo '<div class="caption"><div class="inner">' . $image->caption() . '</div></div>';
            echo '</div>';
          echo '</div>';
        }
      }
    echo '</div>';
    echo '<div class="arrow left" data-direction="left"></div>';
    echo '<div class="arrow right" data-direction="right"></div>';
  echo '</div>';
echo '</div>';
snippet('footer');
?>
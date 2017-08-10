<?php
snippet('header');
$title = $page->safeTitle();
if( $title->empty() ) {
  $title = $page->title();
}
$meta = $page->meta()->kirbytext();
$body = $page->body()->kirbytext();
$intro = $page->intro()->kirbytext();
// echo '<div class="texture"></div>';
echo '<div class="content">';
  echo '<div class="inner">';
    echo '<h2>' . $title . '</h2>';
    echo '<div class="meta">';
      echo $meta;
    echo '</div>';
    echo '<div class="intro">';
      echo $intro;
    echo '</div>';
    echo '<div class="body">';
      echo $body;
    echo '</div>';
  echo '</div>';
echo '</div>';
snippet('footer');
?>
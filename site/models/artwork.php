<?php
class ArtworkPage extends Page {
  function url() {
    return url( $this->uid() );
  }
}
?>
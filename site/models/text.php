<?php
class TextPage extends Page {
  function url() {
    return url( $this->uid() );
  }
}
?>
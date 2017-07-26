<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">
  <?= css('assets/css/style.css') ?>

</head>
<body>
  <main class="main <?php echo $page->intendedTemplate(); ?>" role="main">
    <header role="header">
      <a href="/" class="name">
        <h3>Kameelah Janan Rasheed</h3>
      </a>
      <nav role="navigation">
        <?php
        echo '<div class="links">';
          $links = array( 'bio', 'statement', 'cv', 'contact' );
          foreach ( $links as $key => $slug ) {
            if( $page = page( $slug ) ) {
              echo '<div class="link">';
                echo '<a href="' . $page->url() . '"><h3>' . $page->title() . '</h3></a>';
              echo '</div>';
            }
          }
        echo '</div>';
        echo '<div class="links filters">';
          $filters = array( 'events', 'artwork', 'texts' );
          foreach ( $filters as $key => $slug ) {
            if( $page = page( $slug ) ) {
              echo '<div class="link filter ' . $slug . ' selected" data-filter="' . $slug . '">';
                echo '<h3>' . $page->title() . '</h3>';
              echo '</div>';
            }
          }
        echo '</div>';
        ?>
      </nav>
    </header>
<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">
  <?= js(array(
	  'assets/js/jquery-3.2.1.min.js',
	  'assets/js/isotope.pkgd.min.js',
    'assets/js/masonry-horizontal.js',
	  'assets/js/script.js'
	) ) ?>
  <?= css('assets/css/style.css') ?>

</head>
<body>
  <main class="main" role="main">
    <header role="header">
    </header>
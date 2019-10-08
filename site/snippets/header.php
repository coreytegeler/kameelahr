<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title><?= $site->title()->html() ?></title>
	<meta name="description" content="<?= $site->description()->html() ?>">
	<?= css('assets/css/style.css') ?>

</head>
<body>
	<div id="page">
		<header id="header">
			<div class="row">
				<div class="col" id="title">
					<h1>
						<a href="<?= $site->url() ?>">
							<?= $site->title()->html() ?>
						</a>
					</h1>
				</div>
				<div class="col" id="menu">
					<nav id="nav">
						<?php
						$pages = $site->pages()->listed();
						foreach ( $pages as $slug ) {
							$page = page( $slug ); ?>
							<a href="<?= $page->url() ?>">
								<?= $page->title() ?>
							</a>
						<?php } ?>
					</nav>
				</div>
			</div>
		</header>
		<main id="main" role="main">
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
		<header>
			<h1><?= $site->title()->html() ?></h1>
		</header>
		<main class="main" role="main">
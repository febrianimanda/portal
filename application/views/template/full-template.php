<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?> | Portal FIM</title>
	<!-- Bootstrap Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Dynamic CSS Style -->
	<?php if(isset($header_css_file)): ?>
	<?= header_css_file($header_css_file); ?>
	<?php endif; ?>
	<?php if(isset($header_css_url)): ?>
	<?= header_css_url($header_css_url); ?>
	<?php endif; ?>
	<!-- Our CSS Style -->
	<link rel="stylesheet" href="<?= css_url('styles') ?>" />
</head>
<body>
	<div class="fluid-container">
		<?php $content; ?>
	</div>
	<!-- Jquery Latest Compiled and Minified JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<!-- Bootstrap Latest Compiled and Minified JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Dynamic JS load from external -->
	<?php if(isset($footer_js_url)): ?>
	<?= footer_js_url($footer_js_url); ?>
	<?php endif; ?>
	<!-- Dynamic JS load from internal -->
	<?php if(isset($footer_js_file)): ?>
	<?= footer_js_file($footer_js_file); ?>
	<?php endif; ?>
</body>
</html>
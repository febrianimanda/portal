<?php
	if(!isset($this->session->userdata('logged_in'))) {
		redirect('auth/', 'refresh');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?> | Portal FIM</title>
	<!-- Bootstrap Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= css_url('font-awesome.min') ?>">
	<!-- Dynamic CSS Style -->
	<?php if(isset($header_css_file)): ?>
	<?= header_css_file($header_css_file); ?>
	<?php endif; ?>
	<?php if(isset($header_css_url)): ?>
	<?= header_css_url($header_css_url); ?>
	<?php endif; ?>
	<!-- Our CSS Style -->
	<link rel="stylesheet" href="<?= css_url('styles') ?>" />
	<!-- Font Awesome -->
	<script src="https://use.fontawesome.com/d11888fc05.js"></script>
</head>
<body>
	<nav class="navbar navbar-portal navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#kandidat-menu" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a href="#" class="navbar-brand"><img src="<?= img_url('logo.png') ?>" alt="FIM"></a>
			</div>

			<div class="collapse navbar-collapse" id="kandidat-menu">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?= site_url('kandidat/profil/') ?>">Profilku</a></li>
					<li><a href="#">List Kandidat</a></li>
					<li><a href="#">Pengumuman</a></li>
					<li><a href="#">Sign Out</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container container-profil">
		<?php echo $content; ?>
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
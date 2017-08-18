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
	<!-- Chatra {literal} -->
	<script>
    (function(d, w, c) {
      w.ChatraID = 'R5mt5hsqS5ypzgyxD';
      var s = d.createElement('script');
      w[c] = w[c] || function() {
        (w[c].q = w[c].q || []).push(arguments);
      };
      s.async = true;
      s.src = (d.location.protocol === 'https:' ? 'https:': 'http:')
      + '//call.chatra.io/chatra.js';
      if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
	</script>
	<!-- /Chatra {/literal} -->
	<script>
  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-48323794-5', 'auto');
  	ga('send', 'pageview');
	</script>
	<!-- Jquery Latest Compiled and Minified JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
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
					<li><a href="<?= site_url('welcome/home')?>">Home</a></li>
					<?php if($this->session->userdata('logged_in')): ?> 
						<li><a href="<?= site_url('kandidat/profil/'.$this->session->userdata('username')) ?>">Profilku</a></li>
					<?php endif; ?>
					<?php if($this->session->userdata('logged_in')): ?> 
						<li><a href="<?= site_url('kandidat/pengaturan')?>">Pendaftaran</a></li>
					<?php endif; ?>
					<!-- <li><a href="#">List Kandidat</a></li> -->
					<!-- <li><a href="#">Pengumuman</a></li> -->
					<?php if($this->session->userdata('logged_in')): ?> 
						<li><a href="<?= site_url('auth/logout') ?>">Logout</a></li>
					<?php else : ?>
						<li><a href="<?= site_url('auth/logout') ?>">Sign In</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="fluid-container">
		<?php echo $content; ?>
	</div>
	<footer>
		<p class="text-center">Server Supported By <a target="blank" href="https://idcloudhost.com">IDCloudHost</a></p>
	</footer>
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
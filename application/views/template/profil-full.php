<?php
	if($this->uri->segment(1) == "kandidat" and $this->uri->segment(2) != "profil") {
		if(!$this->session->userdata('logged_in')) {
			# back to login
			$this->session->set_flashdata ('alert','Silahkan login terlebih dahulu');
			redirect('auth/', 'refresh');
		}
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
	<!-- Datepicker -->
	<link rel="stylesheet" href="<?= css_url('bootstrap-datepicker.min') ?>">
	<!-- Dynamic CSS Style -->
	<?php if(isset($header_css_file)): ?>
	<?= header_css_file($header_css_file); ?>
	<?php endif; ?>
	<?php if(isset($header_css_url)): ?>
	<?= header_css_url($header_css_url); ?>
	<?php endif; ?>
	<!-- Our CSS Style -->
	<link rel="stylesheet" href="<?= css_url('styles') ?>" />
	<!-- Jquery Latest Compiled and Minified JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<!-- Bootstrap Latest Compiled and Minified JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="<?= js_url('bootstrap-datepicker.min') ?>"></script>
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
</head>
<body>
	<div id="imgModal" class="modal-image">
	  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
	  <img class="modal-content" id="modalImg">
	  <div id="caption"></div>
	</div>
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
					<?php if($this->session->userdata('logged_in')): ?> 
						<li><a href="<?= site_url('kandidat/profil/'.$this->session->userdata('username')) ?>">Profilku</a></li>
					<?php endif; ?>
					<?php if($this->session->userdata('logged_in')): ?> 
						<li><a href="<?= site_url('kandidat/pengaturan')?>">Pengaturan Akun</a></li>
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
	<div class="container-fluid container-profil">
		<div class="profil-background">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-md-offset-1">
						<img src="<?= base_url('profpics_upload/'.$header_info["profpic"]) ?>" alt="<?= $header_info['profpic'] ?>" class="profil-img previewable-image" id="profpic-img" onclick="showImage(this)">
					</div>
					<div class="col-md-8">
						<h1><?= $header_info['name'] ?></h1>
						<h4><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $header_info['kota'] ?>, <?= $header_info['provinsi'] ?></h4>
						<div class="profil-socmed">
							<?php if($this->uri->segment(2) != "pengaturan"): ?>
								<a href="<?= $socmed['fb'] ?>"><i class="fa fa-facebook-square" alt="facebook" aria-hidden="true"></i></a>
								<a href="http://<?= $socmed['twitter'] ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
								<a href="http://<?= $socmed['ig'] ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
								<a href="http://<?= $socmed['blog'] ?>"><i class="fa fa-share-alt-square" aria-hidden="true"></i></a>
								<a href="http://<?= $socmed['video'] ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
							<?php else: ?>
								<a href="<?=site_url('kandidat')?>" class="btn btn-profil-flat">Kembali ke profil</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $content; ?>
	</div>
	<script src="<?= js_url('script') ?>"></script>
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
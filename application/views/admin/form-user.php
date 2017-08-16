<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List Users</title>
	<!-- Bootstrap Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Dynamic CSS Style -->
	<?php if(isset($header_css_file)): ?>
		<?= header_css_file($header_css_file); ?>
	<?php endif; ?>
	<?php if(isset($header_css_url)): ?>
		<?= header_css_url($header_css_url); ?>
	<?php endif; ?>
	<!-- Our CSS Style -->
	<!-- Our CSS Style -->
	<link rel="stylesheet" href="<?= css_url('styles') ?>" />
	<!-- Jquery Latest Compiled and Minified JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<!-- Bootstrap Latest Compiled and Minified JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-centered">
				<h2>Tambah Rekruiter</h2>
				<?php if($this->session->flashdata('message') != null):?>
					<div class="alert alert-<?= $this->session->flashdata('status') ?>" role="alert">
						<?= $this->session->flashdata('message') ?>
					</div>
				<?php endif; ?>
				<?php
					$action = ($this->uri->segment(4) != '') ? $this->uri->segment(4) : 'insert';
				?>
				<form action="<?= base_url('admin/do_'.$action.'_rekruter') ?>" method="post">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" required name="nama" class="form-control" placeholder="Masukkan Nama" />
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" required name="email" class="form-control" placeholder="Masukkan Email" />
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" required name="password" class="form-control" placeholder="Masukkan password" />
					</div>
					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" required name="passconf" class="form-control" placeholder="Masukkan password" />
					</div>
					<div class="form-group">
						<label>Role</label>
						<select name="role" class="form-control">
							<option value="1">Koordinator Rekruter</option>
							<option value="2">Rekruter</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
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
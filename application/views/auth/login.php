<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding-top: 10%;">
			<h1 class="text-center">Selamat Datang!</h1>
			<div class="well col-md-3 col-centered">
				<form action="<?= base_url('auth/do_login') ?>" method="post">
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" type="email" required placeholder="Email Anda" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="password" required type="password" class="form-control" placeholder="Password Anda">
					</div>
					<div class="form-group text-center">
						<button class="btn btn-profil-primary form-control">Submit</button>
					</div>
					<div class="text-center">
						Belum Punya Akun ? <a href="<?= site_url('auth/registration') ?>">Daftar Sekarang</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
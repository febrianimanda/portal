<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Dasar</a>
				</li>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/essay') ?>">Essay</a>
				</li>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/pencapaian') ?>">Pencapaian</a>
				</li>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/project') ?>">Project</a>
				</li>
				<li role="presentation" class="active">
					<a href="<?= site_url('kandidat/pengaturan/akun') ?>">Akun</a>
				</li>
			</ul>
		</div>
		<!-- Form Content -->
		<div class="col-md-8">
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Akun</h3><hr>
					<form action="#" method="post">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Email (tidak dapat diubah)</label>
									<input disabled type="text" name="email" required class="form-control" placeholder="Email Anda">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Password Lama</label>
									<input type="text" name="penanggung_jawab" required class="form-control" placeholder="Tulis password lama anda jika ingin mengganti password">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Password Baru</label>
									<input type="text" name="penanggung_jawab" required class="form-control" placeholder="Tulis password baru anda">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Konfirmasi Password Baru</label>
									<input type="text" name="penanggung_jawab" required class="form-control" placeholder="Tulis ulang password baru anda">
								</div>
							</div>
							<div class="col-md-12">
								<input type="submit" class="btn btn-profil-primary" value="Simpan">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
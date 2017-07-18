<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Dasar</a>
				</li>
				<?php if($menu['rekomendasi'] == true): ?>
					<li role="presentation">
						<a href="<?= site_url('kandidat/pengaturan/rekomendasi') ?>">Rekomendasi</a>
					</li>
				<?php endif; ?>
				<?php if($menu['essay'] == true): ?>
					<li role="presentation">
						<a href="<?= site_url('kandidat/pengaturan/essay') ?>">Essay</a>
					</li>
				<?php endif; ?>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/pencapaian') ?>">Pencapaian</a>
				</li>
				<?php if($menu['project'] == true): ?>
					<li role="presentation">
						<a href="<?= site_url('kandidat/pengaturan/project') ?>">Project</a>
					</li>
				<?php endif; ?>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/komitmen') ?>">Komitmen</a>
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
						<?php if($this->session->flashdata('message') != null):?>
						<div class="alert alert-<?= $this->session->flashdata('status') ?>" role="alert">
							<?= $this->session->flashdata('message') ?>
						</div>
					<?php endif; ?>
				</div>
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
									<label>Password Lama <span class="text-danger">*</span></label>
									<input type="text" name="penanggung_jawab" required class="form-control" placeholder="Tulis password lama anda jika ingin mengganti password">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Password Baru <span class="text-danger">*</span></label>
									<input type="text" name="penanggung_jawab" required class="form-control" placeholder="Tulis password baru anda">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Konfirmasi Password Baru <span class="text-danger">*</span></label>
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
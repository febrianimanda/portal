<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Dasar</a>
				</li>
				<li role="presentation" class="active">
					<a href="<?= site_url('kandidat/pengaturan/rekomendasi') ?>">Rekomendasi</a>
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
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/akun') ?>">Akun</a>
				</li>
			</ul>
		</div>
		<!-- Form Content -->
		<div class="col-md-8">
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Rekomendasi</h3><hr>
					<form action="<?= ($data['status'] == 'update') ? '../do_update_rekomendasi' : '../do_insert_rekomendasi' ?>" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Perekomendasi <span class="text-danger">*</span></label>
									<input type="text" required name="nama_perekomendasi" class="form-control" placeholder="Tulis lengkap nama yang merekomendasi anda" value="<?= $data['nama_perekomendasi'] ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>File Rekomendasi (.pdf) <span class="text-danger">*</span></label>
									<input type="file" required name="file_rekomendasi" class="form-control" placeholder="upload file anda disni"> <?= $data['file_rekomendasi_path'] ?>
								</div>
							</div>
							<div class="col-md-12">
								<input type="submit" value="simpan" class="btn btn-profil-primary">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
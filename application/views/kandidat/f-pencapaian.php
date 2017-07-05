<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Dasar</a>
				</li>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/rekomendasi') ?>">Rekomendasi</a>
				</li>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/essay') ?>">Essay</a>
				</li>
				<li role="presentation" class="active">
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
					<?php if($this->session->flashdata('message') != null):?>
						<div class="alert alert-<?= $this->session->flashdata('status') ?>" role="alert">
							<?= $this->session->flashdata('message') ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-12">
					<h3>Pencapaian</h3><hr>
					<form action="#" method="post">
						<div class="row">
							<div class="col-md-12">
								<h4>Pencapaian 1</h4>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Aktivitas / Pencapaian <span class="text-danger">*</span></label>
									<input type="text" name="aktivitas" required class="form-control" placeholder="Sebutkan nama dari aktivitas / pencapaian ini">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Waktu / Durasi <span class="text-danger">*</span></label>
									<input type="text" name="profpic" required class="form-control" placeholder="Kapan atau lama durasi kegiatan / pencapaian ini berlangsung">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Cakupan Wilayah <span class="text-danger">*</span></label>
									<input type="text" name="profpic" required class="form-control" placeholder="Seberapa besar skala kegiatan / pencapaian ini">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Peran <span class="text-danger">*</span></label>
									<input type="text" name="profpic" required class="form-control" placeholder="Tulis peran anda">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Penyelenggara <span class="text-danger">*</span></label>
									<input type="text" name="profpic" required class="form-control" placeholder="Pihak penyelenggara kegiatan atau pencapaian ini">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Narahubung Penyelenggara kegiatan <span class="text-danger">*</span></label>
									<input type="text" name="profpic" required class="form-control" placeholder="Narahubung yang dapat mempertanggungjawabkan">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Alasan mengapa pencapaian ini merupakan yang terbaik buat anda <span class="text-danger">*</span></label>
									<textarea name="alamat" required class="form-control" rows="3" placeholder="Berikan alasan penguat anda"></textarea>
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
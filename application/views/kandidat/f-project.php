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
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/pencapaian') ?>">Pencapaian</a>
				</li>
				<li role="presentation" class="active">
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
					<h3>Project</h3><hr>
					<form action="../do_update_project/<?= $data['status'] ?>" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Project <span class="text-danger">*</span></label>
									<input type="text" name="nama_project" required class="form-control" placeholder="Sebutkan Nama project ini" value="<?= $data['nama_project'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Penanggung Jawab Project <span class="text-danger">*</span></label>
									<input type="text" name="penanggung_jawab" required class="form-control" placeholder="Siapa Penanggung Jawab dari Project ini" value="<?= $data['penanggung_jawab'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Peran di Project <span class="text-danger">*</span></label>
									<input type="text" name="peran" required class="form-control" placeholder="Tulis Peran anda" value="<?= $data['peran'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Jenis Project <span class="text-danger">*</span></label>
									<input type="text" name="jenis" required class="form-control" placeholder="Tulis jenis project ini" value="<?= $data['jenis'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Lokasi Project <span class="text-danger">*</span></label>
									<input type="text" name="lokasi" required class="form-control" placeholder="Tulis lokasi project ini berada" value="<?= $data['lokasi'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kenapa Project ini Penting ? <span class="text-danger">*</span></label>
									<input type="text" name="alasan_penting" required class="form-control" placeholder="Alasan project ini penting" value="<?= $data['alasan_penting'] ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Apa saja yang dilakukan ? <span class="text-danger">*</span></label>
									<textarea rows="3" name="kegiatan" required class="form-control" placeholder="Apa saja kegiatan yang akan dilakukan dalam project ini"><?= $data['kegiatan'] ?></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Bagaimana FIM bisa meningkatkan nilai manfaat project ini <span class="text-danger">*</span></label>
									<textarea name="supported_fim" required class="form-control" rows="3" placeholder="Bagaimana FIM bisa memberikan dukungan untuk meningkatkan nilai manfaat project ini"><?= $data['supported_fim'] ?></textarea>
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
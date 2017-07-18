<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Dasar</a>
				</li>
				<?php if($menu['rekomendasi'] == true): ?>
					<li role="presentation" class="active">
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
					<h3>Rekomendasi
					<?php if($this->session->userdata('jalur') == 'nextgen'): ?>
						<a class="btn btn-xs floating-btn btn-profil-flat" href="<?= site_url('asset/files/Surat-Rekomendasi-Next-Gen-FIM-19.docx') ?>"> <i class="fa fa-download"></i> Download Format Rekomendasi</a>
					<?php else: ?>
						<a class="btn btn-xs floating-btn btn-profil-flat" href="<?= site_url('asset/files/Surat-Rekomendasi-FIM-19-(non-next-gen).docx') ?>"> <i class="fa fa-download"></i> Download Format Rekomendasi</a>
					<?php endif; ?>
					</h3>
					<hr>
					<form action="../do_update_rekomendasi/<?= $data['status'] ?>" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Nama Perekomendasi <span class="text-danger">*</span></label>
									<input type="text" required name="nama_perekomendasi" class="form-control" placeholder="Tulis lengkap nama yang merekomendasi anda" value="<?= $data['nama_perekomendasi'] ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>File Rekomendasi (.pdf) <span class="text-danger">*</span> <sub>
									</sub>
									</label>
									<input type="file" required name="file_rekomendasi_path" class="form-control" placeholder="upload file anda disni">
									<?php if($data['file_rekomendasi_path'] != ""): ?>
										<a href="<?= site_url('documents_upload/'.$data["file_rekomendasi_path"]) ?>" target="_blank">Lihat file rekomendasi yang telah diupload</a>
									<?php endif; ?>
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
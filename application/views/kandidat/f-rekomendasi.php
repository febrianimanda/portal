<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Dasar
					<?php if($this->session->userdata('jalur') == 'nextgen' or $this->session->userdata('jalur') == 'influencer'): ?>
						<?php if($menu_ready['dasar'] and $menu_ready['video']): ?>
							<i class="fa fa-check-circle menu-done"></i>
						<?php endif; ?>
					<?php else: ?>
						<?php if($menu_ready['dasar']): ?>
							<i class="fa fa-check-circle menu-done"></i>
						<?php endif; ?>
					</a>
					<?php endif; ?>
				</li>
				<?php if($menu['rekomendasi'] == true): ?>
					<li role="presentation" class="active">
						<a href="<?= site_url('kandidat/pengaturan/rekomendasi') ?>">Rekomendasi
							<?php if($menu_ready['rekomendasi']): ?>
								<i class="fa fa-check-circle menu-done"></i>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if($menu['essay'] == true): ?>
					<li role="presentation">
						<a href="<?= site_url('kandidat/pengaturan/essay') ?>">Esai
							<?php if($menu_ready['essay']): ?>
								<i class="fa fa-check-circle menu-done"></i>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/pencapaian') ?>">Pencapaian
						<?php if($menu_ready['pencapaian']): ?>
							<i class="fa fa-check-circle menu-done"></i>
						<?php endif; ?>
					</a>
				</li>
				<?php if($menu['project'] == true): ?>
					<li role="presentation">
						<a href="<?= site_url('kandidat/pengaturan/project') ?>">Proyek
							<?php if($menu_ready['project']): ?>
								<i class="fa fa-check-circle menu-done"></i>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/komitmen') ?>">Final Submit
						<?php if($completed): ?>
							<i class="fa fa-check-circle menu-done"></i>
						<?php endif; ?>
					</a>
				</li>
				<li role="separator" class="divider"></li>
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
					<form action="<?= (!$completed) ? site_url('kandidat/do_update_rekomendasi/'.$data['status']) : '#' ?>" method="post" enctype="multipart/form-data">
						<!-- <div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Nama Perekomendasi <span class="text-danger">*</span></label>
									<input <?= ($completed) ? 'disabled' : '' ?> type="text" required name="nama_perekomendasi" class="form-control" placeholder="Tulis lengkap nama yang merekomendasi anda" value="<?= $data['nama_perekomendasi'] ?>">
								</div>
							</div>
						</div> -->
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Upload Rekomendasi (.pdf) <span class="text-danger">*</span> <sub>
									</sub>
									</label>
									<input <?= ($completed) ? 'disabled' : '' ?> type="file" required name="file_rekomendasi_path" class="form-control" placeholder="upload file anda disni" accept=".pdf">
									<?php if($data['file_rekomendasi_path'] != ""): ?>
										<a href="<?= site_url('documents_upload/'.$data["file_rekomendasi_path"]) ?>" target="_blank">Lihat file rekomendasi yang telah diupload</a>
									<?php endif; ?>
								</div>
							</div>
							<?php if(!$completed): ?>
								<div class="col-md-12">
									<input type="submit" value="simpan" class="btn btn-profil-primary">
								</div>
							<?php endif; ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
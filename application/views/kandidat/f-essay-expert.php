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
					<li role="presentation" class="active">
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
					<h3>$theme</h3><hr>
					<form action="<?= site_url('kandidat/do_update_essay/'.$data['status']) ?>" method="post">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Sertakan portofolio tulisan/artikel/jurnal yang telah Anda buat. Silahkan untuk menyalin tulisan Anda atau tuliskan link nya di bawah ini.<span class="text-danger">*</span></label>
									<textarea name="konten" rows="5" class="form-control" placeholder="Tulis essay anda disini"><?= $data['konten'] ?></textarea>
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
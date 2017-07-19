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
					<li role="presentation">
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
					<li role="presentation" class="active">
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
					<h3>Proyek kolaborasi yang akan dilakukan dengan FIM</h3><hr>
					<form action="<?= (!$completed) ? site_url('kandidat/do_update_project/'.$data['status']) : '#' ?>" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Project <span class="text-danger">*</span></label>
									<input <?= ($completed) ? 'disabled' : '' ?> type="text" name="nama_project" required class="form-control" placeholder="Sebutkan Nama project ini" value="<?= $data['nama_project'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Jenis Project <span class="text-danger">*</span></label>
									<select <?= ($completed) ? 'disabled' : '' ?> name="jenis" class="form-control">
										<option <?= ($data['jenis'] == 'pendidikan') ? 'selected' : '' ?> value="pendidikan">Pendidikan Budaya</option>
										<option <?= ($data['jenis'] == 'sosial') ? 'selected' : '' ?> value="sosial">Sosial</option>
										<option <?= ($data['jenis'] == 'ekonomi') ? 'selected' : '' ?> value="ekonomi">Eknonomi dan Industri Kreatif</option>
										<option <?= ($data['jenis'] == 'iptek') ? 'selected' : '' ?> value="iptek">Sains dan Teknologi</option>
										<option <?= ($data['jenis'] == 'pendidikan') ? 'politik' : '' ?> value="politik">Politik dan Kebijakan Publik</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Apa peran kamu dalam proyek ini? <span class="text-danger">*</span></label>
									<input <?= ($completed) ? 'disabled' : '' ?> type="text" name="peran" required class="form-control" placeholder="Tulis Peran anda" value="<?= $data['peran'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Dimana proyek ini akan dilakukan? <span class="text-danger">*</span></label>
									<input <?= ($completed) ? 'disabled' : '' ?> type="text" name="lokasi" required class="form-control" placeholder="Tulis lokasi project ini dilakukan" value="<?= $data['lokasi'] ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Apa yang dilakukan dalam proyek ini? <span class="text-danger">*</span></label>
									<textarea <?= ($completed) ? 'disabled' : '' ?> rows="3" name="kegiatan" required class="form-control" placeholder="Apa saja kegiatan yang akan dilakukan dalam project ini"><?= $data['kegiatan'] ?></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Apa saja sumberdaya yang dibutuhkan untuk mengeksekusi proyek ini? <span class="text-danger">*</span></label>
									<textarea <?= ($completed) ? 'disabled' : '' ?> rows="3" name="sumberdaya" required class="form-control" placeholder="Sumberdaya yang dibutuhkan"><?= $data['sumberdaya'] ?></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Bagaimana FIM bisa meningkatkan nilai manfaat project ini? (max. 100 kata) <span class="text-danger">*</span></label>
									<textarea <?= ($completed) ? 'disabled' : '' ?> name="supported_fim" required class="form-control" rows="3" placeholder="Bagaimana FIM bisa memberikan dukungan untuk meningkatkan nilai manfaat project ini"><?= $data['supported_fim'] ?></textarea>
								</div>
							</div>
							<?php if(!$completed): ?>
								<div class="col-md-12">
									<input type="submit" class="btn btn-profil-primary" value="Simpan">
								</div>
							<?php endif; ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
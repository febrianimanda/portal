<div class="container profil-content">
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Pengenalan Singkat</h3><hr>
					<h4 class="text-center">"<?= $dasar[0]['biodata_singkat'] ?>"</h4>
				</div>
			</div>
			<?php if($is_me): ?>
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Informasi Akun</h3><hr>
					<div class="row">
						<div class="col-md-1"><i class="fa fa-envelope"></i></div>
						<div class="col-md-10"><?= $dasar[0]['email'] ?></div>
					</div>
					<div class="row">
						<div class="col-md-1"><i class="fa fa-whatsapp"></i></div>
						<div class="col-md-10"><?= $dasar[0]['handphone'] ?></div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Informasi Diri</h3><hr>
					<div class="row">
						<div class="col-md-1"><i class="fa fa-user-circle"></i></div>
						<div class="col-md-10"><?= $dasar[0]['nickname'] ?></div>
					</div>
					<?php if($is_me): ?>
						<div class="row">
							<div class="col-md-1"><i class="fa fa-birthday-cake"></i></div>
							<div class="col-md-10"><?= $dasar[0]['birthdate'] ?></div>
						</div>
					<?php endif; ?>
					<div class="row">
						<div class="col-md-1"><i class="fa fa-male"></i></div>
						<div class="col-md-10"><?= $dasar[0]['gender'] ?></div>
					</div>
					<?php if($is_me): ?>
					<div class="row">
						<div class="col-md-1"><i class="fa fa-tint"></i></div>
						<div class="col-md-10"><?= $dasar[0]['golongan_darah'] ?></div>
					</div>
					<?php endif; ?>
					<div class="row">
						<div class="col-md-1"><i class="fa fa-gratipay"></i></div>
						<div class="col-md-10"><?= $dasar[0]['agama'] ?></div>
					</div>
					<div class="row">
						<div class="col-md-1"><i class="fa fa-graduation-cap"></i></div>
						<div class="col-md-10"><?= $dasar[0]['institusi'] ?>, <?= $dasar[0]['angkatan'] ?></div>
					</div>
				</div>
			</div>
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Hobi</h3><hr>
					<?php $hobies = explode(',', $dasar[0]['hobi']); ?>
					<?php foreach ($hobies as $hobi): ?>
						<span class="label label-info"><?= $hobi ?></span>
					<?php endforeach; ?>
					
				</div>
			</div>
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Keahlian yang dapat ditampilkan</h3><hr>
					<h5><?= $dasar[0]['pertunjukan'] ?></h5>
				</div>
			</div>
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Perekomendasi</h3><hr>
					<h5><?= (isset($rekomendasi[0])) ? $rekomendasi[0]['nama_perekomendasi'] : "<em>Belum ada perekomendasi</em>" ?></h5>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<!-- Essay Section -->
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Essay 
						<?php if($is_me): ?>
							<a href="<?= site_url('kandidat/pengaturan/essay') ?>" class="btn btn-xs btn-profil-flat floating-btn"><i class="fa fa-pencil"></i> Ubah</a>
						<?php endif; ?>
						</h3>
					<hr>
					<p><?= (isset($essay[0])) ? $essay[0]['isi'] : "<em>Essay belum diisi</em>" ?></p>
				</div>
			</div>
			<!-- Pencapaian Section -->
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Pencapaian 
					<?php if($is_me): ?>
						<a href="<?= site_url('kandidat/pengaturan/pencapaian') ?>" class="btn btn-xs btn-profil-flat floating-btn"><i class="fa fa-pencil"></i> Ubah</a>
					<?php endif; ?>
					</h3>
					<hr>
					<div class="row profil-pencapaian">
						<?php if(isset($pencapaian[0])): ?>
							<div class="col-md-12">
								<span class="floating-label label label-info"><?= $pencapaian['cakupan'] ?></span>
								<h4><strong><?= $pencapaian[0]['pencapaian'] ?></strong></h4>
								<?php $role = $this->session->userdata('role'); ?> 
								<h5>Peran: <?= $pencapaian[0]['peran'] ?> | Penyelenggara: <?= $pencapaian[0]['penyelanggara'] ?> | <?= $pencapaian[0]['waktu_durasi'] ?> <?= ($role >= 1 and $role <= 3) ?> | Narahubung: <?= $pencapaian[0]['penanggung_jawab'] ?> </h5>
								<p><?= $pencapaian['alasan'] ?></p>
							</div>
						<?php else: ?>
							<div class="col-md-12">
								<p><em>Belum ada pencapaian yang diisi</em></p>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
			<!-- Project Section -->
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Project 
					<?php if($is_me): ?>
						<a href="<?= site_url('profil/pengaturan/project') ?>" class="btn btn-xs btn-profil-flat floating-btn"><i class="fa fa-pencil"></i> Ubah</a>
					<?php endif; ?>
					</h3>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<?php if(isset($project[0])): ?>
								<span class="floating-label label label-info"><?= $project['jenis'] ?></span>
								<h4><strong><?= $project['nama_project'] ?></strong></h4>
								<h5>Lokasi: <?= $project['lokasi'] ?> | Penanggung Jawab: <?= $project['penanggung_jawab'] ?> | Peran: <?= $project['peran'] ?></h5>
								<h5><strong>Alasan Project ini Penting</strong></h5>
								<p><?= $project['alasan_penting'] ?></p>
								<h5><strong>Kegiatan yang akan dilakukan</strong></h5>
								<p><?= $project['kegiatan'] ?></p>
								<h5><strong>Bagaimana FIM bisa meningkatkan nilai manfaat project ini</strong></h5>
								<p><?= $project['support_fim'] ?></p>
							<?php else: ?>
								<p><i>Project belum diisi</i></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
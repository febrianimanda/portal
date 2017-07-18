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
			<?php if($section['essay']): ?>
				<div class="row profil-row">
					<div class="col-md-12">
						<h3> Essay
							<?php if($is_me): ?>
								<a href="<?= site_url('kandidat/pengaturan/essay') ?>" class="btn btn-xs btn-profil-flat floating-btn"><i class="fa fa-pencil"></i> Ubah</a>
							<?php endif; ?>
							</h3>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<h4>Tema: <?= $theme ?></h4>
								<p><?= (isset($essay[0])) ? $essay[0]['konten'] : "<em>Essay belum diisi</em>" ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
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
						<?php if(sizeof($pencapaian) > 0): ?>
							<?php foreach ($pencapaian as $achieve): ?>
								<div class="col-md-12">
									<span class="floating-label label label-info"><?= $achieve['cakupan'] ?></span>
									<h4><strong><?= $achieve['nama_pencapaian'] ?></strong></h4>
									<?php $role = $this->session->userdata('role'); ?> 
									<h5>Peran: <?= $achieve['peran'] ?> | Penyelenggara: <?= $achieve['penyelenggara'] ?> | <?= $achieve['waktu_durasi'] ?> <?= ($role >= 1 and $role <= 3) ?> | Narahubung: <?= $achieve['narahubung'] ?> </h5>
									<p><?= $achieve['alasan'] ?></p>
								</div>
							<?php endforeach; ?>
						<?php else: ?>
							<div class="col-md-12">
								<p><em>Belum ada pencapaian yang diisi</em></p>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
			<!-- Project Section -->
			<?php if($section['project']): ?>
				<div class="row profil-row">
					<div class="col-md-12">
						<h3>Project 
						<?php if($is_me): ?>
							<a href="<?= site_url('kandidat/pengaturan/project') ?>" class="btn btn-xs btn-profil-flat floating-btn"><i class="fa fa-pencil"></i> Ubah</a>
						<?php endif; ?>
						</h3>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<?php if(isset($project[0])): ?>
									<?php if($jalur != 'nextgen'): ?>
										<span class="floating-label label label-info"><?= $project[0]['jenis'] ?></span>
										<h4><strong><?= $project[0]['nama_project'] ?></strong></h4>
										<h5><strong>Lokasi:</strong> <?= $project[0]['lokasi'] ?> | <strong>Peran:</strong> <?= $project[0]['peran'] ?></h5>
										<h5><strong>Kegiatan yang akan dilakukan</strong></h5>
										<p><?= $project[0]['kegiatan'] ?></p>
										<h5><strong>Sumberdaya yang dibutuhkan</strong></h5>
										<p><?= $project[0]['sumberdaya'] ?></p>
										<h5><strong>Bagaimana FIM bisa meningkatkan nilai manfaat project ini</strong></h5>
										<p><?= $project[0]['supported_fim'] ?></p>
									<?php else: ?>
										<h5><strong>Lokasi:</strong> <?= $project[0]['lokasi'] ?> | <strong>Peran:</strong> <?= $project[0]['peran'] ?></h5>
										<h5><strong>Hal menginspirasi ketika magang</strong></h5>
										<p><?= ($project[0]['hasil_magang'] != NULL) ? $project[0]['hasil_magang'] : '-' ?></p>
										<h5><strong>Kegiatan yang akan dilakukan</strong></h5>
										<p><?= ($project[0]['kegiatan'] != NULL) ? $project[0]['kegiatan'] : '-' ?></p>
										<h5><strong>Sumberdaya yang dibutuhkan</strong></h5>
										<p><?= ($project[0]['sumberdaya'] != NULL) ? $project[0]['sumberdaya'] : '-' ?></p>
										<h5><strong>Timeline kegiatan</strong></h5>
										<p><?= ($project[0]['timeline'] != NULL) ? $project[0]['timeline'] : '-' ?></p>
									<?php endif; ?>
								<?php else: ?>
									<p><i>Project belum diisi</i></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
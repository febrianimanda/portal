<div class="container profil-content">
	
	<style type="text/css">
		#myBtn {
		    display: none; /* Hidden by default */
		    position: fixed; /* Fixed/sticky position */
		    bottom: 20px; /* Place the button at the bottom of the page */
		    right: 30px; /* Place the button 30px from the right */
		    z-index: 99; /* Make sure it does not overlap */
		    border: none; /* Remove borders */
		    outline: none; /* Remove outline */
		    background-color: red; /* Set a background color */
		    color: white; /* Text color */
		    cursor: pointer; /* Add a mouse pointer on hover */
		    padding: 15px; /* Some padding */
		    border-radius: 10px; /* Rounded corners */
		}

		#myBtn:hover {
		    background-color: #555; /* Add a dark-grey background on hover */
		}

	</style>

	<script>
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		        document.getElementById("myBtn").style.display = "block";
		    } else {
		        document.getElementById("myBtn").style.display = "none";
		    }
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
		    document.body.scrollTop = 0; // For Chrome, Safari and Opera 
		    document.documentElement.scrollTop = 0; // For IE and Firefox
		}

	</script>
	<button	onclick="topFunction()" id="myBtn" title="Go to top">Kembali ke Atas</button>
	
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
			<div class="row profil-row">
				<form class="form-horizontal" method="post" action="<?= site_url('rekruter/do_nilai/'.$capes_username) ?>">
					<div class="col-md-12 form-group">
						<h3>Nilai</h3><hr>
						<div class="col-md-12 form-group">
							<label>CV</label>
							<input type="number" name="nilai_cv" class="form-control" placeholder="0 - 100" min="1" max="100" value="<?= $nilai['nilai_cv'] ?>" required>
						</div>
						<div class="col-md-12 form-group">
							<label>Esai</label>
							<input type="number" name="nilai_esai" class="form-control" placeholder="0 - 100" min="1" max="100" value="<?= $nilai['nilai_esai'] ?>" required>
						</div>
						<div class="col-md-12 form-group">
							<label>Pencapaian</label>
							<input type="number" name="nilai_pencapaian" class="form-control" placeholder="0 - 100" min="1" max="100" value="<?= $nilai['nilai_pencapaian'] ?>" required>
						</div>
						<div class="col-md-12 form-group">
							<label>Kelengkapan Berkas</label>
							<input type="number" name="nilai_kelengkapan" class="form-control" placeholder="0 - 100" min="1" max="100" value="<?= $nilai['nilai_kelengkapan'] ?>" required>
						</div>
						<div class="col-md-12 form-group">
							<label>Potensi Capes</label>
							<textarea name="ket_potensi" rows="3" class="form-control" placeholder="Bagaimana potensi capes untuk FIM" required><?= $nilai['ket_potensi'] ?></textarea>
						</div>
						<div class="col-md-12 form-group">
							<label>Catatan Khusus</label>
							<textarea type="text" name="ket_khusus" rows="3" class="form-control" placeholder="Catatan Khusus Mengenai Capes" required><?= $nilai['ket_khusus'] ?></textarea>
						</div>
						<div class="col-md-12 form-group">
							<label>Direkomendasikan atau Tidak</label>
							<textarea type="text" name="ket_rekomendasi" rows="4" class="form-control" placeholder="Rekomendasi untuk tahap selanjutnya" required><?= $nilai['ket_rekomendasi'] ?></textarea>
						</div>
						<div class="col-md-12 form-group">
							<input type="submit" class="form-control btn btn-profil-flat" value="Simpan" required>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-7">
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Pengenalan Singkat</h3><hr>
					<h4 class="text-center">"<?= $dasar[0]['biodata_singkat'] ?>"</h4>
				</div>
			</div>
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Informasi Akun</h3><hr>
					<div class="row">
						<div class="col-xs-1"><i class="fa fa-envelope"></i></div>
						<div class="col-xs-10"><?= $dasar[0]['email'] ?></div>
					</div>
					<div class="row">
						<div class="col-xs-1"><i class="fa fa-whatsapp"></i></div>
						<div class="col-xs-10"><?= $dasar[0]['handphone'] ?></div>
					</div>
				</div>
			</div>
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Informasi Diri</h3><hr>
					<div class="row">
						<div class="col-xs-1"><i class="fa fa-user-circle"></i></div>
						<div class="col-xs-10"><?= $dasar[0]['nickname'] ?></div>
					</div>
					<div class="row">
						<div class="col-xs-1"><i class="fa fa-birthday-cake"></i></div>
						<div class="col-xs-10"><?= $dasar[0]['birthdate'] ?></div>
					</div>
					<div class="row">
						<div class="col-xs-1"><i class="fa fa-male"></i></div>
						<div class="col-xs-10"><?= $dasar[0]['gender'] ?></div>
					</div>
					<div class="row">
						<div class="col-xs-1"><i class="fa fa-tint"></i></div>
						<div class="col-xs-10"><?= $dasar[0]['golongan_darah'] ?></div>
					</div>
					<div class="row">
						<div class="col-xs-1"><i class="fa fa-gratipay"></i></div>
						<div class="col-xs-10"><?= $dasar[0]['agama'] ?></div>
					</div>
					<div class="row">
						<div class="col-xs-1"><i class="fa fa-graduation-cap"></i></div>
						<div class="col-xs-10"><?= $dasar[0]['institusi'] ?>, <?= $dasar[0]['angkatan'] ?></div>
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
					<h3>Surat Rekomendasi & KTP</h3><hr>
					<a target="blank" href="<?= site_url('documents_upload/'.$rekomendasi[0]['file_rekomendasi_path']) ?>" class="btn btn-sm btn-profil-flat">Lihat Rekomendasi</a>
					<a target="blank" href="<?= site_url('ktp_upload/'.$dasar[0]['ktp_path']) ?>" class="btn btn-sm btn-profil-flat">Lihat KTP</a>
				</div>
			</div>

			<!-- Essay Section -->
			<?php if($section['essay']): ?>
				<div class="row profil-row">
					<div class="col-md-12">
						<h3> Esai </h3>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<h4>Tema: <?= $theme ?></h4>
								<p><?= (isset($essay[0])) ? $essay[0]['konten'] : "<em>Esai belum diisi</em>" ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<!-- Pencapaian Section -->
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Pencapaian </h3>
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
						<h3>Proyek </h3>
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
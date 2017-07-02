<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Dasar</a>
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
					<h3>Project</h3><hr>
					<form action="#" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Project</label>
									<input type="text" name="nama_project" required class="form-control" placeholder="Sebutkan Nama project ini">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Penanggung Jawab Project</label>
									<input type="text" name="penanggung_jawab" required class="form-control" placeholder="Siapa Penanggung Jawab dari Project ini">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Peran di Project</label>
									<input type="text" name="peran" required class="form-control" placeholder="Tulis Peran anda">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Jenis Project</label>
									<input type="text" name="jenis" required class="form-control" placeholder="Tulis jenis project ini">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Lokasi Project</label>
									<input type="text" name="lokasi" required class="form-control" placeholder="Tulis lokasi project ini berada">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kenapa Project ini Penting ?</label>
									<input type="text" name="alasan_penting" required class="form-control" placeholder="Alasan project ini penting">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Apa saja yang dilakukan ?</label>
									<textarea rows="3" name="kegiatan" required class="form-control" placeholder="Apa saja kegiatan yang akan dilakukan dalam project ini"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Bagaimana FIM bisa meningkatkan nilai manfaat project ini</label>
									<textarea name="support_fim" required class="form-control" rows="3" placeholder="Bagaimana FIM bisa memberikan dukungan untuk meningkatkan nilai manfaat project ini"></textarea>
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
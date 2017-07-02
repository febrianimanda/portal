<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation" class="active">
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Data Utama</a>
				</li>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/essay') ?>">Essay</a>
				</li>
				<li role="presentation">
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
			<form action="#" method="post">
				<!-- Informasi Dasar  -->
				<div class="row profil-row">
					<div class="col-md-12">
						<h3>Informasi Dasar</h3><hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Foto Profil</label>
									<input type="file" name="profpic" accept="image/*" required class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Lengkap <span class="text-danger">*</span></label>
									<input type="text" required name="fullname" placeholder="Nama Lengkap Anda" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>No. Handphone <span class="text-danger">*</span></label>
									<input name="handphone" required type="number" class="form-control" placeholder="No. Handphone Anda yang aktif">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>No. Darurat Yang Dapat Dihubungi <span class="text-danger">*</span></label>
									<input name="emergency_number" required type="number" class="form-control" placeholder="Bisa Nomor teman terdekat Anda atau Orang Tua Anda">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Provinsi <span class="text-danger">*</span></label>
									<select name="provinsi" class="form-control">
										<option disabled selected value>Pilih Provinsi</option>
										<?php foreach ($provinsi as $row): ?>
											<option value="<?= $row->nama_provinsi ?>"><?= $row->nama_provinsi ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kota / Kabupaten <span class="text-danger">*</span></label>
									<input type="text" name="kota" required class="form-control" placeholder="Kota/Kabupaten Tempat Anda Tinggal Saat Ini">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Alamat Tinggal Saat Ini <span class="text-danger">*</span></label>
									<textarea name="alamat" required class="form-control" rows="3" placeholder="Alamat Lengkap Tempat Tinggal Anda Saat Ini"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Informasi Personal -->
				<div class="row profil-row">
					<div class="col-md-12">
						<h3>Informasi Personal</h3><hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Panggilan <span class="text-danger">*</span></label>
									<input name="nickname" required type="text" class="form-control" placeholder="Nama Akrab Anda">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Tanggal Lahir <span class="text-danger">*</span></label>
									<input name="birthdate" required type="date" class="form-control" placeholder="Tanggal Lahir Anda">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Jenis Kelamin <span class="text-danger">*</span></label>
									<div class="radio">
										<label><input type="radio" name="gender" value="laki-laki">Laki-Laki</label> &nbsp;
										<label><input type="radio" name="gender" value="perempuan">Perempuan</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Golongan Darah <span class="text-danger">*</span></label>
									<div class="radio">
										<label><input type="radio" name="golongan_darah" value="A">A</label>&nbsp;
										<label><input type="radio" name="golongan_darah" value="B">B</label>&nbsp;
										<label><input type="radio" name="golongan_darah" value="AB">AB</label>&nbsp;
										<label><input type="radio" name="golongan_darah" value="O">O</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Agama <span class="text-danger">*</span></label>
									<select name="agama" id="" class="form-control">
										<option disabled selected value>Pilih Agama</option>
										<?php foreach ($agama as $row): ?>
											<option value="<?= $row->agama ?>"><?= $row->agama ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Alergi Makanan</label>
									<input type="text" name="alergi_makanan" class="form-control" placeholder='contoh: Udang'>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Institusi Pendidikan Terakhir <span class="text-danger">*</span></label>
									<input type="text" name="institusi" required placeholder="contoh: Telkom University" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Angkatan Masuk <span class="text-danger">*</span></label>
									<input type="number" name="angkatan" required class="form-control" placeholder="contoh: 2013">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Hobi <span class="text-danger">*</span></label>
									<input type="text" name="hobi" required placeholder="Pisahkan dengan koma" class="form-control" data-role="tagsinput">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Keahlian yang dapat ditampilkan <span class="text-danger">*</span></label>
									<input type="text" name="pertunjukan" required class="form-control" placeholder="contoh: Tari Piring">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Informasi Social Media -->
				<div class="row profil-row">
					<div class="col-md-12">
						<h3>Informasi Social Media</h3><hr/>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Id Line <span class="text-danger">*</span></label>
									<input type="text" name="line" required placeholder="Id Line Anda yang Aktif" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Link Facebook <span class="text-danger">*</span></label>
									<input type="text" name="fb" required class="form-control" placeholder='Contoh: https://facebook.com/ForumIndonesiaMuda/'>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Id atau Link Twitter <span class="text-danger">*</span></label>
									<input type="text" name="twitter" required class="form-control" placeholder='Contoh: fimnews atau https://twitter.com/fimnews'>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Id atau Link Instagram <span class="text-danger">*</span></label>
									<input type="text" name="instagram" required class="form-control" placeholder='Contoh: fimnews atau https://instagram.com/fimnews'>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Link Blog atau Tumblr <span class="text-danger">*</span></label>
									<input type="text" name="blog" required class="form-control" placeholder='Blogger, Wordpress, Tumblr atau Personal Website untuk blogging'>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="submit" class="btn btn-profil-primary" value="Simpan">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
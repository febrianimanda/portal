<div class="container">
	<div class="row" style="padding-top: 10%;">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Form Pendaftaran Akun Capes FIM 19</h4>
				</div>
				<div class="panel-body">
					<form action="<?= base_url('auth/do_registration') ?>" method="post">
						<div class="row">
							<div class="col-md-12">
								<h3>Informasi Dasar</h3><hr/>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Jalur Masuk <span class="text-danger">*</span></label>
									<select name="jalur" required class="form-control">
										<option disabled selected value>Pilih Jalur Masuk</option>
										<?php foreach ($jalur as $row): ?>
											<option value="<?= $row->key ?>"><?= $row->details ?> (<?= $row->percentage ?>%)</option>
										<?php endforeach; ?>
									</select>
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
									<label>Username <span class="text-danger">*</span></label>
									<input type="email" required name="username" placeholder="Masukkan Username untuk akun anda" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Email <span class="text-danger">*</span></label>
									<input type="email" required name="email" placeholder="Email Anda" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Password <span class="text-danger">*</span></label>
									<input name="password" required type="password" class="form-control" placeholder="Password Anda">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Konfirmasi Password <span class="text-danger">*</span></label>
									<input name="passconf" required type="password" class="form-control" placeholder="Konfirmasi Password Anda">
								</div>
							</div>
						</div>
						<div class="row">
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
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Provinsi <span class="text-danger">*</span></label>
									<select name="provinsi" class="form-control">
										<option disabled selected value>Pilih Provinsi</option>
										<?php foreach ($provinsi as $row): ?>
											<option value="<?= $row->nama_provinsi ?>"><?= $row->nama_provinsi ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kota / Kabupaten <span class="text-danger">*</span></label>
									<input type="text" name="kota" required class="form-control" placeholder="Kota/Kabupaten Tempat Anda Tinggal Saat Ini">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Alamat Tinggal Saat Ini <span class="text-danger">*</span></label>
									<textarea name="alamat" required class="form-control" rows="3" placeholder="Alamat Lengkap Tempat Tinggal Anda Saat Ini"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h3>Informasi Personal</h3><hr/>
							</div>
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
						</div>
						<div class="row">
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
						</div>
						<div class="row">
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
						</div>
						<div class="row">
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
						</div>
						<div class="row">
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
						<div class="row">
							<div class="col-md-12">
								<h3>Informasi Social Media</h3><hr/>
							</div>
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
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tau Informasi FIM <span class="text-danger">*</span></label>
									<?php foreach ($info as $row): ?>
										<div class="checkbox">
										  <label>
										    <input type="checkbox" name="info_fim[]" value="<?= $row->keterangan ?>"> <?= $row->keterangan ?>
										  </label>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Persetujuan <span class="text-danger">*</span></label>
									<div class="checkbox">
									  <label><input type="checkbox">Dengan ini saya menyatakan bahwa data yang saya berikan diatas adalah benar</label>
									</div>
									<input type="submit" class="btn btn-profil-primary" value="Simpan">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
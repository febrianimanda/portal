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
								<h3>Informasi Akun</h3><hr/>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Jalur Masuk</label>
									<select name="jalur_masuk" required class="form-control">
										<option disabled selected value>Pilih Jalur Masuk</option>
										<option value="nextgen">Next Generation (70%)</option>
										<option value="young">Young Professional (3%)</option>
										<option value="influencer">Influencer (3%)</option>
										<option value="military">Military (3%)</option>
										<option value="campus">Campus Leader (3%)</option>
										<option value="talent">Talent Scout (10%)</option>
										<option value="civil">Civil Organization (3%)</option>
										<option value="servant">Public Servant (3%)</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Nama Lengkap</label>
									<input type="text" required name="fullname" placeholder="Nama Lengkap Anda" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Email</label>
									<input type="email" required name="email" placeholder="Email Anda" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Password</label>
									<input name="password" required type="password" class="form-control" placeholder="Password Anda">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Konfirmasi Password</label>
									<input name="passconf" required type="password" class="form-control" placeholder="Konfirmasi Password Anda">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">No. Handphone</label>
									<input name="handphone" required type="number" class="form-control" placeholder="No. Handphone Anda yang aktif">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">No. Darurat Yang Dapat Dihubungi</label>
									<input name="handphone" required type="number" class="form-control" placeholder="Bisa Nomor teman terdekat Anda atau Orang Tua Anda">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Provinsi</label>
									<select name="provinsi" class="form-control">
										<option disabled selected value>Pilih Provinsi</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kota / Kabupaten</label>
									<input type="text" name="kota" required class="form-control" placeholder="Kota/Kabupaten Tempat Anda Tinggal Saat Ini">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Alamat Tinggal Saat Ini</label>
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
									<label>Nama Panggilan</label>
									<input name="nickname" required type="text" class="form-control" placeholder="Nama Akrab Anda">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input name="birthdate" required type="date" class="form-control" placeholder="Tanggal Lahir Anda">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<div class="radio">
										<label><input type="radio" name="gender" value="laki-laki">Laki-Laki</label> &nbsp;
										<label><input type="radio" name="gender" value="perempuan">Perempuan</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Golongan Darah</label>
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
									<label>Agama</label>
									<select name="agama" id="" class="form-control">
										<option disabled selected value>Pilih Agama</option>
										<option value="islam">Islam</option>
										<option value="islam">Kristen Khatolik</option>
										<option value="islam">Kristen Protestan</option>
										<option value="islam">Hindu</option>
										<option value="islam">Budha</option>
										<option value="islam">Lainnya</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Alergi Makanan</label>
									<input type="text" name="alergi" required class="form-control" placeholder="contoh: Udang">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Institusi Pendidikan Terakhir</label>
									<input type="text" name="institusi" required placeholder="contoh: Telkom University" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Angkatan Masuk</label>
									<input type="number" name="angkatan" required class="form-control" placeholder="contoh: 2013">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Hobi</label>
									<input type="text" name="hobi" required placeholder="Pisahkan dengan koma" class="form-control" data-role="tagsinput">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Keahlian yang dapat ditampilkan</label>
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
									<label>Id Line</label>
									<input type="text" name="line" required placeholder="Id Line Anda yang Aktif" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Link Facebook</label>
									<input type="text" name="pertunjukan" required class="form-control" placeholder='Contoh: https://facebook.com/ForumIndonesiaMuda/'>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Id atau Link Twitter</label>
									<input type="text" name="pertunjukan" required class="form-control" placeholder='Contoh: fimnews atau https://twitter.com/fimnews'>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Id atau Link Instagram</label>
									<input type="text" name="pertunjukan" required class="form-control" placeholder='Contoh: fimnews atau https://instagram.com/fimnews'>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Link Blog atau Tumblr</label>
									<input type="text" name="pertunjukan" required class="form-control" placeholder='Blogger, Wordpress, Tumblr atau Personal Website untuk blogging'>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="checkbox">
								  <label><input type="checkbox">Dengan ini saya menyatakan bahwa data yang saya berikan diatas adalah benar</label>
								</div>
								<input type="submit" class="btn btn-primary">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
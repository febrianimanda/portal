<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation" class="active">
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Dasar</a>
				</li>
				<?php if($menu['rekomendasi'] == true): ?>
					<li role="presentation">
						<a href="<?= site_url('kandidat/pengaturan/rekomendasi') ?>">Rekomendasi</a>
					</li>
				<?php endif; ?>
				<?php if($menu['essay'] == true): ?>
					<li role="presentation">
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
			<form action="<?= site_url('kandidat/do_update_dasar') ?>" method="post" enctype="multipart/form-data">
				<!-- Informasi Dasar  -->
				<div class="row profil-row">
					<div class="col-md-12">
						<?php if($this->session->flashdata('message') != null):?>
							<div class="alert alert-<?= $this->session->flashdata('status') ?>" role="alert">
								<?= $this->session->flashdata('message') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="col-md-12">
						<h3>Informasi Dasar</h3><hr>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Biodata Singkat</label>
									<input type="text" name="biodata_singkat" class="form-control" value="<?= $data['biodata_singkat'] ?>" placeholder="Tuliskan Bidata Singkat Anda"> 
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Foto Profil <span class="text-danger">*</span> <sub>(dengan dimensi persegi, wajah harus terlihat jelas)</sub></label>
									<input type="file" name="profpic_path" accept="image/*" class="form-control"> 
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Lengkap <span class="text-danger">*</span></label>
									<input type="text" required name="fullname" placeholder="Nama Lengkap Anda" class="form-control" value="<?= $data['fullname'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Username <span class="text-danger">*</span></label>
									<input type="text" required name="username" placeholder="Nama Lengkap Anda" class="form-control" value="<?= $data['username'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>No. Handphone <span class="text-danger">*</span></label>
									<input name="handphone" required type="text" class="form-control" placeholder="No. Handphone Anda yang aktif" value="<?= $data['handphone'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>No. Darurat Yang Dapat Dihubungi <span class="text-danger">*</span></label>
									<input name="emergency_number" required type="text" class="form-control" placeholder="Bisa Nomor teman terdekat Anda atau Orang Tua Anda" value="<?= $data['emergency_number'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="form-group">
										<label>Negara <span class="text-danger">*</span></label>
										<select name="country" class="form-control" id="country-selectbox">
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Provinsi (Region)<span class="text-danger">*</span></label>
									<div id="province-box">
										<?php if($data['country'] == 'Indonesia'): ?>
											<select name="provinsi" class="form-control">
												<option disabled selected value>Pilih Provinsi</option>
												<?php foreach ($provinsi as $row): ?>
													<option value="<?= $row['nama_provinsi'] ?>" <?= ($row['nama_provinsi'] == $data['provinsi']) ? "selected" : "" ?>> <?= $row['nama_provinsi'] ?></option>
												<?php endforeach ?>
											</select>
										<?php else: ?>
											<input type="text" name="provinsi" class="form-control" value="<?= $data['provinsi'] ?>">
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kota / Kabupaten (City)<span class="text-danger">*</span></label>
									<input type="text" name="kota" required class="form-control" placeholder="Kota/Kabupaten Tempat Anda Tinggal Saat Ini" value="<?= $data['kota'] ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Alamat Tinggal Saat Ini <span class="text-danger">*</span></label>
									<textarea name="alamat" required class="form-control" rows="3" placeholder="Alamat Lengkap Tempat Tinggal Anda Saat Ini"><?= $data['alamat'] ?></textarea>
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
							<div class="col-md-12">
								<div class="form-group">
									<label>Foto KTP <span class="text-danger">*</span></label>
									<input type="file" name="ktp_path" accept="image/*" class="form-control">
									<?php if($data['ktp_path'] != ""): ?>
										<img src="<?= base_url('ktp_upload/'.$data['ktp_path']) ?>" alt="<?= $data['ktp_path'] ?>" style="display:none" id="ktp_pic">
										<a href="#" onclick="showImage('ktp_pic', true)">Lihat Foto KTP</a>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Panggilan <span class="text-danger">*</span></label>
									<input name="nickname" required type="text" class="form-control" placeholder="Nama Akrab Anda" value="<?= $data['nickname'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Tanggal Lahir (mm/dd/yyyy) <span class="text-danger">*</span></label>
									<input name="birthdate" id="birthdatepicker" required type="text" class="form-control" placeholder="Tanggal Lahir Anda" value="<?= $data['birthdate'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Jenis Kelamin <span class="text-danger">*</span></label>
									<div class="radio">
										<label><input type="radio" <?= ($data['gender'] == 'laki-laki') ? "checked" : "" ?> name="gender" value="laki-laki">Laki-Laki</label> &nbsp;
										<label><input type="radio" <?= ($data['gender'] == 'perempuan') ? "checked" : "" ?> name="gender" value="perempuan">Perempuan</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Golongan Darah <span class="text-danger">*</span></label>
									<div class="radio">
										<label><input type="radio" <?= ($data['golongan_darah'] == 'A') ? "checked" : "" ?> name="golongan_darah" value="A">A</label>&nbsp;
										<label><input type="radio" <?= ($data['golongan_darah'] == 'B') ? "checked" : "" ?> name="golongan_darah" value="B">B</label>&nbsp;
										<label><input type="radio" <?= ($data['golongan_darah'] == 'AB') ? "checked" : "" ?> name="golongan_darah" value="AB">AB</label>&nbsp;
										<label><input type="radio" <?= ($data['golongan_darah'] == 'O') ? "checked" : "" ?> name="golongan_darah" value="O">O</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Agama <span class="text-danger">*</span></label>
									<select name="agama" id="" class="form-control">
										<option disabled selected value>Pilih Agama</option>
										<?php foreach ($agama as $row): ?>
											<option <?= ($row['agama'] == $data['agama']) ? "selected" : "" ?> value="<?= $row['agama'] ?>"><?= $row['agama'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Alergi Makanan</label>
									<input type="text" name="alergi_makanan" class="form-control" placeholder='contoh: Udang' value="<?= $data['alergi_makanan'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Institusi Pendidikan Terakhir <span class="text-danger">*</span></label>
									<input type="text" name="institusi" required placeholder="contoh: Telkom University" class="form-control" value="<?= $data['institusi'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Angkatan Masuk <span class="text-danger">*</span></label>
									<input type="number" name="angkatan" required class="form-control" placeholder="contoh: 2013" value="<?= $data['angkatan'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Hobi <span class="text-danger">*</span></label>
									<input type="text" name="hobi" required placeholder="Pisahkan dengan koma" class="form-control" data-role="tagsinput" value="<?= $data['hobi'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Keahlian yang dapat ditampilkan <span class="text-danger">*</span></label>
									<input type="text" name="pertunjukan" required class="form-control" placeholder="contoh: Tari Piring" value="<?= $data['pertunjukan'] ?>">
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
									<label>Id Line</label>
									<input type="text" name="line" placeholder="Id Line Anda yang Aktif" class="form-control" value="<?= $data['line'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Link Facebook</label>
									<input type="text" name="fb" class="form-control" placeholder='Contoh: https://facebook.com/ForumIndonesiaMuda/' value="<?= $data['fb'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Id atau Link Twitter</label>
									<input type="text" name="twitter" class="form-control" placeholder='Contoh: fimnews atau https://twitter.com/fimnews' value="<?= $data['twitter'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Id atau Link Instagram</label>
									<input type="text" name="instagram" class="form-control" placeholder='Contoh: fimnews atau https://instagram.com/fimnews' value="<?= $data['instagram'] ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Link Blog atau Tumblr</label>
									<input type="text" name="blog" class="form-control" placeholder='Blogger, Wordpress, Tumblr atau Personal Website untuk blogging' value="<?= $data['blog'] ?>">
								</div>
							</div>
							<?php $jalur = $this->session->userdata('jalur'); ?>
							<div class="col-md-12">
								<div class="form-group">
									<label>Sertakan karya Anda berupa profil singkat diri Anda beserta alasan mengapa ingin bergabung dalam keluarga besar FIM. Silahkan tuliskan link nya di bawah ini. (instagram, youtube)
										<?php if($jalur == 'nextgen' or $jalur == 'influencer'): ?>
											<span class="text-danger">*</span>
										<?php endif; ?>
									</label>
									<input type="text" name="video_profile" class="form-control" placeholder='Link Youtube atau Instagram. Pastikan tidak private account.' value="<?= $data['video_profile'] ?>">
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

<script>
	$(document).ready(function(){
		$('#birthdatepicker').datepicker();
		$.ajax({
			method: 'GET',
			url: 'https://restcountries.eu/rest/v2/all',
		}).done(function(data){
			// console.log(data);
			var html = "<option disabled selected value>Pilih Negara</option>";
			for (var i = 0; i < data.length; i++) {
				if(data[i].name == "<?= $data['country'] ?>"){
					html += "<option value='"+data[i].name+"' selected>"+data[i].name+"</option>";
				} else {
					html += "<option value='"+data[i].name+"'>"+data[i].name+"</option>";
				}
			}
			$('#country-selectbox').html(html);
		});

		$('#country-selectbox').change(function(){
			if($(this).val() == 'Indonesia'){
				loadIndonesiaProvince();
			} else {
				html = '<input name="provinsi" class="form-control" placeholder="Provinsi atau Region anda Tinggal Saat Ini" />';
				$('#province-box').html(html);
			}
		});
	});

	function loadIndonesiaProvince(selected){
		$.ajax({
			method: 'GET',
			url: '<?= site_url('kandidat/get_all_province') ?>',
		}).done(function(datas){
			data = JSON.parse(datas);
			var html = '<select name="provinsi" class="form-control">';
			html += '	<option disabled selected value>Pilih Provinsi</option>';
			for (var i = 0; i < data.length; i++) {
				if(data[i].name != "<?= $data['provinsi'] ?>")
					html += "	<option value='"+data[i].nama_provinsi+"'>"+data[i].nama_provinsi+"</option>";
				else {
					html += "	<option value='"+data[i].nama_provinsi+"' selected >"+data[i].nama_provinsi+"</option>";
				}
			}
			html += '</select>';
			$('#province-box').html(html);
		});
	}
</script>
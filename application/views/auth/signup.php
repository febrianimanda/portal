<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding-top: 10%;">
			<h1 class="text-center">Daftar Akun Baru</h1>
			<div class="well col-md-6 col-centered">
				<div class="row">
					<div class="col-md-12 text-center">
						<?php if($this->session->flashdata('message') != null):?>
							<div class="alert alert-<?= $this->session->flashdata('status') ?>" role="alert">
								Maaf terjadi kesalahan: <br>
								<?= $this->session->flashdata('message') ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<form action="<?= base_url('auth/do_registration') ?>" method="post">
					<div class="form-group">
						<label>Email</label>
						<input name="email" type="email" required placeholder="Masukkan Email Anda yang Aktif" class="form-control">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" required name="username" placeholder="Masukkan Username" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input name="password" required type="password" class="form-control" placeholder="Tulis Password Anda">
					</div>
					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input name="passconf" required type="password" class="form-control" placeholder="Konfirmasi Password Anda">
					</div>
					<div class="form-group">
						<label>Mendaftar dengan Jalur Masuk</label>
						<select name="jalur" required class="form-control">
							<option disabled selected value>Pilih Jalur Masuk</option>
							<?php foreach ($jalur as $row): ?>
								<option value="<?= $row->key ?>"><?= $row->details ?> (<?= $row->percentage ?>%)</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Mengetahui Informasi FIM dari</label>
						<?php foreach ($info as $row): ?>
							<div class="checkbox">
							  <label>
							    <input type="checkbox" name="info_fim[]" value="<?= $row->keterangan ?>"> <?= $row->keterangan ?>
							  </label>
							</div>
						<?php endforeach ?>
					</div>
					<div class="form-group">
						<label>Persetujuan</label>
						<div class="checkbox">
						  <label><input type="checkbox" required>Dengan ini saya menyetujui untuk mengikuti semua alur pendaftaran FIM 19</label>
						</div>
					</div>
					<div class="form-group text-center">
						<button class="btn btn-profil-primary form-control">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
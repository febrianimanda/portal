<div class="row">
	<div class="col-md-6">
		<?php if($this->session->flashdata('message') != null):?>
			<div class="alert alert-<?= $this->session->flashdata('status') ?>" role="alert">
				<?= $this->session->flashdata('message') ?>
			</div>
		<?php endif; ?>
		<?php
			$action = ($this->uri->segment(4) != '') ? $this->uri->segment(4) : 'insert';
		?>
		<form action="<?= base_url('rekruter/do_'.$action.'_rekruter') ?>" method="post">
			<div class="form-group">
				<label>Nama</label>
				<input type="text" required name="nama" class="form-control" placeholder="Masukkan Nama" />
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" required name="email" class="form-control" placeholder="Masukkan Email" />
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" required name="password" class="form-control" placeholder="Masukkan password" />
			</div>
			<div class="form-group">
				<label>Konfirmasi Password</label>
				<input type="password" required name="passconf" class="form-control" placeholder="Masukkan password" />
			</div>
			<div class="form-group">
				<label>Role</label>
				<select name="role" class="form-control">
					<option value="1">Rekruter</option>
					<option value="2">Koordinator Rekruter</option>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" class="form-control btn btn-profil-flat">
			</div>
		</form>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modalInsert">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<form action="<?= (!$completed) ? site_url('kandidat/do_update_pencapaian/insert') : '#' ?>" method="post">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title">Form Pencapaian</h4>
		    </div>
		    <div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<h4>Pencapaian <?= $data_count+1 ?></h4>
							<input type="hidden" name="indeks" value="<?= $data_count+1 ?>">
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Aktivitas / Pencapaian <span class="text-danger">*</span></label>
								<input type="text" name="nama_pencapaian" required class="form-control" placeholder="Sebutkan nama dari aktivitas / pencapaian ini">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Waktu / Durasi <span class="text-danger">*</span></label>
								<input type="text" name="waktu_durasi" required class="form-control" placeholder="Kapan atau lama durasi kegiatan / pencapaian ini berlangsung">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Cakupan Wilayah <span class="text-danger">*</span></label>
								<select name="cakupan" class="form-control" required>
									<option value="-1" selected disabled>Pilih Cakupan Wilayah</option>
									<option value="kelurahan">Kelurahan</option>
									<option value="kecamatan">Kecamatan</option>
									<option value="jurusan">Jurusan</option>
									<option value="kampus">Kampus</option>
									<option value="kota">Kota</option>
									<option value="provinsi">Provinsi</option>
									<option value="nasional">Nasional</option>
									<option value="internasional">Internasional</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Peran <span class="text-danger">*</span></label>
								<select name="peran" required class="form-control">
									<option value="-1" selected disabled>Pilih Peran</option>
									<option value="anggota">Anggota</option>
									<option value="superdiv">Super Divisi</option>
									<option value="supervisi">Supervisi Antar Bidang</option>
									<option value="ketua">Ketua</option>
									<option value="pendiri">Pendiri</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Penyelenggara <span class="text-danger">*</span></label>
								<input type="text" name="penyelenggara" required class="form-control" placeholder="Pihak penyelenggara kegiatan atau pencapaian ini">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Narahubung Penyelenggara kegiatan <span class="text-danger">*</span></label>
								<input type="text" name="narahubung" required class="form-control" placeholder="Narahubung yang dapat mempertanggungjawabkan">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Alasan mengapa pencapaian ini merupakan yang terbaik buat anda <span class="text-danger">*</span></label>
								<textarea name="alasan" required class="form-control" rows="3" placeholder="Berikan alasan penguat anda"></textarea>
							</div>
						</div>
					</div>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-profil-primary" value="Simpan">
		    </div>
			</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modalUpdate">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<form action="<?= (!$completed) ? site_url('kandidat/do_update_pencapaian') : '#' ?>" method="post">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title">Form Pencapaian</h4>
		    </div>
		    <div class="modal-body">
					<h4>Pencapaian sedang dimuat...</h4>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-profil-primary" value="Simpan">
		    </div>
			</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Dasar
					<?php if($this->session->userdata('jalur') == 'nextgen' or $this->session->userdata('jalur') == 'influencer'): ?>
						<?php if($menu_ready['dasar'] and $menu_ready['video']): ?>
							<i class="fa fa-check-circle menu-done"></i>
						<?php endif; ?>
					<?php else: ?>
						<?php if($menu_ready['dasar']): ?>
							<i class="fa fa-check-circle menu-done"></i>
						<?php endif; ?>
					</a>
					<?php endif; ?>
				</li>
				<?php if($menu['rekomendasi'] == true): ?>
					<li role="presentation">
						<a href="<?= site_url('kandidat/pengaturan/rekomendasi') ?>">Rekomendasi
							<?php if($menu_ready['rekomendasi']): ?>
								<i class="fa fa-check-circle menu-done"></i>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if($menu['essay'] == true): ?>
					<li role="presentation">
						<a href="<?= site_url('kandidat/pengaturan/essay') ?>">Esai
							<?php if($menu_ready['essay']): ?>
								<i class="fa fa-check-circle menu-done"></i>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
				<li role="presentation" class="active">
					<a href="<?= site_url('kandidat/pengaturan/pencapaian') ?>">Pencapaian
						<?php if($menu_ready['pencapaian']): ?>
							<i class="fa fa-check-circle menu-done"></i>
						<?php endif; ?>
					</a>
				</li>
				<?php if($menu['project'] == true): ?>
					<li role="presentation">
						<a href="<?= site_url('kandidat/pengaturan/project') ?>">Proyek
							<?php if($menu_ready['project']): ?>
								<i class="fa fa-check-circle menu-done"></i>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/komitmen') ?>">Final Submit
						<?php if($completed): ?>
							<i class="fa fa-check-circle menu-done"></i>
						<?php endif; ?>
					</a>
				</li>
				<li role="separator" class="divider"></li>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/akun') ?>">Akun</a>
				</li>
			</ul>
		</div>
		<!-- Form Content -->
		<div class="col-md-8">
			<div class="row profil-row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('message') != null):?>
						<div class="alert alert-<?= $this->session->flashdata('status') ?>" role="alert">
							<?= $this->session->flashdata('message') ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-12">
					<p><strong>Catatan:</strong> Sebutkan dan jelaskan <?= $max_count ?> aktivitas dan/atau pencapaian terbaik yang telah Anda raih. Aktivitas dan pencapaian di sini diartikan dalam arti yang luas, bisa jadi berupa pengalaman organisasi, pengalaman kepanitiaan, pengalaman mendirikan organisasi,menjuarai kompetisi, partisipasi dalam suatu konferensi, penulisan ilmiah, dll.</p>
					<h3>Pencapaian
						<?php if($data_count < $max_count and !$completed): ?>
							<button data-toggle="modal" data-target="#modalInsert" type="button" class="btn btn-xs btn-profil-flat floating-btn"><i class="fa fa-plus"></i> Tambah</button>
						<?php endif; ?>
					</h3><hr>
					<div class="row profil-pencapaian">
						<?php if(isset($pencapaian)): ?>
							<?php foreach ($pencapaian as $data): ?>
								<div class="col-md-12">
									<?php if(!$completed): ?>
										<button data-toggle="modal" data-target="#modalUpdate" data-index="<?= $data['indeks'] ?>" type="button" class="btnModalTrigger btn btn-xs btn-profil-flat floating-btn"><i class="fa fa-plus"></i> Edit</button>
									<?php endif; ?>
									<h4><strong><?= $data['nama_pencapaian'] ?></strong></h4>
									<?php $role = $this->session->userdata('role'); ?>
									<h5>Cakupan: <?= $data['cakupan'] ?></h5>
									<h5>Peran: <?= $data['peran'] ?> | Penyelenggara: <?= $data['penyelenggara'] ?> | <?= $data['waktu_durasi'] ?> <?= ($role >= 1 and $role <= 3) ?> | Narahubung: <?= $data['narahubung'] ?> </h5>
									<p><?= $data['alasan'] ?></p>
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
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.btnModalTrigger').on('click', function(event){
			event.preventDefault();
			var ix = $(this).data('index');
			$.ajax({
				method: "POST",
				url: "<?= site_url('kandidat/get_pencapaian'); ?>",
				data: { indeks: ix}
			}).done(function(datas){
				data = JSON.parse(datas);
				var html = "";
				html += '<div class="row">';
				html += '	<div class="col-md-12">';
				html += '		<h4>Pencapaian '+ix+'</h4>';
				html += '		<input type="hidden" name="indeks" value="'+ix+'">';
				html += '	</div>';
				html += '	<div class="col-md-6">';
				html += '		<div class="form-group">';
				html += '			<label>Nama Aktivitas / Pencapaian <span class="text-danger">*</span></label>';
				html += '			<input type="text" name="nama_pencapaian" required class="form-control" placeholder="Sebutkan nama dari aktivitas / pencapaian ini" value="'+data["nama_pencapaian"]+'">';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="col-md-6">';
				html += '		<div class="form-group">';
				html += '			<label>Waktu / Durasi <span class="text-danger">*</span></label>';
				html += '			<input type="text" name="waktu_durasi" required class="form-control" placeholder="Kapan atau lama durasi kegiatan / pencapaian ini berlangsung" value="'+data["waktu_durasi"]+'">';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="col-md-6">';
				html += '		<div class="form-group">';
				html += '			<label>Cakupan Wilayah <span class="text-danger">*</span></label>';
				html += '			<select name="cakupan" class="form-control">'
				html += '				<option value="-1" disabled>Pilih Cakupan</option>'
				html += '				<option value="kelurahan" '+((data['cakupan'] == 'kelurahan') ? 'selected' : '' )+'>Kelurahan</option>'
				html += '				<option value="kecamatan" '+((data['cakupan'] == 'kecamatan') ? 'selected' : '' )+'>Kecamatan</option>'
				html += '				<option value="jurusan" '+((data['cakupan'] == 'jurusan') ? 'selected' : '' )+'>Jurusan</option>'
				html += '				<option value="kampus" '+((data['cakupan'] == 'kampus') ? 'selected' : '' )+ '>Kampus</option>'
				html += '				<option value="kota" '+((data['cakupan'] == 'kota') ? 'selected' : '' )+'>Kota</option>'
				html += '				<option value="provinsi" '+((data['cakupan'] == 'provinsi') ? 'selected' : '' )+'>Provinsi</option>'
				html += '				<option value="nasional" '+((data['cakupan'] == 'nasional') ? 'selected' : '' )+'>Nasional</option>'
				html += '				<option value="internasional" '+((data['cakupan'] == 'internasional') ? 'selected' : '' )+'>Internasional</option>'
				html += '			</select>';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="col-md-6">';
				html += '		<div class="form-group">';
				html += '			<label>Peran <span class="text-danger">*</span></label>';
				html += '			<select name="peran" required class="form-control">';
				html += '				<option value="-1" disabled>Pilih Peran</option>';
				html += '				<option value="anggota" '+((data['peran'] == "anggota") ? 'selected' : '')+'>Anggota</option>';
				html += '				<option value="superdiv" '+ ((data['peran'] == "superdiv") ? 'selected' : '')+'>Super Divisi</option>'
				html += '				<option value="supervisi" '+ ((data['peran'] == "supervisi") ? 'selected' : '')+'>Supervisi Antar Bidang</option>'
				html += '				<option value="ketua" '+ ((data['peran'] == "ketua") ? 'selected' : '')+'>Ketua</option>'
				html += '				<option value="pendiri" '+ ((data['peran'] == "pendiri") ? 'selected' : '')+'>Pendiri</option>'
				html += '			</select>'
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="col-md-6">';
				html += '		<div class="form-group">';
				html += '			<label>Penyelenggara <span class="text-danger">*</span></label>';
				html += '			<input type="text" name="penyelenggara" required class="form-control" placeholder="Pihak penyelenggara kegiatan atau pencapaian ini" value="'+data["penyelenggara"]+'">';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="col-md-6">';
				html += '		<div class="form-group">';
				html += '			<label>Narahubung Penyelenggara kegiatan <span class="text-danger">*</span></label>';
				html += '			<input type="text" name="narahubung" required class="form-control" placeholder="Narahubung yang dapat mempertanggungjawabkan" value="'+data["narahubung"]+'">';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="col-md-12">';
				html += '		<div class="form-group">';
				html += '			<label>Alasan mengapa pencapaian ini merupakan yang terbaik buat anda <span class="text-danger">*</span></label>';
				html += '			<textarea name="alasan" required class="form-control" rows="3" placeholder="Berikan alasan penguat anda">'+data["alasan"]+'</textarea>';
				html += '		</div>';
				html += '	</div>';
				html += '</div>';
				$('#modalUpdate .modal-body').html(html);
			});
		});
	});
</script>
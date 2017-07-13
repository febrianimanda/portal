<div class="modal fade" tabindex="-1" role="dialog" id="modalInsert">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<form action="<?= site_url('kandidat/do_update_pencapaian/insert') ?>" method="post">
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
								<input type="text" name="cakupan" required class="form-control" placeholder="Seberapa besar skala kegiatan / pencapaian ini">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Peran <span class="text-danger">*</span></label>
								<input type="text" name="peran" required class="form-control" placeholder="Tulis peran anda">
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
			<form action="<?= site_url('kandidat/do_update_pencapaian') ?>" method="post">
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
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Dasar</a>
				</li>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/rekomendasi') ?>">Rekomendasi</a>
				</li>
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/essay') ?>">Essay</a>
				</li>
				<li role="presentation" class="active">
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
			<div class="row profil-row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('message') != null):?>
						<div class="alert alert-<?= $this->session->flashdata('status') ?>" role="alert">
							<?= $this->session->flashdata('message') ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-12">
					<h3>Pencapaian
						<?php if($data_count < 5): ?>
							<button data-toggle="modal" data-target="#modalInsert" type="button" class="btn btn-xs btn-profil-flat floating-btn"><i class="fa fa-plus"></i> Tambah</button>
						<?php endif; ?>
					</h3><hr>
					<div class="row profil-pencapaian">
						<?php if(isset($pencapaian)): ?>
							<?php foreach ($pencapaian as $data): ?>
								<div class="col-md-12">
									<button data-toggle="modal" data-target="#modalUpdate" data-index="<?= $data['indeks'] ?>" type="button" class="btnModalTrigger btn btn-xs btn-profil-flat floating-btn"><i class="fa fa-plus"></i> Edit</button>
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
				html += '			<input type="text" name="cakupan" required class="form-control" placeholder="Seberapa besar skala kegiatan / pencapaian ini" value="'+data["cakupan"]+'">';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="col-md-6">';
				html += '		<div class="form-group">';
				html += '			<label>Peran <span class="text-danger">*</span></label>';
				html += '			<input type="text" name="peran" required class="form-control" placeholder="Tulis peran anda" value="'+data["peran"]+'">';
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
<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation">
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
				<li role="presentation" class="active">
					<a href="<?= site_url('kandidat/pengaturan/komitmen') ?>">Komitmen</a>
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
					<h3>Bagian Komitmen</h3>
					<hr>
					<?php if($ready): ?>
						<form action="<?= (!$completed) ? site_url('kandidat/do_update_komitmen') : '#' ?> ?>" method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>"Dengan ini, saya (nama lengkap) bersedia untuk aktif selama 1 tahun pasca pelatihan FIM apabila saya diterima sebagai peserta FIM 19." Silahkan salin dan sesuaikan dengan nama Anda di bawah ini. <span class="text-danger">*</span></label>
										<textarea <?= ($completed) ? 'disabled' : '' ?> required name="pernyataan" class="form-control" placeholder="Salin dan sesuaikan tulisan diatas"><?= $data['pernyataan'] ?></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Adapun pilihan kegiatan Pasca pelatihan yang saya pilih adalah: <span class="text-danger">*</span></label>
										<select name="pilihan" <?= ($completed) ? 'disabled' : '' ?> id="choose-selectbox" class="form-control" onchange='loadPenempatan($(this).val())'>
											<option value="-1" disabled selected required>Pilih Sektor Kegiatan</option>
											<option value="pusat" <?= ($data['pilihan'] == 'pusat') ? 'selected' : '' ?>>FIM Pusat</option>
											<option <?= ($data['pilihan'] == 'regional') ? 'selected' : '' ?> value="regional">FIM Regional</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Di: <span class="text-danger">*</span></label>
										<div class="di-section"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>* Dengan menekan tombol simpan, Anda berarti telah menyelesaikan pendaftaran dan tidak dapat mengubahnya lagi.</label>
									</div>
								</div>
							</div>
							<?php if(!$completed): ?>
								<div class="row">
									<div class="col-md-12">
										<input type="submit" value="simpan" class="btn btn-profil-primary">
									</div>
								</div>
							<?php endif; ?>
						</form>
					<?php else: ?>
						<div class="row">
							<div class="col-md-12">
								<p>
									Untuk dapat mengubah bagian ini, anda harus sudah melengkapi semua data pendaftaran yang dibutuhkan terlebih dahulu. Adapun yang belum anda lengkapi adalah: <br>
									<ul>
										<?= $need_message ?>
									</ul>
								</p>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function loadPenempatan(pilihan){
		$.ajax({
			'url': "<?= site_url('kandidat/') ?>"+"get_"+pilihan+"_kegiatan"
		}).done(function(datas){
			data = JSON.parse(datas);
			html = '';
			checked = "<?= $data['penempatan']; ?>";
			val_checked = checked.split(",");
			for (var i = 0; i < data.length; i++) {
				html += '<div class="col-md-4">';
				html += '	<div class="checkbox">';
				html += '		<label>';
				found = false;
				for(var j = 0; j < val_checked.length; j++) {
					if(data[i]['keyword'] == val_checked[j]){
						html += '			<input type="checkbox" checked name="penempatan[]" value="'+data[i]['keyword']+'">';
						found = true;
					}
				}
				if(!found){
					html += '			<input type="checkbox" name="penempatan[]" value="'+data[i]['keyword']+'">';
				}
				if($('#choose-selectbox').val() == 'pusat'){
					html += data[i]['detail'];
				} else {
					html += '<strong>'+data[i]['keyword']+'</strong> ('+data[i]['area']+')';
				}
				html += '		</label>';
				html += '	</div>';
				html += '</div>';
			}
			$('.di-section').html(html);
		});
	}
	$(document).ready(function(){
		loadPenempatan($('#choose-selectbox').val());
	});
</script>
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
								<label>Platform yang digunakan <span class="text-danger">*</span></label>
								<input type="text" name="platform" required class="form-control" placeholder="contoh: youtube/tv/radio/dll">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Akun yang digunakan <span class="text-danger">*</span></label>
								<input type="text" name="nama_akun" required class="form-control" placeholder="Tuliskan Nama Akun Anda">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Genre (humor, hiburan, musik, dsb) <span class="text-danger">*</span></label>
								<input type="text" name="genre" required class="form-control" placeholder="Tuliskan Genrenya">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Portofolio hasil karya terbaik (link) <span class="text-danger">*</span></label>
								<input type="text" name="portofolio" required class="form-control" placeholder="Tuliskan link dari portofolio anda">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Alasan mengapa anda memilih genre tersebut (max. 300 kata) <span class="text-danger">*</span></label>
								<textarea name="alasan" required class="form-control" placeholder="Tuliskan mengapa anda memilih genre ini"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Penghargaan atas karya yang dibuat <span class="text-danger">*</span></label>
								<input type="text" name="nama_pencapaian" required class="form-control" placeholder="Nama penghargaan yang telah anda raih">
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
						<a href="<?= site_url('kandidat/pengaturan/essay') ?>">
							Esai
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
										<button data-toggle="modal" data-target="#modalUpdate" data-index="<?= $data['pencapaian_id'] ?>" type="button" class="btnModalTrigger btn btn-xs btn-profil-flat floating-btn"><i class="fa fa-plus"></i> Edit</button>
									<?php endif; ?>
									<h4><strong><?= $data['nama_pencapaian'] ?></strong></h4>
									<?php $role = $this->session->userdata('role'); ?>
									<h5>Link Portofolio: <?= $data['cakupan'] ?></h5>
									<h5>Nama Akun: <?= $data['nama_akun'] ?> | Genre: <?= $data['genre'] ?> | Platform: <?= $data['platform'] ?>
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
				html += '			<label>Platform yang digunakan <span class="text-danger">*</span></label>';
				html += '			<input type="text" name="platform" required class="form-control" placeholder="Sebutkan platform yang anda gunakan" value="'+data['platform']+'">';	
				html += '		</div>';	
				html += '	</div>';	
				html += '	<div class="col-md-6">';	
				html += '		<div class="form-group">';	
				html += '			<label>Nama Akun yang digunakan <span class="text-danger">*</span></label>';	
				html += '			<input type="text" name="nama_akun" required class="form-control" placeholder="Nama akun anda" value="'+data['nama_akun']+'">';	
				html += '		</div>';	
				html += '	</div>';
				html += '	<div class="col-md-6">';
				html += '		<div class="form-group">';
				html += '			<label>Genre (humor, hiburan, musik, dsb) <span class="text-danger">*</span></label>';
				html += '			<input type="text" name="genre" required class="form-control" placeholder="Sebutkan genre penghargaan" value="'+data['genre']+'">';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="col-md-6">';
				html += '		<div class="form-group">';
				html += '			<label>Portofolio hasil karya terbaik (link) <span class="text-danger">*</span></label>';
				html += '			<input type="text" name="portofolio" required class="form-control" placeholder="Lampirkan link portofolio anda" value="'+data['portofolio']+'">';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="col-md-12">';
				html += '		<div class="form-group">';
				html += '			<label>Alasan mengapa anda memilih genre tersebut (max. 300 kata) <span class="text-danger">*</span></label>';
				html += '			<textarea name="alasan" required class="form-control" placeholder="Tuliskan mengapa anda memilih genre ini">'+data['alasan']+'</textarea>';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="col-md-12">';
				html += '		<div class="form-group">';						
				html += '			<label>Penghargaan atas karya yang dibuat <span class="text-danger">*</span></label>';						
				html += '			<input type="text" name="nama_pencapaian" required class="form-control" placeholder="Tuliskan Nama penghargaan yang anda dapatkan" value="'+data['nama_pencapaian']+'">';						
				html += '		</div>';
				html += '	</div>';
				html += '</div>';
				$('#modalUpdate .modal-body').html(html);
			});
		});
	});
</script>
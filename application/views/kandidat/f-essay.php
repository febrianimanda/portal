<div class="container profil-content">
	<div class="row">
		<!-- Side Menu -->
		<div class="col-md-2 col-md-offset-1 side-profil">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation">
					<a href="<?= site_url('kandidat/pengaturan/dasar') ?>">Dasar</a>
				</li>
				<li role="presentation" class="active">
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
			<div class="row profil-row">
				<div class="col-md-12">
					<h3>Pencapaian</h3><hr>
					<form action="#" method="post">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Foto Profil</label>
									<input type="file" name="profpic" accept="image/*" required class="form-control">
								</div>
							</div>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
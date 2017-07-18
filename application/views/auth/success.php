<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding-top: 10%;">
			<div class="jumbotron">
			  <h1>
				  <?php if($this->session->flashdata('message') != null): ?>
					  Berhasil!
					<?php else: ?>
						Oops!
					<?php endif; ?>
			  </h1>
			  <p>
			  <?php if($this->session->flashdata('message') != null): ?>
				  <?= $this->session->flashdata('message'); ?>
				<?php else: ?>
					Aneh, Tidak ada apa-apa disini.
				<?php endif; ?>
			  <a href="<?= site_url('auth') ?>">Kembali ke halaman login</a></p>
			</div>
		</div>
	</div>
</div>
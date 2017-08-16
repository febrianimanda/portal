<div class="container" style="padding-top: 100px;">
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Filter Pencarian</div>
				<div class="panel-body">
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<h3>List Kandidat</h3><hr>
			<table class="table" id="candidates-table" width="100%">
				<thead>
					<tr>
						<td>Foto Profil</td>
						<td>Nama Lengkap</td>
						<td>Biodata Singkat</td>
						<td>Domisili</td>
						<td>Institusi</td>
						<td></td>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
    $('#candidates-table').DataTable( {
        "processing": true,
        "serverSide": true,
      	"ajax": "<?= site_url('welcome/get_candidates'); ?>",
    } );
	});
</script>
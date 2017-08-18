<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Rekruter</title>
	<!-- Bootstrap Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= css_url('font-awesome.min') ?>">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<!-- Our CSS Style -->
	<link rel="stylesheet" href="<?= css_url('styles') ?>" />
	<!-- Jquery Latest Compiled and Minified JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table id="data-table" class="table table-hover">
					<thead>
						<th>#</th>
						<th>id</th>
						<th>Profpic</th>
						<th>Jalur</th>
						<th>Nama Lengkap</th>
						<th>Institusi</th>
						<th>Link Video</th>
						<th>File Rekomendasi</th>
						<th>Nilai CV</th>
						<th>Nilai Esai</th>
						<th>Nilai Kelengkapan</th>
						<th>Nilai Total</th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Bootstrap Latest Compiled and Minified JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		var table;
		$(document).ready(function(){
			table = $('#data-table').DataTable({
				"processing": true,
				"serverSide": true,
				"order": [],

				"ajax": {
					"url": "<?= site_url('rekruter/peserta_list') ?>",
					"type": "POST"
				},

				"columnDefs": [
					{
						"targets": [0,2,6,7],
						"orderable": false,
					},
					{
						"targets": [6],
						"data": function(row){
							if(row[6] != "") {
								return "<a target='blank' href='"+row[6]+"'>Link Video</a>";
							} else {
								return "Tidak ada Video Profile";
							}
						}
					},
					{
						"targets": [7],
						"data": function(row){
							if(row[7] != "") {
								return "<a target='blank' class='btn btn-xs btn-profil-flat' href='<?= site_url('documents_upload/')?>"+row[7]+"'>Download File Rekomendasi</a>";
							} else {
								return "Tidak ada File Rekomendasi";
							}
						}
					}
				]
			});
		});
	</script>
</body>
</html>
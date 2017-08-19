<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<a class="btn btn-sm btn-profil-flat" href="<?= site_url('rekruter/add') ?>" style="margin-bottom: 10px;">Tambah Rekruter</a>
      <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th></th>                    
            <th>Nama</th>
            <th>Email</th>
            <th>Ditugaskan</th>
            <th>Menilai</th>                    
            <th>Avg. CV</th>
            <th>Avg. Esai</th>
            <th>Avg. Pencapaian</th>
            <th>Avg. Berkas</th>
            <th>Avg. Total</th>
            <th>Koor</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th></th>                    
            <th>Nama</th>
            <th>Email</th>
            <th>Ditugaskan</th>
            <th>Menilai</th>                    
            <th>Avg. CV</th>
            <th>Avg. Esai</th>
            <th>Avg. Pencapaian</th>
            <th>Avg. Berkas</th>
            <th>Avg. Total</th>
            <th>Koor</th>                 
          </tr>
        </tfoot>
      </table>
    </div>
	</div>
</div>
<script type="text/javascript">
  var table;
  $(document).ready(function(){
    i = 0;
    table = $('#dataTable').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": "<?= site_url('rekruter/rekruter_list') ?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          "targets": [0,1],
          "orderable": false
        },
        {
          "targets": [1],
          "render": function(data) {
            html = '<div class="form-check">';
            html += ' <label class="form-check-label">';
            html += '   <input type="checkbox" class="form-check-input" name="rekruter['+data+']">';
            html += ' </label>';
            html += '</div>';
            return html;
          }
        },
        {
          "targets": [11],
          "render": function(data) {
            console.log(data);
            if(data == 0) return "No";
            else return "Yes";
          }
        }
      ]
    });
  });
</script>
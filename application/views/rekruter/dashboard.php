<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>.</th>                    
            <th>Foto</th>
            <th>Jalur</th>
            <th>Nama</th>
            <th>Institusi</th>
            <th>Biodata Singkat</th>
            <th>Video</th>
            <th>Rekomendasi</th>
            <th>CV</th>
            <th>Esai</th>
            <th>Project</th>                    
            <th>Berkas</th>
            <th>Total</th>
            <th>Penilai</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>.</th>                    
            <th>Foto</th>
            <th>Jalur</th>
            <th>Nama</th>
            <th>Institusi</th>
            <th>Biodata Singkat</th>
            <th>Video</th>
            <th>Rekomendasi</th>
            <th>CV</th>
            <th>Esai</th>
            <th>Project</th>                    
            <th>Berkas</th>
            <th>Total</th>
            <th>Penilai</th>                 
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<!-- /.row -->
<script type="text/javascript">
  var table;
  $(document).ready(function(){
    i = 0;
    table = $('#dataTable').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": "<?= site_url('rekruter/peserta_list') ?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          "targets": [0,1,6,7,8],
          "orderable": false
        },
        {
          "targets": [1],
          "render": function(data) {
            html = '<div class="form-check">';
            html += ' <label class="form-check-label">';
            html += '   <input type="checkbox" class="form-check-input" name="capes['+data+']">';
            html += ' </label>';
            html += '</div>';
            i++;
            return html;
          }
        },
        {
          "targets": [2],
          "orderable": false,
          "render": function(data) {
            if(data != "") 
              return "<img height='100' src='<?= site_url("profpics_upload/") ?>"+data+"' />"; 
            else
              return "Tidak Terdapat Foto";
          }
        },
        {
          "targets": [7],
          "render": function(data){
            if(data != null) 
              return "<a target='blank' href='"+data+"'>Link Video</a>";
            else 
              return "Tidak ada Video Profile";
          }
        },
        {
          "targets": [8],
          "render": function(data){
            if(data != null)
              return "<a target='blank' class='btn btn-xs btn-profil-flat' href='<?= site_url('documents_upload/')?>"+data+"'>Download File</a>";
            else
              return "Tidak ada File Rekomendasi";
          }
        },
        {
          "targets": [9,10,11,12,13],
          "render": function(data) {
            if(data == null) return "0";
          }
        },
        {
          "targets": [14],
          "render": function(data) {
            if(data == null) return "-";
          }
        }
      ]
    });
  });
</script>
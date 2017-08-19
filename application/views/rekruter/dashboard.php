<?php if($this->session->userdata('role') > 1): ?>
<div id="assign-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Penugasan</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Ditugaskan kepada</label>
          <select name="email_rekruter" id="option-rekruter" class="form-control">
            <option value="-1" disabled selected>Pilih Penugasan</option>
            <?php foreach($rekruters as $rekruter): ?>
              <option value="<?= $rekruter['email'] ?>"><?= $rekruter['nama_rekruter'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <button class="btn btn-profil-flat form-control" id="btn-assign">Simpan</button>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.row -->
<?php endif; ?>

<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <?php if($this->session->userdata('role') > 1): ?>
        <button class="btn btn-profil-flat btn-sm" data-toggle="modal" data-target="#assign-modal" type="button" style="margin-bottom: 10px;">Penugasan</button>
      <?php endif; ?>
      <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th></th>                    
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
            <th></th>                    
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
    table = $('#dataTable').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": "<?= site_url('rekruter/peserta_list') ?>",
        "type": "POST",
        <?php if($this->session->userdata('role') == 1): ?>
          "data": {"email": "<?= $this->session->userdata('email') ?>"}
        <?php endif; ?>
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
            html += '   <input type="checkbox" class="form-check-input" value="'+data+'" value="capes">';
            html += ' </label>';
            html += '</div>';
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
          "targets": [4],
          "data": null,
          "render": function(data) {

            return "<a href='<?= site_url('rekruter/nilai/') ?>"+data[15]+"'>"+data[4]+"</a>"
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
          "targets": [9, 10, 11, 12, 13],
          "render": function(data) {
            if(typeof(data) == "string") return data;
            else return "0.00";
          }
        },
        {
          "targets": [14],
          "render": function(data) {
            if(typeof(data) != "string") return "-";
            else return data;
          }
        }
      ]
    });
  });
</script>
<script>
$(document).ready(function(){
  $('#btn-assign').click(function(e){
    e.preventDefault();
    let list_capes = [];
    $('.form-check-input:checked').each(function(){
      list_capes.push($(this).val());
    });
    let rekruter_email = $('#option-rekruter').val();
    $.ajax({
      url: "<?= site_url('rekruter/do_assign') ?>",
      type: "POST",
      data: {"rekruter": rekruter_email, "capes": list_capes}
    }).done(function(data){
      window.location.href = "<?= site_url('rekruter/') ?>";
    });
  })
});
</script>
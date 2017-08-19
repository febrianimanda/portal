
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Email</th>
            <th>Username</th>
            <th>Role</th>
            <th>Last Update</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Email</th>
            <th>Username</th>
            <th>Role</th>
            <th>Last Update</th>
            <th>Action</th>
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
        "url": "<?= site_url('admin/user_list') ?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          "targets": [0,5],
          "orderable": false
        },
        {
          "targets": [3],
          "render": function(data) {
            let role;
            switch(parseInt(data)) {
              case 0: role = 'Peserta'; break;
              case 1: role = 'Rekruter'; break;
              case 2: role = 'Koordinator'; break;
              case 3: role = 'Admin'; break;
              default: role = 'Undefined';
            }
            return "<label class='label label-info'>"+role+"</label>";
          }
        },
      ]
    });
  });
</script>
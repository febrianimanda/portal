<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="<?= css_url('font-awesome.min') ?>">

    <!-- Plugin CSS -->
    <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= css_url('sb-admin') ?>" rel="stylesheet">

  </head>

  <body class="fixed-nav" id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="#">Admin FIM</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav">
          <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="#">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">
                Rekruitmen</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="#">
              <i class="fa fa-fw fa-area-chart"></i>
              <span class="nav-link-text">
                Admin</span>
            </a>
          </li>
          
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="content-wrapper py-3">

      <div class="container-fluid">

        
        
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Data Calon Peserta FIM 19
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>.</th>                    
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Institusi</th>
                    <th>Biodata Singkat</th>
                    <th>Rekomendasi</th>
                    <th>Video</th>
                    <th>CV</th>
                    <th>Esai</th>
                    <th>Project</th>                    
                    <th>Kelengkapan Berkas</th>
                    <th>Jumlah</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>.</th>                    
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Institusi</th>
                    <th>Biodata Singkat</th>
                    <th>Rekomendasi</th>
                    <th>Video</th>
                    <th>CV</th>
                    <th>Esai</th>
                    <th>Project</th>                    
                    <th>Kelengkapan Berkas</th>
                    <th>Jumlah</th>                    
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><input type="checkbox"></td>
                    <td><img src="https://cdns.klimg.com/merdeka.com/i/w/tokoh/2012/01/11/602/200x300/fadel-muhammad-rev-1.jpg"></td>
                    <td>Fadel</td>
                    <td>Edinburgh</td>
                    <td>Pengajar</td>
                    <td>blablabla.com</td>
                    <td>blablabla.com</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>400</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><input type="checkbox"></td>
                    <td><img src="https://cdns.klimg.com/merdeka.com/i/w/tokoh/2012/01/11/602/200x300/fadel-muhammad-rev-1.jpg"></img></td>
                    <td>Fadel</td>
                    <td>Edinburgh</td>
                    <td>Pengajar</td>
                    <td>blablabla.com</td>
                    <td>blablabla.com</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>400</td>                  
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><input type="checkbox"></td>
                    <td><img src="https://cdns.klimg.com/merdeka.com/i/w/tokoh/2012/01/11/602/200x300/fadel-muhammad-rev-1.jpg"></td>
                    <td>Fadel</td>
                    <td>Edinburgh</td>
                    <td>Pengajar</td>
                    <td>blablabla.com</td>
                    <td>blablabla.com</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>400</td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Jangan lupa bismillah sebelum menilai
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <!-- Jquery Latest Compiled and Minified JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="<?= js_url('popper.min') ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?= js_url('sb-admin.min') ?>"></script>

  </body>

</html>
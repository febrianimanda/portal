<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?= $title ?> | Portal FIM</title>
		<!-- Bootstrap Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= css_url('font-awesome.min') ?>">
		<link href="<?= css_url('sb-admin-2.min') ?>" rel="stylesheet">
		<link href="<?= css_url('styles') ?>" rel="stylesheet">
		<!-- Dynamic CSS Style -->
		<?php if(isset($header_css_file)): ?>
		<?= header_css_file($header_css_file); ?>
		<?php endif; ?>
		<?php if(isset($header_css_url)): ?>
		<?= header_css_url($header_css_url); ?>
		<?php endif; ?>
		<script>
	  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-48323794-5', 'auto');
	  	ga('send', 'pageview');
		</script>
		<!-- Jquery Latest Compiled and Minified JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	</head>
	<body class="fixed-nav" id="page-top">
		<div class="wrapper">
			<!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Dashboard FIM</a>
          </div>
          <!-- /.navbar-header -->
          <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu dropdown-tasks">
                <li>
                  <a href="#">
                    <div>
                      <p>
                        <strong>Task 1</strong>
                        <span class="pull-right text-muted">40% Complete</span>
                      </p>
                      <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                          <span class="sr-only">40% Complete (success)</span>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#">
                    <div>
                      <p>
                        <strong>Task 2</strong>
                        <span class="pull-right text-muted">20% Complete</span>
                      </p>
                      <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#">
                    <div>
                      <p>
                        <strong>Task 3</strong>
                        <span class="pull-right text-muted">60% Complete</span>
                      </p>
                      <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                          <span class="sr-only">60% Complete (warning)</span>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#">
                    <div>
                      <p>
                        <strong>Task 4</strong>
                        <span class="pull-right text-muted">80% Complete</span>
                      </p>
                      <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                          <span class="sr-only">80% Complete (danger)</span>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a class="text-center" href="#">
                    <strong>See All Tasks</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </li>
              </ul>
              <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
          </ul>
          <!-- /.navbar-top-links -->
          <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu">
                <li>
                  <a href="<?= site_url('rekruter') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                  <a href="<?= site_url('rekruter/all') ?>"><i class="fa fa-users fa-fw"></i> Rekruter</a>
                </li>
                <li>
                  <a href=""><i class="fa fa-file-text-o fa-fw"></i> Penilaian</a>
                </li>
              </ul>
            </div>
            <!-- /.sidebar-collapse -->
          </div>
          <!-- /.navbar-static-side -->
      </nav>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header"><?= $title ?></h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
				<?php echo $content; ?>
			</div>
		</div>
		<footer>
			<p class="text-center">Server Supported By <a target="blank" href="https://idcloudhost.com">IDCloudHost</a></p>
		</footer>
		<!-- Bootstrap core JavaScript -->
    <!-- Jquery Latest Compiled and Minified JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="<?= js_url('popper.min') ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="<?= js_url('sb-admin-2.min') ?>"></script>
		<!-- Dynamic JS load from external -->
		<?php if(isset($footer_js_url)): ?>
		<?= footer_js_url($footer_js_url); ?>
		<?php endif; ?>
		<!-- Dynamic JS load from internal -->
		<?php if(isset($footer_js_file)): ?>
		<?= footer_js_file($footer_js_file); ?>
		<?php endif; ?>
	</body>
</html>
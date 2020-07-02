<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi | Depot </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">
    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Menu</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
       <?php include ("navbar.php") ?>
           <?php
    session_start();

    if(!isset($_SESSION["ID"])){
      header("location:../login/login.php"); 
    }
  ?>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php include("sidebar.php") ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard 
        <small>Daftar Menu</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Menu Depot Cak Suep</h3>
            </div>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Tambah Menu</button>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Menu</th>
                  <th>Nama Menu</th>
                  <th>Harga</th>
                </tr>
                </thead>
                <tbody>

<?php
require '../models/modelMenu.php';
$objmenu = new modelMenu();
$objmenu->select();
$datamenu = $objmenu->getData(); 
foreach ($datamenu as $key) 
{
  
?>
      <tr>
      <td><?php echo $key['KODE_MENU'] ?></td>
      <td><?php echo $key['NAMA_MENU'] ?></td>
      <td><?php echo $key['HARGA'] ?></td>
     

           <td>
      <!--<a class="btn btn-social-icon" title="detail">"><i class="fa fa-play"></i></a>
      -->
      <a class="btn btn-social-icon" title="edit" ><i class="fa fa-edit"data-toggle="modal" href="#mymodal<?php echo $key['KODE_MENU']; ?> "></i></a>
      <a class="btn btn-social-icon" title="hapus" href="../proses/prosesMenu.php?aksi=hapus&kodemenu=<?php echo $key['KODE_MENU'];  ?> "><i class="fa fa-bitbucket " href=></i></a>
      </td>
      </tr>

<div class="modal fade" id="mymodal<?php echo $key['KODE_MENU']; ?>" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Update Detail Transaksi</h4>
      </div>
      <div class="modal-body">
      <div class="box box-info">
    
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="../proses/prosesMenu.php?aksi=edit" method="post">
      <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Menu</label>
                  <input type="text"  class="form-control" id="kodemenu" name="kodemenu" value="<?php echo $key['KODE_MENU']; ?>">
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">Nama Menu</label>
                  <input type="input"  class="form-control" id="namamenu" name="namamenu" value="<?php echo $key['NAMA_MENU']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Harga</label>
                  <input type="input"  class="form-control" id="harga" name="harga" value="<?php echo $key['HARGA']; ?>">
                </div>


              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      <!-- /.box-body -->
     
      <!-- /.box-footer -->
    </form>
  </div>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<?php
}
?>      

                </tfoot>
              </table>
            </div>
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Input Detail Transaksi</h4>
                </div>
                <div class="modal-body">
                            <div class="box box-info">
              
              <!-- /.box-header -->
              <!-- form start -->
              
              <form class="form-horizontal" action="../proses/prosesMenu.php?aksi=tambah" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Kode Menu</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputKodeMenu" name="inputKodeMenu">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Nama Menu</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNamaMenu" name="inputNamaMenu">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Harga</label>

                    <div class="col-sm-10"> 
                      <input type="input" class="form-control" id="inputHarga" name="inputHarga">
                    </div>
                  </div>

                   

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <!-- /.box-body -->
               
                <!-- /.box-footer -->
              </form>
            
            </div>
                </div>
                
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>
<script src="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
     //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  })
</script>
</body>
</html>

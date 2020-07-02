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
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../asset/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support Rof HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../index.php"><b>Dashboard</b> Sistem Depot</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Buat Akun Kasir</p>

      <form action="../proses/prosesRegistrasi.php?aksi=tambah" method="post">
        <div class="form-group has-feedback">
          <input type="id" class="form-control" placeholder="ID Kasir" id="inputId" name="inputId">
          <span class="glyphicon glyphicon-qrcode form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="input" class="form-control" placeholder="Nama User" id="inputNama" name="inputNama">
          <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Alamat" id="inputAlamat" name="inputAlamat">
          <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>
          <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="No. Ktp" id="inputNoKtp" name="inputNoKtp">
          <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>
          <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Umur" id="inputUmur" name="inputUmur">
          <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>
          <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="No. Telp" id="inputTlp" name="inputTlp">
          <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>

        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            
             <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-success" onclick="return confirm('Anda yakin Data yang dimasukkan sudah valid?')">
              Submit
           
            </div>
            <!-- /.col -->
          </div>

          <div class="modal modal-success fade" id="modal-success">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Success Modal</h4>
                  </div>
                  <div class="modal-body">
                    <p>Akun <b>BERHASIL</b> Ditambahkan Ke Database&hellip;</p>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-outline">Oke</button>
                  </div>
                </div>
             
              </div>
            
            </div>


          </form>
        </div>
        <!-- /.form-box -->
      </div>
      <!-- /.register-box -->

      <div class="modal modal-success fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-outline center">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


        <!-- jQuery 3 -->
        <script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="../asset/plugins/iCheck/icheck.min.js"></script>
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
          });
        </script>
      </body>
      </html>

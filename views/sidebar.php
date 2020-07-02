
<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../asset/dist/img/66748.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Menu</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-star"></i> <span>Manage Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="viewRegistrasi.php"><i class="fa  fa-users"></i>Data Kasir</a></li>
         
           
            
          </ul>
        </li>
       
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-star"></i> <span>Data Depot</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="TambahRegister.php" target="_blank"><i class="fa  fa-user-plus"  ></i>Tambah Kasir</a></li>
            <li><a href="TambahTransaksi.php" target="_blank"><i class="fa   fa-plus-square"></i>Tambah Transaksi</a></li>
            
           
           
            
          </ul>
        </li>

          <li class="active treeview">
          <a href="#">
            <i class="fa fa-star"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="viewTransaksi.php"><i class="fa fa-money"></i>Transaksi Pembayaran</a></li>
          <li><a href="riwayatTransaksi.php"><i class="fa fa-clock-o"></i>Riwayat Pembelian</a></li>
          <li><a href="viewDetailTransaksi.php"><i class="fa fa-book"></i>Detail Transaksi</a></li>
           
            
          </ul>
        </li>

          <!-- <li><a href="viewTransaksi.php"><i class="fa fa-money"></i>Menu</a></li> -->
          <li><a href="menu.php"><i class="fa fa-list"></i> <span>Daftar Menu</span></a></li>
       

          

           
          </li>


      </ul>

    </section>
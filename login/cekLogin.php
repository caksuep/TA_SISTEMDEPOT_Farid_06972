<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
require '../models/modelRegistrasi.php';
$modelRegistrasi=new modelRegistrasi();
$modelRegistrasi -> select();
$dataLogin = $modelRegistrasi->getData();
$id = $_POST['ID'];


foreach ($dataLogin as $key){

	
	// cek jika user login sebagai admin
	if($key['ID_KASIR']=="$id"){
		
		
			$_SESSION['ID'] = $id;
			$_SESSION['nama'] = $key['NAMA'];
		// alihkan ke halaman dashboard admin
			header("location:../views/index.php");

	// cek jika user login sebagai pegawai	
}
elseif($_SESSION['ID']==""){
		// buat session login dan username
		header("location:redirectLogin.php");
}

}

?>
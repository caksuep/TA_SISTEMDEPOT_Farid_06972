<?php
require '../models/modelRegistrasi.php';

class prosesRegistrasi

{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{

		//obj model registrasi
		$objmodel = new modelRegistrasi();
		if ($this->action == "tambah") 
		{
			
			$idkasir = $_POST['inputId'];
			$nama = $_POST['inputNama'];
			$alamat = $_POST['inputAlamat'];
			$noktp = $_POST['inputNoKtp'];
			$umur = $_POST['inputUmur'];
			$tlp = $_POST['inputTlp'];
			$objmodel->insert($idkasir,$nama,$alamat,$noktp,$umur,$tlp);
			header("location:../views/viewRegistrasi.php");
			
			

		}
		elseif($this->action =="hapus")
		{
			$idkasir = $_GET['idkasir'];
			$objmodel->delete($idkasir);
			header("location:../views/viewRegistrasi.php");
		}
		elseif($this->action =="edit")
		{
			//echo "masuk edit";
			$idkasir = $_POST['idkasir'];
			$nm = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$noktp = $_POST['noktp'];
			$umur = $_POST['umur'];
			$tlp = $_POST['tlp'];
			$objmodel->update($idkasir,$nm,$alamat,$noktp,$umur,$tlp);
			header("location:../views/viewRegistrasi.php");
			
		}
	}
}
$objprosesregistrasi = new prosesRegistrasi($_GET['aksi']);
$objprosesregistrasi->proses();
?>
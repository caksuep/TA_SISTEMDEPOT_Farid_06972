<?php
require '../models/modelTransaksi.php';

class prosesTransaksi

{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{

		
		$objmodel = new modelTransaksi();
		if ($this->action == "tambah") 
		{
			
			$nonota = $_POST['inputNoNota'];
			$total = $_POST['inputTotal'];
			$bayar = $_POST['inputBayar'];
			$kembali = $_POST['inputKembali'];
			$idkasir = $_POST['inputId'];

			$objmodel->insert($nonota,$total,$bayar,$kembali,$idkasir);
			header("location:../views/viewTransaksi.php");
			
			

		}
		elseif($this->action =="del")
		{
			
			$nonota = $_GET['nonota'];
			$objmodel->delete($nonota);
			header("location:../views/viewTransaksi.php");
			
		}
		elseif($this->action =="edit")
		{
			//echo "masuk edit";
			$nonota = $_POST['nonota'];
			$total = $_POST['total'];
			$bayar = $_POST['bayar'];
			$kembali = $_POST['kembali'];
			$idkasir = $_POST['idkasir'];
			$objmodel->update($nonota,$total,$bayar,$kembali,$idkasir);
			header("location:../views/viewTransaksi.php");
			
		}
	}
}
$objprosestransaksi = new prosesTransaksi($_GET['aksi']);
$objprosestransaksi->proses();
?>
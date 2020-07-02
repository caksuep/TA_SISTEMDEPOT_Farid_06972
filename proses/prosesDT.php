<?php
require '../models/modelD.php';
class prosesTransaksi
{
	private $action;
	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodel= new modelTransaksi();

		if($this->action=="hapus")
		{
			$nonota=$_GET['nonota'];
		
			$objmodel->deletee($nonota);
			header("location:../view/viewDatatransaksi.php");
		}
		elseif ($this->action=="hapuss") 
		{
			$kodemenu=$_GET['kodemenu'];
		
			$objmodel->delete($kodemenu);
			header("location:../view/viewDatamenu.php");
		}
		elseif ($this->action=="edit") 
		{
			//echo " test masuk";
			$kdMenu=$_POST['kodemenu'];
			$nmMenu=$_POST['namamenu'];
			$hrgMenu=$_POST['hrgmenu'];
			$objmodel->update($kdMenu,$nmMenu,$hrgMenu);
			header("location:../view/viewDatamenu.php");
			

		}

	}
}
$objprosesBarang=new prosesTransaksi($_GET['aksi']);
$objprosesBarang->proses();
?>
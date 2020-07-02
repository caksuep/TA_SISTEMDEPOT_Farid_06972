<?php
require '../models/modelMenu.php';

class prosesMenu

{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{

		
		$objmodel = new modelMenu();
		if ($this->action == "tambah") 
		{
			
			$kodemenu = $_POST['inputKodeMenu'];
			$namamenu = $_POST['inputNamaMenu'];
			$harga = $_POST['inputHarga'];


			$objmodel->insert($kodemenu,$namamenu,$harga);
			header("location:../views/menu.php");
			
			

		}
		elseif($this->action =="hapus")
		{
			
			$kodemenu = $_GET['kodemenu'];
			$objmodel->delete($kodemenu);
			header("location:../views/menu.php");
			
		}
		elseif($this->action =="edit")
		{
			//echo "masuk edit";
			$kodemenu = $_POST['kodemenu'];
			$namamenu = $_POST['namamenu'];
			$harga = $_POST['harga'];
			
			$objmodel->update($kodemenu,$namamenu,$harga);
			header("location:../views/menu.php");
			
		}
	}
}
$objprosesmenu = new prosesMenu($_GET['aksi']);
$objprosesmenu->proses();
?>
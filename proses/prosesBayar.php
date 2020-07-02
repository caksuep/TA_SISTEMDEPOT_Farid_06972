<?php
require '../models/modelDT.php';
class prosesBayar
{
	private $action;
	function __construct($act){
        $this->action=$act;
    } 
	
	function proses()
	{
		$objmodel= new modelDTransaksi();

		if($this->action=="act")
		{
			$bayar=$_GET['bayar'];
			$totalbelanja=$_GET["totalbelanja"];
			$objmodel->hitungkembalian($bayar,$totalbelanja);
			
		}
		

	}
}
$obj=new prosesBayar();
$obj->proses();
echo "<script>location='../views/viewTransaksi.php';</script>";
?>
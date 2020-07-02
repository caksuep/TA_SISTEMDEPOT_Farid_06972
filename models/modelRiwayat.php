<?php
require 'koneksiDB.php';

class modelRiwayat extends koneksiDB
{
	private $datariwayat;

	function select()
	{
		$sqltext = "SELECT A.NO_NOTA,A.TOTAL,A.BAYAR,A.KEMBALI, B.ID_KASIR, B.NAMA,C.NAMA_MENU, D.KODE_MENU, D.QTY, D.TANGGAL 
		FROM TRANSAKSI A JOIN KASIR B
		ON A.ID_KASIR = B.ID_KASIR
		JOIN DETAIL_TRANSAKSI D
		ON A.NO_NOTA = D.NO_NOTA
		JOIN MENU C
		ON D.KODE_MENU = C.KODE_MENU";

		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		$temp;
		while ($row=oci_fetch_array($statement,OCI_BOTH)) {
			$temp[]=$row;
		}
		$this->datariwayat=$temp;

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->datariwayat;
	}


	// function viewData(){
	// 	foreach ($this->datatransaksi as $key) 
	// 	{
	// 		echo $key['NO_NOTA'];
	// 		echo " -> ";
	// 		echo $key['TOTAL'];
	// 		echo " -> ";
	// 		echo $key['BAYAR'];
	// 		echo " -> ";
	// 	    echo $key['KEMBALI'];
	// 		echo " -> ";
	// 		echo $key['ID_KASIR'];
	// 		echo " <br> ";

	// 	}
	// }



}
	 
    // $objModelTransaksi = new modelTransaksi();
    // $objModelTransaksi->select();
    // $objModelTransaksi->viewData();
 //$objModelTransaksi->insert(3, '15000', '12000', '3000', 1);
//$objModelTransaksi->update(1, 'samsul', 'Surabaya', '628523', '2321', '21');
//$objModelTransaksi->delete(2);
?>
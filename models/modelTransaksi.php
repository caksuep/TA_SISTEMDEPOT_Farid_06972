<?php
require 'koneksiDB.php';

class modelTransaksi extends koneksiDB
{
	private $datatransaksi;

	function select()
	{
		$sqltext = "SELECT * FROM TRANSAKSI";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		//mengisi variable datakasir dari database
		$temp;
		while ($row=oci_fetch_array($statement,OCI_BOTH)) {
			$temp[]=$row;
		}
		$this->datatransaksi=$temp;

		oci_free_statement($statement);
	}

	function insert($nonota,$total,$bayar,$kembali,$idkasir){
		$sqltext = "INSERT INTO TRANSAKSI VALUES ('$nonota','$total','$bayar','$kembali','$idkasir')";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->datatransaksi;
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

	function delete($nonota){
		$sqltext = "DELETE FROM TRANSAKSI WHERE NO_NOTA = '$nonota'";
		$statement = oci_parse($this->koneksi, $sqltext);
		
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($nonota,$total,$bayar,$kembali,$idkasir){
		$sqltext = "UPDATE TRANSAKSI SET TOTAL = '$total', BAYAR = '$bayar',  KEMBALI = '$kembali',  ID_KASIR = '$idkasir' WHERE NO_NOTA = '$nonota'";
		$statement = oci_parse($this->koneksi, $sqltext);

		oci_execute($statement);
		oci_free_statement($statement);
	}


}
	 
    $objModelTransaksi = new modelTransaksi();
    $objModelTransaksi->select();
    // $objModelTransaksi->viewData();
 //$objModelTransaksi->insert(3, '15000', '12000', '3000', 1);
//$objModelTransaksi->update(1, 'samsul', 'Surabaya', '628523', '2321', '21');
//$objModelTransaksi->delete(2);
?>
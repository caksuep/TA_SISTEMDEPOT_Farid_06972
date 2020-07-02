<?php
require 'koneksiDB.php';

class modelDetailTransaksi extends koneksiDB
{
	private $datadetails;

	function select()
	{
		$sqltext = "SELECT * FROM DETAIL_TRANSAKSI";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		//mengisi variable datakasir dari database
		$temp;
		while ($row=oci_fetch_array($statement,OCI_BOTH)) {
			$temp[]=$row;
		}
		$this->datadetail=$temp;

		oci_free_statement($statement);
	}



	function insert($kode_menu,$nonota,$subtotal,$qty,$tanggal){
		$sqltext = "INSERT INTO DETAIL_TRANSAKSI VALUES ('$kode_menu','$nonota','$subtotal','$qty','$tanggal')";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->datadetail;
	}


	// function viewData(){
	// 	foreach ($this->dataregistrasi as $key) 
	// 	{
	// 		echo $key['ID_KASIR'];
	// 		echo " -> ";
	// 		echo $key['NAMA'];
	// 		echo " -> ";
	// 		echo $key['ALAMAT'];
	// 		echo " -> ";
	// 	    echo $key['NO_KTP'];
	// 		echo " -> ";
	// 		echo $key['UMUR'];
	// 		echo " -> ";
	// 		echo $key['TLP'];
	// 		echo " <br> ";

	// 	}
	// }

	function delete($nonota){
		$sqltext = "DELETE FROM DETAIL_TRANSAKSI WHERE NO_NOTA = '$nonota'";
		$statement = oci_parse($this->koneksi, $sqltext);
		
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($kode_menu,$nonota,$subtotal,$qty,$tanggal){
		$sqltext = "UPDATE DETAIL_TRANSAKSI SET KODE_MENU = '$kode_menu', SUBTOTAL = '$subtotal',  QTY = '$qty',  TANGGAL = '$tanggal' WHERE NO_NOTA = '$nonota'";
		$statement = oci_parse($this->koneksi, $sqltext);

		oci_execute($statement);
		oci_free_statement($statement);
	}


}
	 
 // $objModelRegistrasi = new modelRegistrasi();
 //  $objModelRegistrasi->select();
 //  $objModelRegistrasi->viewData();
 // $objModelRegistrasi->insert(3, 'farid', 'Surabaya', '2312', '19', '628128');
//$objModelRegistrasi->update(1, 'samsul', 'Surabaya', '628523', '2321', '21');
//$objModelRegistrasi->delete(2);
?>
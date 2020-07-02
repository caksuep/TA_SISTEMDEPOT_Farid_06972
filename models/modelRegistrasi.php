<?php
require 'koneksiDB.php';

class modelRegistrasi extends koneksiDB
{
	private $dataregistrasi;

	function select()
	{
		$sqltext = "SELECT * FROM KASIR";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		//mengisi variable datakasir dari database
		$temp;
		while ($row=oci_fetch_array($statement,OCI_BOTH)) {
			$temp[]=$row;
		}
		$this->dataregistrasi=$temp;

		oci_free_statement($statement);
	}

	function login(){
		$sqltext="SELECT * FROM KASIR";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataLogin = $temp;

		oci_free_statement($statement);
	}

	function insert($idkasir,$nama,$alamat,$noktp,$umur,$tlp){
		$sqltext = "INSERT INTO KASIR VALUES ('$idkasir','$nama','$alamat','$noktp','$umur','$tlp')";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->dataregistrasi;
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

	function delete($idkasir){
		$sqltext = "DELETE FROM KASIR WHERE ID_KASIR = '$idkasir'";
		$statement = oci_parse($this->koneksi, $sqltext);
		
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($idkasir,$nama,$alamat,$noktp,$umur,$tlp){
		$sqltext = "UPDATE KASIR SET NAMA = '$nama', ALAMAT = '$alamat',  NO_KTP = '$noktp',  UMUR = '$umur', TLP = '$tlp' WHERE ID_KASIR = '$idkasir'";
		$statement = oci_parse($this->koneksi, $sqltext);

		oci_execute($statement);
		oci_free_statement($statement);
	}


}
	 
 $objModelRegistrasi = new modelRegistrasi();
 $objModelRegistrasi->select();
 //  $objModelRegistrasi->viewData();
 // $objModelRegistrasi->insert(3, 'farid', 'Surabaya', '2312', '19', '628128');
//$objModelRegistrasi->update(1, 'samsul', 'Surabaya', '628523', '2321', '21');
//$objModelRegistrasi->delete(2);
?>
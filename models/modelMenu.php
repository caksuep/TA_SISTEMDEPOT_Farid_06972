		<?php 
require 'koneksiDB.php';

class modelMenu extends koneksiDB
{
	private $datamenu;

	function select()
	{
		$sqltext="SELECT * FROM MENU";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		//mengisi variable databarang dari database
		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->datamenu = $temp;

		oci_free_statement($statement);

	}
	function insert($kodemenu,$namamenu,$harga)
	{
		$sqltext="INSERT INTO MENU VALUES ('$kodemenu','$namamenu','$harga')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
		
	}
	function getData()
	{
		return $this->datamenu;
	}
	function delete($kodemenu)
	{
		$sqltext="DELETE FROM MENU WHERE KODE_MENU = '$kodemenu'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}
	function update($kodemenu,$namamenu,$harga)
	{
		$sqltext="UPDATE MENU SET NAMA_MENU = '$namamenu', HARGA = '$harga' WHERE KODE_MENU = '$kodemenu'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}
	// function viewData()
	// {
	// 	foreach ($this->dataBarang as $key) {
	// 		echo $key['KD_BARANG'];
	// 		echo " -> ";
	// 		echo $key['NAMA_BARANG'];
	// 		echo " -> ";
	// 		echo $key['STOK'];
	// 		echo " -> ";
	// 		echo $key['HARGA'];
	// 		echo "<br>";

			
	// 	}
	// }
}
$objmenu=new modelMenu();
//$objModelBarang->insert('5','CLEO250ML','25','20000');
//$objModelBarang->delete(5);
//$objModelBarang->update('4','CLUB19L','50','24000');
$objmenu->select();
//$objModelBarang->viewData();

?>
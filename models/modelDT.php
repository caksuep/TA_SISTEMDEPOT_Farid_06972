<?php
require 'koneksiDB.php';

class modelTransaksi extends koneksiDB{
	private $dataTransaksi;
	private $menupesanan;
	private $menuku;
	private $namamenuku;
    private $hargamenuku;
    private $kasirku;
    private $namakasir;
    private $setsubtotal;
    private $getsubtotal;
    private $kode=0;
    private $idbaru;
    private $kembali;

	function select()
	{
		$sqltext="SELECT A.NO_NOTA,A.TOTAL,A.BAYAR,A.KEMBALI, B.ID_KASIR,C.NAMA_MENU, D.QTY, D.TANGGAL 
		FROM TRANSAKSI A JOIN KASIR B
		ON A.ID_KASIR = B.ID_KASIR
		JOIN DETAIL_TRANSAKSI D
		ON A.NO_NOTA = D.NO_NOTA
		JOIN MENU C
		ON D.KODE_MENU = C.KODE_MENU";

		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		//mengisi variable databarang dari database
		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataTransaksi = $temp;

		oci_free_statement($statement);

	}

	function setidbaru(){
        return $this->idbaru="tran".sprintf($this->kode+1);
    }
    function getidbaru(){
        return $this->idbaru;
    }

    function insert($KODEMENU,$NAMAMENU,$HARGA)
	{
		$sqltext="INSERT INTO MENU VALUES ('$KODEMENU','$NAMAMENU','$HARGA')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
		
	}

	function getData()
	{
		return $this->$dataTransaksi;
	}

	function delete($KODEMENU)
	{
		$sqltext="DELETE FROM MENU WHERE KODE_MENU='$KODEMENU'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($KODEMENU,$NAMAMENU,$HARGA)
	{
		$sqltext="UPDATE MENU SET NAMA_MENU='$NAMAMENU',HARGA='$HARGA' WHERE KODE_MENU = '$KODEMENU'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	//menu
	function selectidm(){
        $sqltext="SELECT * FROM MENU";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		//mengisi variable databarang dari database
		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->menuku = $temp;

		oci_free_statement($statement);
    }

    function getnamamenu(){
        return $this->menuku;
    }
    function viewnamamenu(){
    	foreach ($this->menuku as $key){
    		echo $key['NAMA_MENU'];
    		echo "<br>";
    	}
    }

    //kasir
    function selectidk(){
    	     $sqltext="SELECT * FROM KASIR";
			 $statement=oci_parse($this->koneksi,$sqltext);
			 oci_execute($statement);
            
            //mengisi variable datakasir dari database
			while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->kasirku = $temp;

		oci_free_statement($statement);
    }
	function getnamakasir(){
        return $this->kasirku;
    }
    function viewnamakasir(){
    	foreach ($this->kasirku as $key){
    		echo $key['NAMA'];
    		echo "<br>";
    	}
    }

    //pesanan
    function selectid($kd_menu){
            $sqltext = "SELECT * FROM MENU WHERE KODE_MENU = '$kd_menu'";
            $statement = oci_parse($this->koneksi,$sqltext);
            oci_execute($statement);
            $this->barangpesanan=$key=oci_fetch_array($statement,OCI_BOTH);
    }
    function viewnmmenu(){
        return $this->namamenuku = $this->menupesanan["NAMA_MENU"];
    }
    function viewhgmenu(){
        return $this->hargamenuku=$this->menupesanan["HARGA"];
    }

    function setsubtotal($harga,$qty){
        $this->subtotal=$harga*$qty;
    }
    function getsubtotal(){
        return $this->subtotal;
    }

    function hitungkembalian($bayar,$total_keseluruhan){
        $this->kembali = $bayar-$total_keseluruhan;
    }
    function getkembalian(){
        return $this->kembali;
    }

    function viewData()
	{
		foreach ($this->dataTransaksi as $key) {
			echo $key['NO_NOTA'];
			echo " -> ";
			echo $key['TOTAL'];
			echo " -> ";
			echo $key['BAYAR'];
			echo " -> ";
			echo $key['KEMBALI'];
			echo " -> ";
			echo $key['ID_KASIR'];
			echo " -> ";
			echo $key['NAMA_MENU'];
			echo " -> ";
			echo $key['QTY'];
			echo " -> ";
			echo $key['TANGGAL'];
			echo "<br>";

			
		}
	}

}

$objmodelTransaksi=new modelTransaksi();

//$objModelTransaksi->update('4','CLUB19L','50','24000');
$objmodelTransaksi->selectidk();
//$objModelTransaksi->getnamakurir();
//$objModelTransaksi->viewnamakurir();
//$objModelTransaksi->viewData();

?>
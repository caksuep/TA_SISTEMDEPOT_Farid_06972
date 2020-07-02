<?php
session_start();
require "../models/modelDT.php";

class prosesmenu{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelpesan = new modelTransaksi();
        if($this->action=="act"){
            $nonota = $_POST["nonota"];
            $idkasir = $_SESSION["nama"];
            $tanggalan = $_POST["tanggal"];
            $totalbelanja = $_POST["totalbelanja"];
            $objmodelpesan->inserttr($nonota,$idkasir,$tanggalan,$totalbelanja);
            foreach ($_SESSION["cart"] as $kd_menu => $qty) {
                $sqltext = "SELECT * FROM MENU WHERE KODE_MENU = '$kd_menu'";
                    $statement = oci_parse(oci_connect("farid_06972mod1","farid","localhost/XE"),$sqltext);
                    oci_execute($statement);
                    $key=oci_fetch_array($statement,OCI_BOTH);
                    //$objmodelpesan->setsubtotal($objmodelpesan->viewhgbarang(),$jumlah);
                    $subtotal = $key['HARGA']*$qty;
                    $objmodelpesan->insertdetail($kd_menu,$nonota,$qty,$subtotal);
            }    
            
            unset($_SESSION["cart"]);
            header("location:../view/viewDatatransaksi.php");
        }
    }
}
$objprosesmenu = new prosesMenu($_GET['aksi']);
$objprosesmenu->proses();

?>
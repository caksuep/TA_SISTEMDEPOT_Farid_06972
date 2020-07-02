<?php
session_start();

class proseskeranjang{
  function cekid(){
      $kd_menu = $_GET['id'];
      if(isset($_SESSION['cart'][$kd_menu])){
        $_SESSION['cart'][$kd_menu]+=1;
      }else{
        $_SESSION['cart'][$kd_menu]=1;
      }
  }
}
$obj = new proseskeranjang();
$obj->cekid();
echo "<script>location='viewTransaksiN.php';</script>";
?>
                
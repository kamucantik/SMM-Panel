<?php
require("../config.php");

$cek_pesanan = $conn->query("SELECT * FROM pembelian_sosmed WHERE status IN ('','Pending','Processing') AND provider = 'PACIFIC-S1'");

if (mysqli_num_rows($cek_pesanan) == 0) {
  die("Order Pending not found.");
} else {
  while($data_pesanan = $cek_pesanan->fetch_assoc()) {
  if ($o_provider == "MANUAL") {
    echo "Order manual<br />";
  } else {
    
    $cek_provider = $conn->query("SELECT * FROM provider WHERE code = 'PACIFIC-S1'");
    $data_provider = $cek_provider->fetch_assoc();
    
    
    if ($o_provider !== "MANUAL") {
      $api_postdata = "api_key=".$data_provider['api_key']."&action=status&id=".$data_pesanan['provider_oid']."";
    } else {
      die("System error!");
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "".$data_provider['link']."");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $api_postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $chresult = curl_exec($ch);
    curl_close($ch);
    $json_result = json_decode($chresult, true);
    print_r($json_result);
    
    if ($o_provider !== "MANUAL") {
      $u_status = $json_result['data']['status'];   
      $u_start = $json_result['data']['start_count'];   
      $u_remains = $json_result['data']['remains'];
    }
    
    $update_pesanan = $conn->query("UPDATE pembelian_sosmed SET status = '$u_status', start_count = '$u_start', remains = '$u_remains' WHERE oid = '".$data_pesanan['oid']."'");
    if ($update_pesanan == TRUE) {
      echo "ID ".$data_pesanan['provider_oid']." status $u_status | start $u_start | remains $u_remains<br />";
    } else {
      echo "Error database.";
    }
  }
  }
}
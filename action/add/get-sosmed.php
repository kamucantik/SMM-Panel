<?php 
require_once("../../config.php");

$cek_provider = $conn->query("SELECT * FROM provider WHERE code = 'PACIFIC-S1'");
$data_provider = $cek_provider->fetch_assoc();

$postdata = "api_key=".$data_provider['api_key']."&action=layanan";
$endpoint = "".$data_provider['link']."";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$chresult = curl_exec($ch);
//echo $chresult;
curl_close($ch);
$json_result = json_decode($chresult, true);

//
$no = 1;
$indeks=0; 
while($indeks < count($json_result['data'])){ 
$id_provider = $json_result['data'][$indeks]['sid'];
$kategori = $json_result['data'][$indeks]['kategori'];
$layanan = $json_result['data'][$indeks]['layanan'];
$api = $json_result['data'][$indeks]['harga'];
$min = $json_result['data'][$indeks]['min'];
$max = $json_result['data'][$indeks]['max'];
$catatan = $json_result['data'][$indeks]['catatan'];
$provider = "PACIFIC-S1";
$indeks++; 

// setting price Member
$harga = $api / 0.88; // 0.88 = UNTUNG 12%
$jumlah_ha = number_format($harga,0,',','');

// setting price API
$harga_sp = $api / 0.90; // 0.90 = UNTUNG 10%
$jumlah_sp = number_format($harga_sp,0,',','');

// setting untung
$total_profit = $harga_sp - $api;
$jumlah_profit = number_format($total_profit,0,',','');

                                              
//INSERT KATEGORI KE DATABASE kategori_layanan
$cek_kategori = $conn->query("SELECT * FROM kategori_layanan WHERE nama = '$kategori'");
if(mysqli_num_rows($cek_kategori) > 0){
}else{
$input_kategori = $conn->query("INSERT INTO kategori_layanan VALUES ('','$kategori','$kategori','Sosial Media')");
}
		
$cek_layanan = $conn->query("SELECT * FROM layanan_sosmed WHERE provider_id = '$id_provider' AND provider = 'PACIFIC-S1'");
$data_layanan = $cek_layanan->fetch_assoc();
if(mysqli_num_rows($cek_layanan) > 0) {
echo "Layanan Sudah Ada Di database => $layanan2 | $id_provider \n <br />";
} else {

//INSERT LAYANAN KE DATABASE layanan_sosmed
$layanan2 = strtr($layanan, array(
' PACIFIC' => ' WEBKAMU',
' PACIFIC' => ' WEBKAMU',
' PACIFIC' => ' WEBKAMU',
' PACIFIC' => ' WEBKAMU',
));		

$sid = $no++;
$insert_layanan = $conn->query("INSERT INTO layanan_sosmed VALUES ('','$sid' ,'$kategori' ,'$layanan2' ,'$catatan' ,'$min' ,'$max' ,'$harga' ,'$harga_sp', '$total_profit', 'Aktif' ,'$id_provider' ,'PACIFIC-S1' ,'Sosial Media')");
if($insert_layanan == TRUE){

echo "===============================
Input Layanan Sukses  <br/>
Kategori : $kategori <br/>
SID : $sid <br />
Layanan : $layanan2 <br />
Min :$min <br />
Max : $max  <br />
Harga web : $harga  <br />
Harga api : $harga_sp  <br />
Note : $catatan <br />
===================================<br/>";
}else{
echo "Gagal";
}
// echo $no++." ";
}
}
?>	
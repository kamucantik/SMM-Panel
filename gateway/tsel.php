<?php
/* 
Script Topup Otomatis Via Pulsa TSEL
Creator : Salman El Faris
Editor : KangHL
 */
require_once "mainconfig.php";
require_once "EnvayaSMS.php";
require_once "../config.php";
$request = EnvayaSMS::get_request();
header("Content-Type: {$request->get_response_type()}");
if (!$request->is_validated($PASSWORD))
{
    header("HTTP/1.1 403 Forbidden");
    error_log("Invalid password");    
    echo $request->render_error_response("Invalid password");
    return;
}
$action = $request->get_action();
switch ($action->type)
{
    case EnvayaSMS::ACTION_INCOMING:    
    
        // Send an auto-reply for each incoming message.
    
    $type = strtoupper($action->message_type);
    $isi_pesan = $action->message;
    if($action->from == '858' AND preg_match("/Anda mendapatkan penambahan pulsa/i", $isi_pesan)) {
       $pesan_isi = $action->message;
       $insert_message = $conn->query("INSERT INTO pesan_tsel (isi, status, date) VALUES ('$pesan_isi', 'UNREAD', '$date')");
       $CheckHistory = $conn->query("SELECT * FROM deposit WHERE payment = '#1 Telkomsel Transfer' AND status = 'Pending' AND date = '$date'");
       if (mysqli_num_rows($CheckHistory) == 0) {
        error_log("Riwayat Top Up Tidak Tersedia");
    } else {          
       while($DataDeposit = mysqli_fetch_assoc($CheckHistory)) {
        $kode = $DataDeposit['kode_deposit'];
        $no_pegirim = $DataDeposit['nomor_pengirim'];
        $user = $DataDeposit['username'];
        $saldo = $DataDeposit['get_saldo'];
        $this_date = $DataDeposit['date'];
        $jumlah_transfer = $DataDeposit['jumlah_transfer'];
        $cekpesan = preg_match("/Anda mendapatkan penambahan pulsa Rp $jumlah_transfer dari nomor $no_pegirim tgl $this_date/i", $isi_pesan);
        if($cekpesan == true) {                              
            $update_history_topup = $conn->query("INSERT INTO history_saldo VALUES ('', '$user', 'Penambahan Saldo', '$saldo', 'Mendapatkan saldo melalui deposit otomatis dengan Kode Deposit : $kode', '$this_date', '$time')");                            
            $update_history_topup = $conn->query("UPDATE deposit SET status = 'Success' WHERE kode_deposit = '$kode'");
            $update_history_topup = $conn->query("UPDATE users SET saldo = saldo+$saldo WHERE username = '$user'");
            if($update_history_topup == TRUE) {  
                error_log("Saldo $user Telah Ditambahkan Sebesar $saldo");
            } else {
                error_log("System Error");
            }
        } else {
            error_log("data Transfer Pulsa Tidak Ada");
        }
    }
}
} else {
    error_log("Received $type from {$action->from}");
    error_log(" message: {$action->message}");
}                     

return;
}
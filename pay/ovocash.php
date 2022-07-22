<?php
session_start();
require("../config.php");
require '../lib/session_user.php';
	if (isset($_POST['request'])) {
	require '../lib/session_login.php';
		
		$post_provider = $conn->real_escape_string($_POST['provider']);
		$post_pembayaran = $conn->real_escape_string($_POST['pembayaran']);
		$post_jumlah = $conn->real_escape_string(trim(filter($_POST['jumlah'])));
                $post_pengirim = $conn->real_escape_string(trim(filter($_POST['pengirim'])));
        
		$cek_metod = $conn->query("SELECT * FROM metode_depo WHERE id = '$post_provider'");
		$data_metod = $cek_metod->fetch_assoc();
		$cek_metod_rows = mysqli_num_rows($cek_metod);
		
		$cek_provider = $conn->query("SELECT * FROM provider_pulsa WHERE code = 'DPEDIA'");
		$data_provider = mysqli_fetch_assoc($cek_provider);

		
		$cek_depo = $conn->query("SELECT * FROM deposit WHERE username = '$sess_username' AND status = 'Pending'");
		$data_depo = $cek_depo->fetch_assoc();
		$count_depo = mysqli_num_rows($cek_depo);
		
		$kode = acak_nomor(3).acak_nomor(3);


		if (!$post_provider || !$post_pembayaran || !$post_jumlah) {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Permintaan Gagal', 'pesan' => 'Harap Mengisi Input Pada Form <br /> - Tipe Pembayaran <br /> - Provider Pembayaran <br /> - Pembayaran <br /> - Pengirim <br /> - Jumlah');
			
		} else if ($cek_metod_rows == 0) {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Permintaan Gagal', 'pesan' => 'Metode Deposit Tidak Tersedia.');
			
		} else if ($count_depo >= 1) {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Permintaan Gagal', 'pesan' => 'Masih Terdapat Deposit Yang Berstatus Pending.');
		} else if ($post_jumlah < 10000) {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Permintaan Gagal', 'pesan' => 'Minimal Deposit Saldo 10000.');		
		    
	    } else {
	    
	    $postdata = "api_key=".$data_provider['key']."&nopengirim=085236276014&quantity=$post_jumlah&provider=".$data_metod['provider']."";
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://serverh2h.com/order/deposit");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $chresult = curl_exec($ch);
            //var_dump($chresult);
            curl_close($ch);
            $json_result = json_decode($chresult, true);
			
	    if ($json_result['error'] == TRUE) {
	    $_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Pemesanan Gagal', 'pesan' => ''.$json_result['error']);
	    } else {
	    $pesan = $json_result['pesan'];
	    $tujuan = $json_result['tujuan'];
	    $jumlah_tf = $json_result['jumlah_tf'];
	    $provider_oid = $json_result['code'];
	    $amount = $json_result['amount'];
	    
	        $metodnya = $data_metod['nama'];
	        $get_saldo = $post_jumlah * $data_metod['rate'];
	        $insert = $conn->query("INSERT INTO deposit VALUES ('','$provider_oid', '$sess_username', 'BANK', '".$data_metod['provider']."' ,'$metodnya', '-','$tujuan','$jumlah_tf', '$amount', 'Pending', 'Website', '$date', '$time')");
	        if ($insert == TRUE) {
	            exit(header("Location: ".$config['web']['url']."invoice.php")); 
	            
	      	           	            
	        } else {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Permintaan Gagal', 'pesan' => 'Error System(Insert To Database).');
	        }
	   }
	    }
	}
	require("../lib/header.php");
?>
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-primary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h5><i class="fa fa-check"></i> Hai <?php echo $sess_username; ?> !</h5>
							
<p><h6 class="text-purple">1. jika Anda masuk menggunakan PC maka <b>Informasi</b> terletak disebelah kanan form pesanan.<br /> <br />
2. jika Anda masuk menggunakan smartphone / mobile phone maka <b>Informasi</b> terletak dibagian bawah form pesanan.
Terimakasih.</p></h6>
					</div>
				</div>
			</div>
				<div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="m-t-0 text-uppercase text-center header-title"><i class="ti-wallet text-primary"></i> DEPOSIT OVO</h4><hr>
										<form class="form-horizontal" role="form" method="POST">
										<input type="hidden" name="csrf_token" value="<?php echo $config['csrf_token'] ?>">
											<div class="form-group">
												<label class="col-md-12 control-label">Operator</label>
												<div class="col-md-12">
													<select class="form-control" name="provider" id="provider">
													<option value="0">Pilih Salah Satu</option>
												<?php
												$cek_kategori = $conn->query("SELECT * FROM metode_depo WHERE provider = 'OVO' ORDER BY nama ASC");
												while ($data_metode = $cek_kategori->fetch_assoc()) {
												?>
													<option value="<?php echo $data_metode['id'];?>"><?php echo $data_metode['provider'];?></option>
	
												<?php } ?>														
													</select>
												</div>
											</div>	
											<div class="form-group">
												<label class="col-md-12 control-label">Pembayaran</label>
												<div class="col-md-12">
													<select class="form-control" name="pembayaran" id="pembayaran">
														<option value="0">Pilih Provider Pembayaran Terlebih Dahulu</option>
													</select>
												</div>
											</div>
																					
										<div class="form-group">
											<label class="col-md-12 control-label">Jumlah</label>
											<div class="col-md-12">
												<input type="number" class="form-control" name="jumlah" placeholder="Jumlah Deposit" id="jumlah">
											</div>
										</div>
									
											<div class="form-group">
												<div class="col-md-offset-2 col-md-12">
											<button type="submit" class="pull-right btn btn-primary btn-block waves-effect w-md waves-light" name="request"><i class="ti-wallet"></i> Deposit</button>
											    </div>
											</div>    
										</form>
									</div>
								</div>
							</div>										
                    
                    <!-- end col -->
                            <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                         <h4 class="m-t-0 text-uppercase header-title"><i class="mdi mdi-information mr-1 text-primary"></i> Informasi Deposit</h4><hr>
				<div class="card-body">
										<ul>
											<li> pilih salah satu pembayaran deposit.</li>
											
											<li>masukkan jumlah yang akan kamu transfer Dan Nanti Akan Di Tambah 3 Kode Unik Contoh 10.000 + (156) Maka Kamu Harus Transfer Nominal + kode unik Tadi Sebesar 10.156.</li>
											<li>Klik Deposit Proses</li>
											<li>Setelah anda transfer sesuai invoice silahkan klik konfirmasi, saldo akan otomatis masuk ke akun anda</li>
											<li>JANGAN TRANSFER SEBELUM REQUEST DEPOSIT. TRANSFER HARUS SESUAI NOMINAL UNIK, JANGAN DIBULATKAN</li>
										</ul>
										<p><b>Keterangan</b> : Deposit ON 24 jam, jarang sekali terjadi offline kecuali kalau ada gangguan dadakan </p>
									</div>
								</div>
							</div>
						</div>
<script type="text/javascript">
$(document).ready(function() {
	$("#tipe").change(function() {
		var tipe = $("#tipe").val();
		$.ajax({
			url: '<?php echo $config['web']['url']; ?>ajax/provider-deposit.php',
			data: 'tipe=' + tipe,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#provider").html(msg);
			}
		});
	});
	$("#provider").change(function() {
		var provider = $("#provider").val();
		$.ajax({
			url: '<?php echo $config['web']['url']; ?>ajax/pembayaran-deposit.php',
			data: 'provider=' + provider,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#pembayaran").html(msg);
			}
		});
	});
  $("#jumlah").change(function(){
    var pembayaran = $("#pembayaran").val();
    var jumlah = $("#jumlah").val();
    $.ajax({
      url : '<?php echo $config['web']['url']; ?>ajax/rate-deposit.php',
      type  : 'POST',
      dataType: 'html',
      data  : 'pembayaran='+pembayaran+'&jumlah='+jumlah,
      success : function(result){
        $("#rate").val(result);
      }
      });
    });  
});

	</script>	
<?php
	require ("../lib/footer.php");
?>
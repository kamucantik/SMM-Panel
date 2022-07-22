<?php
session_start();
require("../config.php");
require '../lib/session_user.php';
if (isset($_POST['request'])) {
	require '../lib/session_login.php';

	$post_tipe = $conn->real_escape_string($_POST['tipe']);		
	$post_provider = $conn->real_escape_string($_POST['provider']);
	$post_pembayaran = $conn->real_escape_string($_POST['pembayaran']);
	$post_jumlah = $conn->real_escape_string(trim(filter($_POST['jumlah'])));
	$post_pengirim = $conn->real_escape_string(trim(filter($_POST['pengirim'])));
	
	$cek_metod = $conn->query("SELECT * FROM metode_depo WHERE id = '$post_provider'");
	$data_metod = $cek_metod->fetch_assoc();
	$cek_metod_rows = mysqli_num_rows($cek_metod);
	
	
	
	$cek_depo = $conn->query("SELECT * FROM deposit WHERE username = '$sess_username' AND status = 'Pending'");
	$data_depo = $cek_depo->fetch_assoc();
	$count_depo = mysqli_num_rows($cek_depo);
	
	$kode = acak_nomor(3).acak_nomor(3);
	$acakin = acak_nomor(2).acak_nomor(1);


	if (!$post_provider || !$post_pembayaran || !$post_jumlah) {
		$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Permintaan Gagal', 'pesan' => 'Harap Mengisi Input Pada Form <br /> - Tipe Pembayaran <br /> - Provider Pembayaran <br /> - Pembayaran <br /> - Pengirim <br /> - Jumlah');
		
	} else if ($cek_metod_rows == 0) {
		$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Permintaan Gagal', 'pesan' => 'Metode Deposit Tidak Tersedia.');
		
	} else if ($count_depo >= 1) {
		$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Permintaan Gagal', 'pesan' => 'Masih Terdapat Deposit Yang Berstatus Pending.');
	} else if ($post_jumlah < 5000) {
		$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Permintaan Gagal', 'pesan' => 'Minimal Deposit Saldo 5000.');		
		
	} else {
		
		$metodnya = $data_metod['nama'];
		$get_saldo = $post_jumlah * $data_metod['rate'];
		$amount = $acakin + $get_saldo;
		$reg = $acakin + $post_jumlah;
		$insert = $conn->query("INSERT INTO deposit VALUES ('','$kode', '$sess_username', '".$data_metod['tipe']."', '".$data_metod['provider']."' ,'".$data_metod['nama']."', '$post_pengirim','".$data_metod['tujuan']."','$post_jumlah', '$get_saldo', 'Pending', 'Website', '$date', '$time')");
		if ($insert == TRUE) {
			exit(header("Location: ".$config['web']['url']."invoice.php")); 
			
			
		} else {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Permintaan Gagal', 'pesan' => 'Error System(Insert To Database).');
		}
	}
}
require("../lib/header.php");
?>
<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-warning"><i class="mdi mdi-information fa-fw"></i> Baca <b>INFORMASI</b> yang terletak dikanan <i>Pc,Tablet</i> / dibawah <i>Smartphone</i> form sebelum melakukan deposit saldo.
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-7">
		<div class="card">
			<div class="card-body">
				<h4 class="m-t-0 text-uppercase text-center header-title"><i class="ti-wallet text-primary"></i> DEPOSIT PULSA</h4><hr>
				<form class="form-horizontal" role="form" method="POST">
					<input type="hidden" name="csrf_token" value="<?php echo $config['csrf_token'] ?>">
					<div class="form-group">
						<label class="col-md-12 control-label">Tipe Pembayaran</label>
						<div class="col-md-12">
							<select class="form-control" name="tipe" id="tipe">
								<option value="0">Pilih salah satu.</option>
								<option value="Pulsa Transfer">Pulsa Transfer</option>
								
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-12 control-label">Provider Pembayaran</label>
						<div class="col-md-12">
							<select class="form-control" name="provider" id="provider">
								<option value="0">Pilih Tipe Pembayaran Terlebih Dahulu</option>
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
						<label class="col-md-12 control-label">Pengirim <br> <small class="text-danger">*Gunakan Awalan 08.. Jangan Pakai 62 / +62*</small></label>
						<div class="col-md-12">
							<input type="text" class="form-control"  placeholder="082232XXXXXX"  name="pengirim">
						</div>
					</div>		
					
					<div class="form-group">
						<label class="col-md-12 control-label">Jumlah</label>
						<div class="col-md-12">
							<input type="number" class="form-control" name="jumlah" placeholder="Jumlah Deposit" id="jumlah">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-12 control-label">Saldo Yang Didapatkan <br> <small class="text-success">*Klik Kolom di Bawah Ini Saldo Akan Muncul*</small></label>
						<div class="col-md-12">
							<input type="text" class="form-control"  name="saldo" placeholder="Saldo Yang Didapatkan" id="rate" readonly>
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
						<li>Jangan transfer sebelum request deposit, transfer harus sesuai nominal dan sesuai nomor pengirim.</li><br />
						<li>Jangan input deposit yang sama, jika deposit sebelumnya masih berstatus <span class="badge badge-warning">Pending</span></li><br />				
						<li>Metode PULSA TELKOMSEL rate saat ini <span class="badge badge-primary">0.82</span> ( rate sewaktu waktu bisa berubah )</li><br />
						<li>Metode PULSA XL/AXIS rate saat ini <span class="badge badge-primary">0.90</span> ( rate sewaktu waktu bisa berubah )</li><br />
					</b>
					<li>Minimal Deposit Rp 10.000</li><br />
				</b>
				<li>1 Nomor 1 Transaksi Yang dimaksud adalah Jika Anda Telah mengisi saldo sebesar Rp 10.000 Dengan Nomor Yang Sama 082xxxxx Maka Sebelum 24jam Anda tidak dapat mengisi saldo kembali sebesar Rp 10.000 Dengan Nomor Tersebut Kecuali Jika anda mengisi saldo Dengan Jumlah Yang Berbeda.</li><br />
				<li>Jika butuh bantuan silahkan hubungi Admin Melalui Ticket Bantuan / Halaman Kontak Admin</li><br />
			</ul>
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
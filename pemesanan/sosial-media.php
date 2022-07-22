<?php
session_start();
require '../config.php';
require '../lib/session_user.php';
	if (isset($_POST['pesan'])) {
	require '../lib/session_login.php';
		$post_kategori = $conn->real_escape_string(trim(filter($_POST['kategori'])));
		$post_layanan = $conn->real_escape_string(trim(filter($_POST['layanan'])));
		$post_jumlah = $conn->real_escape_string(trim(filter($_POST['jumlah'])));
		$post_target = $conn->real_escape_string(trim(filter($_POST['target'])));
		$post_comments = $_POST['comments'];

		$cek_layanan = $conn->query("SELECT * FROM layanan_sosmed WHERE service_id = '$post_layanan' AND status = 'Aktif'");
		$data_layanan = mysqli_fetch_assoc($cek_layanan);
		
		$cek_pesanan = $conn->query("SELECT * FROM pembelian_sosmed WHERE target = '$post_target' AND status = 'Pending'");
		$data_pesanan = mysqli_fetch_assoc($cek_pesanan);
		
		$cek_harga = $data_layanan['harga'] / 1000;
		$cek_profit = $data_layanan['profit'] / 2000;
		$hitung = count(explode(PHP_EOL, $post_comments));
	    $replace = str_replace("\r\n",'\r\n', $post_comments);
	    if (!empty($post_comments)) {
			$post_jumlah = $hitung;
		} else {
			$post_jumlah = $post_jumlah;
		}
		// $price = $rate*$post_quantity;
		if (!empty($post_comments)) {
			$harga = $cek_harga*$hitung;
			$profit = $cek_profit*$hitung;
		} else {
			$harga = $cek_harga*$post_jumlah;
			$profit = $cek_profit*$post_jumlah;
		}
		$order_id = acak_nomor(3).acak_nomor(4);
        $provider = $data_layanan['provider'];

		$cek_provider = $conn->query("SELECT * FROM provider WHERE code = '$provider'");
		$data_provider = mysqli_fetch_assoc($cek_provider);

		$url = $data_provider['link'];
		
        //Get Start Count
        if ($data_layanan['kategori'] == "Instagram Likes" AND "Instagram Likes Indonesia" AND "Instagram Likes [Targeted Negara]" AND "Instagram Likes/Followers Per Minute") {
            $start_count = likes_count($post_target);
        } else if ($data_layanan['kategori'] == "Instagram Followers No Refill/Not Guaranteed" AND "Instagram Followers Indonesia" AND "Instagram Followers [Negara]" AND "Instagram Followers [Refill] [Guaranteed] [NonDrop]") {
            $start_count = followers_count($post_target);
        } else if ($data_layanan['kategori'] == "Instagram Views") {
            $start_count = views_count($post_target);
        } else {
            $start_count = 0;
        }

		if (!$post_target || !$post_layanan || !$post_kategori) {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Pemesanan Gagal', 'pesan' => 'Harap Mengisi Form <br /> - Kategori <br /> - Layanan <br /> - Target');
			
		} else if (mysqli_num_rows($cek_layanan) == 0) {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Pemesanan Gagal', 'pesan' => 'Layanan Tidak Tersedia.');
			
		} else if (mysqli_num_rows($cek_provider) == 0) {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Pemesanan Gagal', 'pesan' => 'Server Sedang Maintance.');

		} else if ($post_jumlah < $data_layanan['min']) {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Pemesanan Gagal', 'pesan' => 'Jumlah Minimal Pemesanan Adalah '.number_format($data_layanan['min'],0,',','.').'.');
			
		} else if ($post_jumlah > $data_layanan['max']) {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Pemesanan Gagal', 'pesan' => 'Jumlah Maksimal Pemesanan Adalah '.number_format($data_layanan['max'],0,',','.').'.');
			
		} else if ($data_user['saldo'] < $harga) {
			$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Pemesanan Gagal', 'pesan' => 'Saldo Anda Tidak Mencukupi Untuk Melakukan Pemesanan Ini.');
			
		} else if (mysqli_num_rows($cek_pesanan) == 1) {
		    $_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Pemesanan Gagal', 'pesan' => 'Masih Terdapat Pesanan Dengan Tujuan / Target Yang Sama.');
		    
		} else {

			if ($provider == "MANUAL") {
				$api_postdata = "";
			} else if ($provider == "PACIFIC-S1") {
			    if ($post_comments == false) {
                $postdata = "api_key=".$data_provider['api_key']."&action=pemesanan&layanan=".$data_layanan['provider_id']."&target=$post_target&jumlah=$post_jumlah";
			    } else if ($post_comments == true) {
			    $postdata = "api_key=".$data_provider['api_key']."&action=pemesanan&layanan=".$data_layanan['provider_id']."&target=$post_target&jumlah=$post_jumlah&custom_comments=$post_commets";
			    }
			} else {
				die("System Error!");
			}
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "$url");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $chresult = curl_exec($ch);
            curl_close($ch);
            $json_result = json_decode($chresult, true);
            
			if ($provider == "PACIFIC-S1" AND $json_result['status'] == false) {
				$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Pemesanan Gagal', 'pesan' => 'Ups, '.$json_result['data']['pesan']);
			} else {
            if ($provider == "PACIFIC-S1") {
					$provider_oid = $json_result['data']['id'];
				}

    			if ($conn->query("INSERT INTO pembelian_sosmed VALUES ('','$order_id', '$provider_oid', '$sess_username', '".$data_layanan['layanan']."', '$post_target', '$post_jumlah', '0', '$start_count', '$harga', '$profit', 'Pending', '$date', '$time', '$provider', 'Website', '0')") == true) {
				 	$conn->query("UPDATE users SET saldo = saldo-$harga, pemakaian_saldo = pemakaian_saldo+$harga WHERE username = '$sess_username'");
					$conn->query("INSERT INTO history_saldo VALUES ('', '$sess_username', 'Pengurangan Saldo', '$harga', 'Pemesanan Sosial Media Dengan Order ID $order_id', '$date', '$time')");	   
									
    				$jumlah = number_format($post_jumlah,0,',','.');
    				$harga2 = number_format($harga,0,',','.');
    				$_SESSION['hasil'] = array(
    				 'alert' => 'success',
    				 'judul' => 'Pesanan Berhasil.',
    				 'pesan' => '<b>Order ID : </b> '.$order_id.'<br />
    				 - <b>Layanan : </b> '.$data_layanan['layanan'].'<br />
    				 - <b>Target : </b> '.$post_target.'<br />
    				 - <b>Start Count : </b> '.$start_count.'<br />
    				 - <b>Jumlah Pesan : </b> '.$jumlah.'<br />
    				 - <b>Total Harga : </b> Rp '.$harga2.'');
					} else {
						$_SESSION['hasil'] = array('alert' => 'danger', 'judul' => 'Pemesanan Gagal', 'pesan' => 'Error System (2)');
					}
				}
			}
		}
	
	require("../lib/header.php");
?>
			
				<div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">                                            
                                <h4 class="m-t-0 text-uppercase text-center header-title"><img src="/assets/index/social-media.png" alt="Sosial Media" style="height: 1.5rem;width: 1.5rem; mb-2"></img> PEMESANAN BARU </h4><hr>
                                	<form class="form-horizontal" method="POST">
	                              	<input type="hidden" name="csrf_token" value="<?php echo $config['csrf_token'] ?>">   										    
											<div class="form-group">
												<label class="col-md-12 control-label">Kategori</label>
												<div class="col-md-12">
													<select class="form-control" id="kategori" name="kategori">
														<option value="">Pilih Salah Satu...</option>
												<?php
												$cek_kategori = $conn->query("SELECT * FROM kategori_layanan WHERE tipe = 'Sosial Media' ORDER BY nama ASC");
												while ($data_kategori = $cek_kategori->fetch_assoc()) {
												?>
														<option value="<?php echo $data_kategori['kode']; ?>"><?php echo $data_kategori['nama']; ?></option>
												<?php } ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-12 control-label">Layanan</label>
												<div class="col-md-12">
													<select class="form-control" name="layanan" id="layanan">
														<option value="0">Pilih Kategori Terlebih Dahulu</option>
													</select>
												</div>
											</div>
											<div class="form-group">
											<div class="col-md-12">
											<div id="catatan"></div>
											</div>
											</div>
											<div class="form-group">
												<label class="col-md-12 control-label">Link/Target</label>
												<div class="col-md-12">
													<input type="text" name="target" class="form-control" placeholder="Masukan Username Target / Link Target">
												</div>
											</div>
											<div id="show1">
											<div class="form-group">
												<label class="col-md-12 control-label">Jumlah</label>
												<div class="col-md-12">
													<input type="number" name="jumlah" class="form-control" placeholder="Jumlah" onkeyup="get_total(this.value).value;">
												</div>
											</div>
											
											<input type="hidden" id="rate" value="0">
											<div class="form-group">
												<label class="col-md-12 control-label">Total Harga</label>
												<div class="col-md-12">
													<input type="number" class="form-control" id="total" readonly>
												</div>
											</div>
											</div>
											<div id="show2" style="display: none;">
												<div class="form-group">
													<label class="col-md-12 control-label">Comment</label>
													<div class="col-md-12">
														<textarea class="form-control" name="comments" id="comments" placeholder="Pisahkan Tiap Baris komentar dengan enter"></textarea>
													</div>
												</div>
												<input type="hidden" id="rate" value="0">
    											<div class="form-group">
    												<label class="col-md-12 control-label">Total Harga</label>
    												<div class="col-md-12">
    													<input type="number" class="form-control" id="totalxx" readonly>
    												</div>
    											</div>
											</div>		
											<div class="col-md-12"> <button type="submit" class="pull-right btn btn-block btn--md btn-primary waves-effect w-md waves-light" name="pesan"><i class="mdi mdi-cart"></i>	Buat Pesanan</button> 
											
											</div> 
										</form>
                            </div>
                        </div>
                    </div> 
                    
                    <!-- end col -->
                            <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="m-t-0 text-uppercase header-title"><i class="mdi mdi-information mr-1 text-primary"></i> Informasi Pemesanan</h4><hr>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead></div>
        	    		<center><b>WAJIB BACA!!<br/>PERATURAN SEBELUM ORDER</b></center><br/>
        				    <ol class="list-p">
        							<li><b>Jangan menggunakan lebih dari satu layanan sekaligus untuk username/link yang sama. Harap tunggu status <span class="badge badge-success">Success</span></b></li>
        							<li><b>Setelah order dimasukan, jika username/link yang diinput diganti pribadi atau diubah, kami tidak akan mengembalikan. Pastikan Anda memasukkan data yang benar, karena kami tidak akan lagi membatalkan pesanan.</b></li>
        							<li><b>Perhatikan min/max dalam mengorder, karena order tidak akan jalan bila min/max kekurangan/melebihi.</b></li>
        							<li><b>Kesalahan member, bukan tanggung jawab admin, karena panel ini serba automatis, jadi hati-hati dan perhatiakan sebelum order!</b></li>
        							<li><b>Jika Orderan status <span class="badge badge-warning">Partial</span> & <span class="badge badge-danger">Error</span> Harap Lapor admin untuk di Re-order!</b></li>
        							<li><b>Jika Pesanan belum selesai, dalam waktu 1x24Jam silakan hubungi Admin!</b></li>
        					</ol>
        			</tbody>
        					</table>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div> 
<script type="text/javascript">
$(document).ready(function() {
	$("#kategori").change(function() {
		var kategori = $("#kategori").val();
		$.ajax({
			url: '<?php echo $config['web']['url']; ?>ajax/layanan_sosmed.php',
			data: 'kategori=' + kategori,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#layanan").html(msg);
			}
		});
	});
	$("#layanan").change(function() {
		var layanan = $("#layanan").val();
		$.ajax({
			url: '<?php echo $config['web']['url']; ?>ajax/catatan_sosmed.php',
			data: 'layanan=' + layanan,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#catatan").html(msg);
			}
		});
		$.ajax({
			url: '<?php echo $config['web']['url']; ?>ajax/rate_sosmed.php',
			data: 'layanan=' + layanan,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#rate").val(msg);
			}
		});
	});
});
document.getElementById("show1").style.display = "none";
    $("#layanan").change(function() {
		var selectedCountry = $("#layanan option:selected").text();
		if (selectedCountry.indexOf('Komen') !== -1 || selectedCountry.indexOf('komen') !== -1 || selectedCountry.indexOf('comment') !== -1 || selectedCountry.indexOf('Comment') !== -1) {
			document.getElementById("show1").style.display = "none";
			document.getElementById("show2").style.display = "block";
		} else {
		    document.getElementById("show1").style.display = "block";
			document.getElementById("show2").style.display = "none";
		}
	});
	 $(document).ready(function(){
            $("#comments").on("keypress", function(a){
                if(a.which == 13) {
                    var baris = $("#comments").val().split(/\r|\r\n|\n/).length;
                    var rates = $("#rate").val();
                    var calc = eval(baris)*rates;
                    console.log(calc)
                    $('#totalxx').val(calc);
                }
            });

        });
function get_total(quantity) {
	var rate = $("#rate").val();
	var result = eval(quantity) * rate;
	$('#total').val(result);
}
	</script>						
<?php
	require ("../lib/footer.php");
?>
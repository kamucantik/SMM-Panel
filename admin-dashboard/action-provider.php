<?php
session_start();
require '../config.php';
require '../lib/session_login_admin.php';

$cek_provider_sosmed = $conn->query("SELECT * FROM provider WHERE code = 'LOLLIPOP'");
$data_provider_sosmed = $cek_provider_sosmed->fetch_assoc();
                                         
require '../lib/header_admin.php';
?> 
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title text-center"><i class="mdi mdi-server-security text-primary"></i> INFORMASI AKUN PUSAT</h4>
                <hr />

                <h5 class="m-t-0 text-center text-primary">PROVIDER</h5>
                <?php 
                         $postdata = "api_key=".$data_provider_sosmed['api_key']."&action=profile";
                         $endpoint = "https://api.pacific-pedia.id/profile";

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
                                ?>
                <div class="text-dark">                    
                    NAME : <b> <?php echo $json_result['data']['username']; ?></b><br />
                    SALDO :
                    <b>
                        Rp
                        <?php echo number_format($json_result['data']['saldo_sosmed'],0,',','.'); ?>
                    </b>
                    <br />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <ul class="nav nav-tabs tabs-bordered">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#update">UPDATE</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#hapus">HAPUS</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="update" class="tab-pane active">
                                <h4 class="m-t-0 header-title text-center">UPDATE LAYANAN & CATEGORY</h4>
                                <hr />
                                <br />
                                <ul class="nav line-tabs nav-justified line-tabs-2x line-tabs-solid mb-2">
                                    <li class="nav-item">
                                        <a href="/action/add/get-sosmed" class="btn-loading">
                                            <img src="/assets/index/update_sosmed.svg" alt="UPDATE LAYANAN SOSMED" style="height: 2rem;width: 2rem; mb-2"></img>
                                            <img src="/assets/index/cat_sosmed.svg" alt="UPDATE CATEGORY SOSMED" style="height: 3rem;width: 3rem; mb-2"></img>
                                            <br />
                                            <span class="text-muted"><h6 class="text-dark m-t-0 text-center">UPDATE LAYANAN & CATEGORY SOSMED</h6></span>
                                        </a>
                                    </li>
                                </ul>
                                <br />
                                <hr />
                            </div>

                            <div id="hapus" class="tab-pane">
                                <h4 class="m-t-0 header-title text-center">HAPUS LAYANAN & CATEGORY</h4>
                                <hr />
                                <br />
                                <ul class="nav line-tabs nav-justified line-tabs-2x line-tabs-solid mb-2">                                    
                                    <li class="nav-item">
                                        <a href="/action/delete/delete-service-sosmed" class="btn-loading">
                                            <img src="/assets/index/del_sos.png" alt="DELETE LAYANAN SOSMED" style="height: 3rem;width: 3rem; mb-2"></img>
                                            <br />
                                            <span class="text-muted"><h6 class="text-dark m-t-0 text-center">DELETE LAYANAN SOSMED</h6></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/action/delete/delete-cat-sosmed" class="btn-loading">
                                            <img src="/assets/index/delete_cat_sos.svg" alt="DELETE CATEGORY SOSMED" style="height: 3rem;width: 3rem; mb-2"></img>
                                            <br />
                                            <span class="text-muted"><h6 class="text-dark m-t-0 text-center">DELETE CATEGORY SOSMED</h6></span>
                                        </a>
                                    </li>
                                </ul>
                                <br />
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                  
<?php 
require '../lib/footer_admin.php';
?>
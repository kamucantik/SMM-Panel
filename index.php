<?php
session_start();
require("config.php");
if (!isset($_SESSION['user'])) {    
exit(header("Location: ".$config['web']['url']."home/"));
} else {     
require("lib/header.php");  
$sess_username = $_SESSION['user']['username'];
?> 
<div class="row">
    <div class="col-md-4">
        <div class="card widget-box-three">
            <div class="card-body">
                <div class="bg-icon float-left"><img src="/assets/svg/user.svg" style="height: 6rem;width: 6rem;"></img></div>
                <div class="text-right">
                    <p>Total Saldo</p>
                    <h3 class="m-b-10">
                        <span>
                            Rp
                            <?php echo number_format($data_user['saldo'],0,',','.'); ?>
                        </span>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card widget-box-three">
            <div class="card-body">
                <div class="bg-icon float-left"><img src="/assets/svg/wallet.png" style="height: 6rem;width: 6rem;"></img></div>
                <div class="text-right">
                    <p>Total Deposit Saldo</p>
                    <h3 class="m-b-10">
                        <span><?php echo $jumlah_deposit_user; ?></span>
                        <hr />
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card widget-box-three">
            <div class="card-body">
                <div class="bg-icon float-left"><img src="/assets/index/social-media.png" style="height: 6rem;width: 6rem;"></img></div>
                <div class="text-right">
                    <p>Total Pemesanan</p>
                    <h3 class="m-b-10">
                        <span>
                            Rp
                            <?php echo number_format($data_order_sosmed['total'],0,',','.'); ?>
                            <br />
                            <h5>
                                (
                                <?php echo $jumlah_order_sosmed; ?>
                                )
                            </h5>
                        </span>
                        <hr />
                    </h3>
                </div>
            </div>
        </div>
    </div>
    
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-t-0 text-uppercase text-center header-title"><i class="mdi mdi-newspaper text-primary"></i> 5 Berita & Informasi</h4>
                        <hr />
                        <table class="table footable toggle-square">
                            <tbody>
                                <?php $check_news = $conn->query("SELECT * FROM berita ORDER BY id DESC LIMIT 5"); ?>
                                <?php while ($data_news = $check_news->fetch_assoc()) { ?>
                                <?php
                                                    if ($data_news['tipe'] == "INFORMASI") $btn = "info";
                                                    if ($data_news['tipe'] == "PERINGATAN") $btn = "warning";
                                                    if ($data_news['tipe'] == "PENTING") $btn = "danger";
                                                    if ($data_news['tipe'] == "DEPOSIT") $btn = "primary";
                                                    if ($data_news['tipe'] == "UPDATE") $btn = "success";
                                                ?>
                                <tr>
                                    <td width="60">
                                        <a href="<?= $config['web']['url']; ?>user/news?id=<?= $data_news['id']; ?>" class="btn btn-lg btn-<?= $btn; ?>"><i class="fas fa-info-circle"></i></a>
                                    </td>
                                    <td style="vertical-align: middle !important;">
                                        <h6>
                                            <a href="<?= $config['web']['url']; ?>user/news?id=<?= $data_news['id']; ?>" class="text-dark"><?= $data_news['subjek']; ?></a>
                                        </h6>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a href="<?= $config['web']['url']; ?>user/news" class="btn btn-primary waves-effect">Tampilkan Semua...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
}
require 'lib/footer.php';
?>
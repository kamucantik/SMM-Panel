<?php
session_start();
require '../config.php';
require '../lib/header.php';
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <center>
                    <h4 class="text-primary">Sosial Media</h4>
                    Terakhir Diperbarui
                    <?php
echo date('j F Y');
?>
                </center>
                <br />
                <?php $cpr = $conn->query("SELECT * FROM kategori_layanan WHERE tipe = 'Sosial Media'"); ?>
                <?php while ($dpr = $cpr->fetch_assoc()) { ?>
                <center>
                    <h3><?= $dpr['nama']; ?></h3>
                </center>
                <br />
                <?php $cprl = $conn->query("SELECT * FROM layanan_sosmed WHERE kategori = '".$dpr['kode']."' ORDER BY harga ASC"); ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hovered mb-1">
                        <thead>
                            <tr>
                                <th width="200">ID</th>
                                <th width="500">Nama Produk</th>
                                <th width="200">Harga/1000</th>
                                <th width="200">Harga H2H/1000</th>
                                <th width="200">Min</th>
                                <th width="200">Max</th>
                                <th width="100">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($dprl = $cprl->fetch_assoc()) { ?>
                            <?php
                                        if ($dprl['status'] == "Aktif") {
                                            $label = "success";
                                        } else {
                                            $label = "danger";
                                        }
                                        ?>
                            <tr>
                                <td><?= $dprl['provider_id']; ?></td>
                                <td><?= $dprl['layanan']; ?></td>
                                <td>
                                    Rp
                                    <?= number_format($dprl['harga'],0,',','.'); ?>
                                </td>
                                <td>
                                    Rp
                                    <?= number_format($dprl['harga_api'],0,',','.'); ?>
                                </td>
                                <td><?= number_format($dprl['min'],0,',','.'); ?></td>
                                <td><?= number_format($dprl['max'],0,',','.'); ?></td>
                                <td>
                                    <label class="btn btn-xs btn-<?= $label; ?>"><?= $dprl['status']; ?></label>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        
    });
</script>
<?php
require '../lib/footer.php';
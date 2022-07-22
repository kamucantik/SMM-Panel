<?php
session_start();
require("../config.php");
require '../lib/session_user.php';
	require '../lib/session_login.php';
	
	require("../lib/header.php");
?>
      <div class="row">
	    <div class="col-12">
	        <div class="card card-body">
	            <h3 class="text-center"> METODE DEPOSIT </h3>
	            <div class="row" style="margin-top:20px;">
	                <div class="col-lg-4 col-sm-12">
	                    <a class="card card-body text-center text-success" href="/pay/bank" style="height:200px;">
	                        <center>
	                            <img src="/assets/images/depo/tf-bank.jpg" class="img-responsive" width="200"/>
	                        </center>
	                        <br/>
	                        <h4><b>BANK Transfer</b></h4>
	                    </a>
	                </div>
	                
	                <div class="col-lg-4 col-sm-12">
	                    <a class="card card-body text-center text-success" href="/pay/e-wallet" style="height:200px;">
	                        <center>
	                            <img src="/assets/images/depo/e-wallet.jpg" class="img-responsive" width="200"/>
	                        </center>
	                        <br/>
	                        <h4><b>E-money / E-wallet</b></h4>
	                    </a>
	                </div>
	                
	                <div class="col-lg-4 col-sm-12">
	                    <a class="card card-body text-center text-success" href="/pay/pulsa" style="height:200px;">
	                        <center>
	                            <img src="/assets/images/depo/pulsa.png" class="img-responsive" width="200"/>
	                        </center>
	                        <br/><br/>
	                        <h4><b>Pulsa Transfer</b></h4>
	                    </a>
	                </div>
	            </div>
	            
	            <div class="row">
	                <div class="col-lg-4 col-sm-12">
	                    <a class="card card-body text-center text-success" href="/pay/redeem" style="height:200px;">
	                        <center>
	                            <img src="/assets/images/depo/voc.svg" class="img-responsive" width="100"/>
	                        </center>
	                        <br/>
	                        <h4><b>Redeem Code</b></h4>
	                    </a>
	                </div>
	                
	                <div class="col-lg-4 col-sm-12">
	                    <a class="card card-body text-center text-success" href="/pay/manual" style="height:200px;">
	                        <center>
	                            <img src="/assets/images/depo/scan.png" class="img-responsive" width="100"/>
	                        </center>
	                        <br/>
	                        <h4><b>Scan Qris</b></h4>
	                    </a>
	                </div>
	                
	                <div class="col-lg-4 col-sm-12">
	                    <a class="card card-body text-center text-success" href="/invoice" style="height:200px;">
	                        <center>
	                            <img src="/assets/images/depo/invoice.png" class="img-responsive" width="100"/>
	                        </center>
	                        <br/>
	                        <h4><b>Invoice Pending</b></h4>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
				
<?php
	require ("../lib/footer.php");
?>
<div class="col-xl-12 mt-3 mb-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="pill" href="#faucetpay_info">FaucetPay</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#faucetpay_api"><?php echo strtoupper($apiName);?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#faucetpay_withdraw"><?php echo ucfirst($withdrawName);?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#faucetpay_deposit"><?php echo ucfirst($depositName);?></a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane container active" id="faucetpay_info">
            <div class="col-xl-12  p-3 mt-3 mb-3 border rounded">
                <a href="https://faucetpay.io/?r=184175" target="_blank"><img class="bg-white bg-opacity-75 rounded mb-2" src="../plugins/faucetpay/assets/img/faucetpay.png" height="100px;"></a>
            </div>
        </div>
        <div class="tab-pane container fade" id="faucetpay_api"><?php require __DIR__.'/api/api.php';?></div>
        <div class="tab-pane container fade" id="faucetpay_withdraw"><?php require __DIR__.'/withdraw/withdraw.php';?></div>
        <div class="tab-pane container fade" id="faucetpay_deposit"><?php require __DIR__.'/deposit/deposit.php';?></div>
    </div>
</div>




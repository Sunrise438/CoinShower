<div class="row">
    <div class="mt-3 mb-3 p-3 bg-dark bg-gradient text-white rounded">
        <ol class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-white">
                <div class="lg-2 me-auto">
                    <div class="fw-bold h5"><?php echo strtoupper($apiName) .' '.ucwords($keyName);?></div>
                    <h5><span class="badge bg-secondary text-dark fw-bold"><?php echo $faucetpay_method_info["api_key"];?></span></h5>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start bg-transparent text-white">
                <div class="lg-2 me-auto h5">
                    <div class="fw-bold"><?php echo ucfirst($merchantName);?></div>
                    <h4><span class="badge bg-secondary text-dark fw-bold"><?php echo $faucetpay_method_info["merchant"];?></span></h4>
                </div>
            </li>
        </ol>
    </div>
</div>

<?php
require __DIR__.'/api_data.php';
require __DIR__.'/api_form.php';
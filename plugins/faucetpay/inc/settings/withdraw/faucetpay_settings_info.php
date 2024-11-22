<div class="row">
    <div class="col-xl-7">
        
        <ol class="list-group">
            
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucwords($withdrawalName.' '.$actionName);?></div>
                    <?php 
                        if ($faucetpay_method_info['wid_action']){
                            echo '<h5><span class="badge bg-primary">'. ucfirst($enabledName).'</span></h5>';
                        } else {
                            echo '<h5><span class="badge bg-secondary">'. ucfirst($disabledName).'</span></h5>';
                        }
                    ?>
                </div>
                    <?php 
                    require __DIR__.'/faucetpay_settings_form_withdraw_action.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucwords($instantName.' '.$withdrawalName);?></div>
                    <?php 
                        if ($faucetpay_method_info['instant_action']){
                            echo '<h5><span class="badge bg-primary">'. ucfirst($enabledName).'</span></h5>';
                        } else {
                            echo '<h5><span class="badge bg-secondary">'. ucfirst($disabledName).'</span></h5>';
                        }
                    ?>
                </div>
                    <?php 
                    require __DIR__.'/faucetpay_settings_form_instant_action.php';
                    ?>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucwords($minName.' '.$withdrawalName.' '.$faucetPayName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($faucetpay_method_info['min_withdraw'],8).' '. strtoupper($selectedCoin);?></span>
                </div>
                    <?php 
                        require __DIR__.'/faucetpay_settings_form_min_withdraw_faucetpay.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucwords($maxName.' '.$withdrawalName.' '.$faucetPayName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($faucetpay_method_info['max_withdraw'],8).' '. strtoupper($selectedCoin);?></span>
                </div>
                    <?php 
                        require __DIR__.'/faucetpay_settings_form_max_withdraw_faucetpay.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucwords($maxName.' '.$withdrawalName.' '.$faucetPayName).' ('.$instantName.')';?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($faucetpay_method_info['max_withdraw_instant'],8).' '. strtoupper($selectedCoin);?></span>
                </div>
                    <?php 
                        require __DIR__.'/faucetpay_settings_form_max_withdraw_instant_faucetpay.php';
                    ?>
            </li>
            
        </ol>
    </div>
    <div class="col-lg-5"></div>
</div>

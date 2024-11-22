<div class="row">
    <div class="col-lg-6">
        <ol class="list-group">
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($siteName).' '. ucfirst($currencyName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark">
                        <img src="image/coin/<?php echo strtolower($selectedCoin).'.png';?>" height="30px;" title="<?php echo strtoupper($selectedCoin);?>">
                    </span>
                </div>
                    <?php 
                    
                    require 'earn_settings_form_coin.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucwords($faucetName.' '.$statusName);?></div>
                    <?php 
                        if ($site_info_row['faucet_action']){
                            echo '<h5><span class="badge bg-primary">'. ucfirst($enabledName).'</span></h5>';
                        } else {
                            echo '<h5><span class="badge bg-secondary">'. ucfirst($disabledName).'</span></h5>';
                        }
                    ?>
                </div>
                    <?php 
                    require __DIR__.'/faucet_settings_form_action.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mt-3 mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($updateName).' '.ucfirst($faucetName).' '. ucfirst($amountName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($site_info_row['faucet_amount'],8).' '. strtoupper($selectedCoin);?></span>                </div>
                    <?php 
                    
                    require 'earn_settings_form_amount_update.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mt-3 mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($faucetName).' '. ucfirst($timerName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo $site_info_row['faucet_timer'].' '. ucfirst($minutesName);?></span>
                </div>
                    <?php 
                    
                    require 'earn_settings_form_timer.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($faucetName).' '. ucfirst($amountName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($site_info_row['faucet_amount'],8).' '. strtoupper($selectedCoin);?></span>
                </div>
                    <?php 
                    
                    require 'earn_settings_form_amount.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($faucetName).' '. ucfirst($amountName).' USD';?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($site_info_row['faucet_amount_usd'],8).' '. strtoupper('usd');?></span>
                </div>
                    <?php 
                    
                    require 'earn_settings_form_amount_usd.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($faucetName).' '. ucfirst($referralsName).' '. ucfirst($commissionName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo $site_info_row['faucet_amount'].'% '. ucfirst($minutesName);?></span>
                </div>
                    <?php 
                    
                    require 'earn_settings_form_ref.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($updateName).' '. ucfirst($coinName).' '. ucfirst($valueName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($selectedCoin_value,8).' '. strtoupper('usd');?></span>
                </div>
                    <?php 
                    
                    require 'earn_settings_form_coin_value.php';
                    ?>
            </li>
        </ol>
    </div>
    <div class="col-lg-6"></div>
</div>

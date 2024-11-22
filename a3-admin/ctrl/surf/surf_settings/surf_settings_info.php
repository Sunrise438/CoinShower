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
                    
                    require 'surf_settings_form_coin.php';
                    ?>
            </li>
            
            <!-- surf status -->
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucwords($surfName.' '.$statusName);?></div>
                    <?php 
                        if ($site_info_row['surf_action']){
                            echo '<h5><span class="badge bg-primary">'. ucfirst($enabledName).'</span></h5>';
                        } else {
                            echo '<h5><span class="badge bg-secondary">'. ucfirst($disabledName).'</span></h5>';
                        }
                    ?>
                </div>
                    <?php 
                    require __DIR__.'/surf_settings_form_action.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mt-3 mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($updateName).' '.ucfirst($priceName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($site_info_row['surf_base_price'],8).' '. strtoupper($selectedCoin);?></span>                </div>
                    <?php 
                    
                    require 'surf_settings_form_price.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($basePriceName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($site_info_row['surf_base_price'],8).' '. strtoupper($selectedCoin);?></span>
                </div>
                    <?php 
                    
                    require 'surf_settings_form_base_price.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($pricePerSecondName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($site_info_row['surf_price_per_second'],8).' '. strtoupper($selectedCoin);?></span>
                </div>
                    <?php 
                    
                    require 'surf_settings_form_price_per_second.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($basePriceName).' USD';?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($site_info_row['surf_base_price_usd'],8).' '. strtoupper($selectedCoin);?></span>
                </div>
                    <?php 
                    
                    require 'surf_settings_form_base_price_usd.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($pricePerSecondName).' USD';?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($site_info_row['surf_price_per_second_usd'],8).' '. strtoupper($selectedCoin);?></span>
                </div>
                    <?php 
                    
                    require 'surf_settings_form_price_per_second_usd.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($surfName).' '. ucfirst($commissionName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo $site_info_row['surf_commission'].'% ';?></span>
                </div>
                    <?php 
                    
                    require 'surf_settings_form_commission.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($surfName).' '. ucfirst($referralsName).' '. ucfirst($commissionName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo $site_info_row['surf_ref_commission'].'% ';?></span>
                </div>
                    <?php 
                    
                    require 'surf_settings_form_ref.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($surfName).' '. ucfirst($minName).' '. ucfirst($depositName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo $site_info_row['surf_min_deposit'].' '. strtoupper($selectedCoin);?></span>
                </div>
                    <?php 
                    
                    require 'surf_settings_form_min_deposit.php';
                    ?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($updateName).' '. ucfirst($coinName).' '. ucfirst($valueName);?></div>
                    <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($selectedCoin_value,8).' '. strtoupper('usd');?></span>
                </div>
                    <?php 
                    
                    require 'surf_settings_form_coin_value.php';
                    ?>
            </li>
        </ol>
    </div>
    <div class="col-lg-6"></div>
</div>

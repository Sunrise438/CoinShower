<div class="row text-center rounded mt-3 mb-3">
    
    <div class="col-lg-3 mt-2 mb-2 p-2">
        <div class="col-lg-12 bg-dark border rounded p-2">
            <h4 class="text-success"><?php echo ucfirst($accountName.' '.$balanceName);?></h4>
            <h3 class="fw-bold text-white"><?php echo number_format($user_info['bal'],$site_info_row['truncate_currency']);?></h3>
        </div>
    </div>
    
    <div class="col-lg-3 mt-2 mb-2 p-2">
        <div class="col-lg-12 bg-dark rounded p-2">
            <h4 class="text-success"><?php echo ucfirst($purchaseName.' '.$balanceName);?></h4>
            <h3 class="fw-bold text-white"><?php echo number_format($user_info['p_bal'],$site_info_row['truncate_currency']);?></h3>
        </div>
    </div>
    
    <div class="col-lg-3 mt-2 mb-2 p-2">
        <div class="col-lg-12 bg-dark rounded p-2">
            <h4 class="text-success"><?php echo ucfirst($earnedName);?></h4>
            <h3 class="fw-bold text-white"><?php echo hrfFormat(number_format($user_info['earned_faucet'] + $user_info['earned_surf'] + $user_info['earned_shortlink'] + $user_info['earned_offerwall'] + $user_info['earned_buysell'],$site_info_row['truncate_currency']));?></h3>
        </div>
    </div>
    
    <div class="col-lg-3 mt-2 mb-2 p-2">
        <div class="col-lg-12 bg-dark rounded p-2">
            <h4 class="text-success"><?php echo ucwords($referralsName.' '.$earnedName);?></h4>
            <h3 class="fw-bold text-white"><?php echo hrfFormat(number_format($user_info['earned_faucet_ref'] + $user_info['earned_surf_ref'] + $user_info['earned_shortlink_ref'] + $user_info['earned_offerwall_ref'] + $user_info['earned_buysell_ref'],$site_info_row['truncate_currency']));?></h3>
        </div>
    </div>
    
</div>
<div class="col-xl-12  p-3 mt-3 mb-3 border rounded">
    <a href="https://faucetpay.io/?r=184175" target="_blank"><img class="bg-white bg-opacity-75 rounded mb-2" src="plugins/faucetpay/assets/img/faucetpay.png" height="100px;"></a>
    <h5 class="mb-3"><?php echo ucfirst($balanceName).' <b>'.number_format($user_info['bal'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin).'</b>';?></h5>    
    <h6><?php echo ucfirst($minimumWithdrawalIsName).' <b>'.number_format($withdraw_method['faucetpay']['min_withdraw'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin).'</b>';?></h6>
    <h6><?php echo ucfirst($uptoName).' <b>'.number_format($withdraw_method['faucetpay']['max_withdraw_instant'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin).'</b> '. ucfirst($withdrawalsAreProcessedInstantlyName);?></h6>    
    <h6><?php echo ucfirst($maximumWithdrawalIsName).' <b>'.number_format($withdraw_method['faucetpay']['max_withdraw'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin).'</b>';?></h6>
</div>
<hr>
<?php
    if ($user_info['bal'] >= $withdraw_method['faucetpay']['min_withdraw']){
?>

<div class="row p-3">
    <div class="col-xl-12 <?php if (isset($dataErr)){echo 'alert alert-danger';}?>">
        <span class="text-danger fw-bold"><?php if (isset($dataErr)){echo $dataErr;}?></span>
    </div>
</div>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?t=faucetpay">
    
    <div class="form-floating mt-3 mb-3">
            <input type="number" class="form-control" min="<?php echo $withdraw_method['faucetpay']['min_withdraw'];?>" 
                   max="<?php echo $user_info['bal'];?>" step="0.0000001"
                   value="<?php echo $withdraw_method['faucetpay']['min_withdraw'];?>" name="amount" required="">
            <label class="fw-bold"><?php echo ucfirst($amountName).' ('. strtoupper($selectedCoin).')';?></label>
    </div>
    
    <div class="form-floating mb-3">
        <input type="email" class="form-control" name="address" id="fpa"  
               value="<?php echo $user_info['email'];?>" required="">
            <label class="fw-bold"><?php echo ucfirst($faucetPayName).' '.ucfirst($emailName);?></label>
    </div>
    <span class="text-danger fw-bold" id="fpcheck"></span>
    
    <!-- currency -->
    <div class="form-floating mb-3">
        <select class="form-control bg-transparent" name="currency">
            <?php
            $currency = getPaymentsCurrency('faucetpay', 'withdraw');
            foreach ($currency AS $value){
                echo '<option value="'.$value['currency'].'">'. strtoupper($value['currency']).'</option>';
            }
            ?>
        </select>
        <label class="fw-bold"><?php echo ucfirst($currencyName)?></label>
    </div>
    
    <div class="input-group mb-3">
        <input type="submit" class="btn btn btn-outline-success fw-bold" value="<?php echo ucfirst($withdrawName);?>">
    </div>


</form>
<hr>
<div class="col-xl-12">
    <a class="btn bg-white fw-bold" href="https://faucetpay.io/?r=184175" target="_blank"><img src="plugins/faucetpay/assets/img/faucetpay.png" height="30px;"> >></a>
</div>

<?php
    } else {
        echo '<p class="text-danger">'.ucfirst($yourAccountbalanceIsInsufficientName.'. '.$minimumWithdrawalIsName.' <b>'.$withdraw_method['faucetpay']['min_withdraw'].' '. strtoupper($selectedCoin).'</b></p>');
}
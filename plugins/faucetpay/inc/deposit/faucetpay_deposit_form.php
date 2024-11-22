<div class="row">
    <div class="col-lg-12 border border-2 rounded p-3 mt-3 mb-3">
        <h4>
            <?php echo ucwords($depositName.' '.$usingName).' ';?><a href="https://faucetpay.io/?r=184175" target="_blank"><?php echo ucfirst($faucetPayName);?></a>
        </h4>
        <span class="text-center mt-2"><?php echo ucfirst($depositCommandName);?></span>
    </div>
</div>


<div class="row">
    <?php 
    if (isset($_GET['status'])){
        if ($_GET['status'] == 'success'){
    ?>
    <div class="col-lg-12 p-3">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong><?php echo ucfirst($paymentHasBeenSuccessfulName);?></strong>
        </div>
    </div>
    <?php
        }
        if ($_GET['status'] == 'fail'){
    ?>
    <div class="col-lg-12 p-3">
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong><?php echo ucfirst($paymentHasBeenCancelledName);?></strong>
        </div>
    </div>
    <?php } }?>
</div>
                
<div class="row">
    <div class="col-lg-12 border border-2 rounded p-3">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-default bg-white" href="https://faucetpay.io/?r=184175" target="_blank"><img src="plugins/faucetpay/assets/img/faucetpay.png" style="height: 50px;">>></a>
            </div>
        </div>
        <form class="form-horizontal" action="https://faucetpay.io/merchant/webscr" method="post">
        
        <input type="hidden" name="merchant_username" value="<?php echo $deposit_method['faucetpay']['merchant'];?>">
        
        <input type="hidden" name="item_description" value="deposit" required="">
        
        <div class="form-floating mt-3 mb-3 ">
            <input class="form-control" type="number" name="amount1" id="amount1"
                   value="<?php echo number_format($deposit_method['faucetpay']['min_deposit'], $site_info_row['truncate_currency']);?>" 
                   min="<?php echo number_format($deposit_method['faucetpay']['min_deposit'], $site_info_row['truncate_currency']);?>" 
                   step="any" required="">
            
            <label id="amountlabel"><?php echo ucfirst($enterName).' '. ucfirst($amountName);?></label>
            <label class="fw-bold text-danger d-none" id="amountErr"><?php echo ucwords($enterName.' '. ucfirst($validName).' '.$amountName);?></label> 
        </div>
        
        
        <!-- currency -->
        <div class="form-floating mb-3">
            <select class="form-control bg-transparent" name="currency1" required="">
                <?php
                $currency = getPaymentsCurrency('faucetpay', 'deposit');
                foreach ($currency AS $value){
                    echo '<option value="'.strtoupper($value['currency']).'">'. strtoupper($value['currency']).'</option>';
                }
                ?>
            </select>
            <label class="fw-bold"><?php echo ucwords($currencyName.' '.$typeName)?></label>
        </div>
        
        <!--<input type="hidden" name="currency2" value="BTC">-->
        
        <input type="hidden" name="custom" value="<?php echo $uname;?>">
        
        <input type="hidden" name="callback_url" value="<?php echo $site_info_row['site_url'].'/plugins/faucetpay/faucetpay-postback.php';?>">
        
        <input type="hidden" name="success_url" value="<?php echo $site_info_row['site_url'].'/plugins/faucetpay/faucetpay-success.php';?>">
        
        <input type="hidden" name="cancel_url" value="<?php echo $site_info_row['site_url'].'/plugins/faucetpay/faucetpay-fail.php';?>">
        
        <button  class="btn btn-outline-primary" type="submit" id="submitbtnfaucetpay"><?php echo ucfirst($depositName)?></button>
    </form>
    </div>
</div>

    

<script src="plugins/faucetpay/js/js.js"></script>
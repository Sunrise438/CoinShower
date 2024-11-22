<div class="withdraw-blade mt-4 mb-4 p-5 text-dark rounded bg-transparent bg-opacity-75 bg-gradient">
    <?php

    require __DIR__.'/assets/fp/faucetpay_fun.php';
    require __DIR__.'/assets/fun/faucetpay_fun.php';
    require __DIR__.'/inc/withdraw/faucetpay_withdraw_data.php';
    if (!checkLastWithdrawal() && $withdraw_method['faucetpay']['wid_action']){
        require __DIR__.'/inc/withdraw/faucetpay_withdraw_form.php';
    } else if($withdraw_method['faucetpay']['wid_action'] == 0) {
        echo '<span class="text-danger fw-bold">'.ucfirst($withdrawalMethodIsDisabledName).'</span>';
    } else {
        echo '<span class="text-danger fw-bold">'.ucfirst($youCanOnlyOneWthdrawName).'</span>';
    }    
    ?>
</div>



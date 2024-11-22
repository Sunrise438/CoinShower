<?php 
    if ($faucetpay_method_info['wid_action']){
?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    
        <input type="hidden" name="faucetpay_action" value="0" required="">

        <input type="submit" class="btn btn-outline-secondary btn-sm fw-bold" value="<?php echo ucfirst($disableName);?>">

    </form>
<?php
    } else {
?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    
            <input type="hidden" name="faucetpay_action" value="1" required="">

            <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($enableName);?>">

        </form>
<?php
    }
?>

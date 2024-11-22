<div class="col-xl-12">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <input type="hidden" name="faucetpayapi" value="1" required="">

        <div class="input-group mb-3 mt-3">
            <label class="input-group-text col-lg-3 fw-bold"><a href="https://faucetpay.io/?r=184175" 
                  target="_blank">faucetpay.io </a> <?php echo strtoupper($apiName).' '. ucfirst($keyName);?> : </label>
                <input type="text" name="ffpkey" value="<?php echo $faucetpay_method_info["api_key"];?>" 
                       placeholder="<?php echo ucfirst($enterName).' '. strtoupper($apiName).' '. ucfirst($keyName);?>"
                       class="form-control fw-bold" required="">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text col-lg-3 fw-bold"><a href="https://faucetpay.io/?r=184175" 
                 target="_blank">faucetpay.io </a><?php echo ucfirst($merchantName);?> : </label>
                <input type="text" name="ffpmerchant" value="<?php echo $faucetpay_method_info["merchant"];?>" 
                       placeholder="<?php echo ucfirst($enterName).' '. ucfirst($merchantName);?>"
                       class="form-control fw-bold" required="">
        </div>

        <div class="mb-3">
                <input type="submit" class="btn btn-outline-primary fw-bold" value="<?php echo ucfirst($changeName);?>">
        </div>

    </form>
</div>
<ol class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-start p-3">
        <div class="ms-2 me-auto">
            <div class="fw-bold text-secondary"><?php echo ucfirst($updateName).' '.ucfirst($faucetName).' '. ucfirst($amountName);?></div>
            <span class="badge bg-primary bg-gradient text-dark"><?php echo number_format($site_info_row['faucet_amount'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></span>                
        </div>
            
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                <div class="input-group w-75 float-end">
                    <input type="hidden" name="earnamountupdate" value="up" min="0" required="">
                    <input type="submit" class="btn btn-outline-primary btn-sm fw-bold me-3" onclick="javascript:confirmationSubmit($(this));return false;" value="<?php echo ucfirst($updateName);?>">
                </div>

            </form>

    </li>
</ol>

<script>
    
    function confirmationSubmit(anchor)
    {
       var conf = confirm('Are you sure want to do this?');
       if(conf)
           form.submit();
    }
</script>
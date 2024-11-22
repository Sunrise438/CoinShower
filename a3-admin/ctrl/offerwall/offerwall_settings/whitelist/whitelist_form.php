<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <div class="input-group">
        <input type="hidden" name="offerwall" value="<?php echo $row['offerwall_name'];?>" required="">
        <input class="form-control" type="text" name="whitelist" value="<?php echo $row['ip_whitelist'];?>" 
               placeholder="<?php echo 'IP '. ucfirst($whitelistingName).' ('. ucfirst($optionalName).')';?>" required="">
        <button class="btn btn-outline-primary" type="submit"><?php echo ucfirst($saveName);?></button>
    </div>
    <span class="text-secondary"><?php echo ucfirst($whitelistInfoName)?></span>
</form>
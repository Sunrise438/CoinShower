<form method="post" id="dbup" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <div class="input-group mt-3 mb-3">
        <input type="hidden" class="form-control" name="fdbup" id="fdbup" value="dbup"
               placeholder="<?php echo ucfirst($enterName).' '. ucfirst($siteNameName).' '. ucfirst($keyName)?>"required="">
        <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" onclick="javascript:confirmationSubmit($(this));return false;" value="<?php echo ucfirst($backupName).' '. ucfirst($databaseName);?>">
    </div>

</form>

<!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <div class="input-group mt-3 mb-3">
        <input type="hidden" name="d" value="d" required="">
        <input type="hidden" class="form-control" name="fdbup" value="dbup"
               placeholder="<?php echo ucfirst($enterName).' '. ucfirst($siteNameName).' '. ucfirst($keyName)?>"required="">
        <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" 
               value="<?php echo ucfirst($backupName).' '. ucfirst($databaseName).' '.$andName.' '.$downloadName;?>">
    </div>

</form> -->
<hr>
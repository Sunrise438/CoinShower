<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <div class="input-group w-75 float-end">
        <input type="hidden" name="surfpriceupdate" value="up" required="">
        <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($updateName);?>">
    </div>

</form>

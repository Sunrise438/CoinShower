<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <div class="input-group w-75 float-end">
        <input type="number" class="form-control" name="surfpricepersecond" value="<?php echo number_format($site_info_row['surf_price_per_second'],8);?>" min="0" step="0.000000001" required="">
        <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($changeName);?>">
    </div>

</form>
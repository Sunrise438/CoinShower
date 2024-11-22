<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <!-- index select input -->
    <div class="input-group mb-3">
        <input type="text" class="form-control fw-bold" name="fsitename" value="<?php echo $site_info_row['site_name'];?>" required="">    
        <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($changeName);?>">
    </div>

</form>
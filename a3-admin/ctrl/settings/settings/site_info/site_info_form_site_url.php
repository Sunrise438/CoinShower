<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <!-- index select input -->
    <div class="input-group mb-3">
        <input type="url" class="form-control fw-bold" name="fsiteurl" value="<?php echo $site_info_row['site_url'];?>" required="">    
        <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($changeName);?>">
    </div>

</form>
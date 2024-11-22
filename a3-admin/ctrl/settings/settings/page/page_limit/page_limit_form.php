<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <!-- index select input -->
    <div class="input-group mb-3">
        <input class="form-control" type="number" name="pagelimit" value="<?php echo $site_info_row['page_limit'];?>" 
               required="" step="1" min="1">   
            <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" 
                   value="<?php echo ucfirst($changeName);?>">
    </div>


</form>
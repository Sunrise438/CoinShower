<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">

    <!-- index select input -->
    <div class="input-group mb-3">
        <input type="hidden" value="1" name="upfavicon" required="">
        
        <input class="form-control" type="file" name="ffavicon" accept=".ico" required="">
             
        <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($changeName);?>">
    </div>


</form>
<div class="">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">

    <!-- index select input -->
    <div class="input-group mb-3">
        <input type="hidden" value="1" name="uplogo" required="">
        
        <input class="form-control" type="file" name="flogo" accept=".png" required="">
             
        <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($changeName);?>">
    </div>


</form>

<?php 
    if ($site_info_row['logo_action']){
?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    
        <input type="hidden" name="logo" value="0" required="">

        <input type="submit" class="btn btn-outline-secondary btn-sm fw-bold" value="<?php echo ucfirst($disableName);?>">

    </form>
<?php
    } else {
?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    
            <input type="hidden" name="logo" value="1" required="">

            <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($enableName);?>">

        </form>
<?php
    }
?>
</div>
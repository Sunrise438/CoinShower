<?php
$myfile = fopen("../libs/code/bottom_code.php", "r");
if (filesize("../libs/code/bottom_code.php") != FALSE){
    $bottom_code = fread($myfile,filesize("../libs/code/bottom_code.php"));
} else {
    $bottom_code = '';
}

fclose($myfile);
?>
<div class="row">
    <div class="col-xl-12">
        
        <div class="row">
            <div class="col-xl-12 mb-3">
                <h3 class="fw-blod"><?php echo ucfirst($codeName);?></h3>
                <b><xmp><?php echo $bottom_code;?></xmp>   </b>   
            </div>
        </div>
        <hr>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">

        <div class="mt-3 mb-3" id="topads">
            <h3 class="form-label fw-blod"><?php echo ucfirst($enterName).' '.ucfirst($bottomName).' '. ucfirst($codeName).' '. ucfirst($hereName);?></h3>
            <textarea name="bottomcode" class="form-control"  rows="6"><?php echo $bottom_code;?></textarea>
        </div>
            
            <div class="input-group mb-3">
            <input type="submit" class="btn btn-outline-primary fw-bold" value="<?php echo ucfirst($changeName);?>">
        </div>
            
        </form>
        
    </div>
</div>

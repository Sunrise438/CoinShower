<?php
$myfile = fopen("../libs/code/left_code.php", "r");
if (filesize("../libs/code/left_code.php") != FALSE){
    $left_code = fread($myfile,filesize("../libs/code/left_code.php"));
} else {
    $left_code = '';
}
fclose($myfile);
?>
<div class="row">
    <div class="col-lg-12">
        
        <div class="row">
            <div class="col-xl-12 mb-3">
                <h3 class="fw-blod"><?php echo ucfirst($codeName);?></h3>
                <b><xmp><?php echo $left_code;?></xmp>   </b>   
            </div>
        </div>
        <hr>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">

        <div class="mt-3 mb-3">
            <h3 class="form-label fw-blod"><?php echo ucfirst($enterName).' '.ucfirst($leftName).' '. ucfirst($codeName).' '. ucfirst($hereName);?></h3>
            <textarea name="leftcode" class="form-control"  rows="6"><?php echo $left_code;?></textarea>
        </div>
        
        <div class="input-group mb-3">
            <input type="submit" class="btn btn-outline-primary fw-bold" value="<?php echo ucfirst($changeName);?>">
        </div>
            
        </form>
    </div>
</div>
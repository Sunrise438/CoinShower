<?php
//open top ads code
$myfile = fopen("../libs/code/top_code.php", "r");
if (filesize("../libs/code/top_code.php") != FALSE){
    $top_code = fread($myfile,filesize("../libs/code/top_code.php"));
} else {
    $top_code = '';
}

fclose($myfile);
?>
<div class="row">
    <div class="col-xl-12">
        
        <div class="row">
            <div class="col-xl-12 mb-3">
                <h3 class="fw-blod"><?php echo ucfirst($codeName);?></h3>
                <b><xmp><?php echo $top_code;?></xmp>   </b>   
            </div>
        </div>
        <hr>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">

            <div class="mt-3 mb-3">
                <h3 class="form-label fw-blod"><?php echo ucfirst($enterName).' '.ucfirst($topName).' '. ucfirst($codeName).' '. ucfirst($hereName);?></h3>
                <textarea name="topcode" class="form-control"  rows="6"><?php echo $top_code;?></textarea>
            </div>
            
            <div class="input-group mb-3">
                <input type="submit" class="btn btn-outline-primary fw-bold" value="<?php echo ucfirst($changeName);?>">
            </div>
        </form>
    </div>
</div>
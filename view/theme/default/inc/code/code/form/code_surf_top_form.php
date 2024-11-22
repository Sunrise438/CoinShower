<?php
$my_code_file = "../view/theme/$themeAction/inc/code/code_surf_top.php";
$myfile = fopen($my_code_file, "r");
if (filesize($my_code_file) != FALSE){
    $code= fread($myfile,filesize($my_code_file));
} else {
    $code = '';
}

fclose($myfile);
?>
<div class="row">
    <div class="col-xl-12">
        
        <div class="row">
            <div class="col-xl-12 mb-3">
                <h3><?php echo ucfirst($codeName);?></h3>
                <b><xmp><?php echo $code;?></xmp>   </b>   
            </div>
        </div>
        <hr>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?settings=default';?>" enctype="multipart/form-data">

            <input type="hidden" name="file" value="<?php echo $my_code_file;?>" required="">
            
            <div class="mt-3 mb-3">
                <h3 class="form-label fw-blod"><?php echo ucfirst($enterName).' '.ucfirst($surfName).' '.ucfirst($topName).' '. ucfirst($codeName).' '. ucfirst($hereName);?></h3>
                <textarea name="code" class="form-control"  rows="6"><?php echo $code;?></textarea>
            </div>
            
            <div class="input-group mb-3">
                <input type="submit" class="btn btn-outline-primary fw-bold" value="<?php echo ucfirst($changeName);?>">
            </div>
        </form>
    </div>
</div>

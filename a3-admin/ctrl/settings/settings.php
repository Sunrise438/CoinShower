<?php
require 'data.php';
?>
<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
    <!-- website name input -->
    <div class="form-group">
    <label class="control-label col-sm-2">Website Name : </label>
    <div class="col-sm-8">
        <input class="form-control" type="text" name="websiteName" placeholder="Enter website name" value="<?php echo $row['sitename'];?>" required="">
    <span class="error" style="color: red;"><?php echo $siteNameErr;?></span>
        <br><br>
    </div>
    </div>
    
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
    <input class="btn btn-default" type="submit" value="Change" name="submit">
    </div>
    </div>
</form>


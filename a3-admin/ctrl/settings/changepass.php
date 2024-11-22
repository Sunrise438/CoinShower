<?php
require 'config/config.php';
require 'changepass_data.php';
?>

<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
    <!-- current password input -->
    <div class="form-group">
    <label class="control-label col-sm-2">Current Password : </label>
    <div class="col-sm-8">
        <input class="form-control" type="password" name="cpass" placeholder="Enter Current Password" required="">
    <span class="error" style="color: red;"><?php echo $cpassErr;?></span>
        <br><br>
    </div>
    </div>
    
    <!-- current password input -->
    <div class="form-group">
    <label class="control-label col-sm-2">New Password : </label>
    <div class="col-sm-8">
        <input class="form-control" type="password" name="npass" placeholder="Enter New Password" required="">
    <span class="error" style="color: red;"><?php echo $npassErr;?></span>
        <br><br>
    </div>
    </div>
    
    <!-- current password input -->
    <div class="form-group">
    <label class="control-label col-sm-2">Confirm New Password : </label>
    <div class="col-sm-8">
        <input class="form-control" type="password" name="ncpass" placeholder="Enter Confirm Password" required="">
    <span class="error" style="color: red;"><?php echo $ncpassErr;?></span>
        <br><br>
    </div>
    </div>
    
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
    <input class="btn btn-default" type="submit" value="Add Site" name="submit">
    </div>
    </div>
</form>


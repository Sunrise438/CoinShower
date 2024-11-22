<div class="admin-login-form-blade">
    <div class="row">
    <div class="col-xl-12">
        <h2><?php echo ucwords($resetPasswordName)?></h2>
            <p class="text-justify"><?php echo ucfirst($resetPasswordInfoName);?></p>
        <span class="text-danger fw-bold"><?php if(isset($FdataErr)){ echo $FdataErr;};?></span>
        <?php
        if (isset($data)){
            echo '<div class="alert alert-success fw-bold">';
            echo ucfirst($data);
            echo '</div>';
        }
        ?>
    </div>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            
            <!-- email -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text fw-bold" id="basic-addon1">
                    <i class="material-icons">account_circle</i></span>
                <div class="form-floating">
                <input type="email" name="resetpass" class="form-control text-white bg-transparent fw-bold" value="<?php if(isset($_POST['uname'])){        echo $_POST['uname'];};?>"
                       placeholder="<?php echo ucwords($emailName);?>" required="">  
                <label for="email"><?php echo ucwords($emailName);?></label>
                </div>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($unameErr)){ echo $unameErr;};?></span>
            
            
            
            
            <div class="mb-3">
                <div class="col-xl-offset-3 col-xl-8">
                    <input type="submit" class="btn btn-outline-success fw-bold" value="<?php echo ucwords($resetPasswordName);?>">
                </div>
            </div>
        </form>
        
        <div class="col-xl-12">
            <div class="d-flex">
                <div class="p-2 bg-transparent flex-fill"></div>
                <div class="p-2 bg-transparent text-end flex-fill"><a class="link-primary fw-bold" href="index"><?php echo ucfirst($loginName);?></a></div>
            </div>
        </div>
    </div>
</div>
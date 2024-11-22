<div class="login-blade mt-4 p-5 bg-opacity-50 bg-gradient text-dark rounded mt-4 mb-4 border">
    <div class="row">
    <div class="col-lg-offset-3 col-lg-9">
        <h2><?php echo ucfirst($loginName)?></h2>
        <span class="text-danger fw-bold"><?php if(isset($FdataErr)){ echo $FdataErr;};?></span>
    </div>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        
            <!-- username or email -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text fw-bold bg-transparent" id="basic-addon1">
                    <i class="material-icons">account_circle</i></span>
                <div class="form-floating">
                <input type="text" name="uname" class="form-control bg-transparent fw-bold" value="<?php if(isset($_POST['uname'])){        echo $_POST['uname'];};?>"
                       placeholder="<?php echo ucwords($userNameName.' / '.$emailName);?>" required="">  
                <label for="email"><?php echo ucwords($userNameName.' / '.$emailName);?></label>
                </div>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($unameErr)){ echo $unameErr;};?></span>
            
            <!-- password -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fw-bold" id="basic-addon1"><span class="material-icons">lock</span></span>
                <div class="form-floating">
                <input type="password" name="pass" class="form-control bg-transparent fw-bold" value=""
                       placeholder="<?php echo ucfirst($passwordName);?>" required=""> 
                <label for="email"><?php echo ucfirst($passwordName);?></label>
                </div>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($passErr)){ echo $passErr;};?></span>
            
            <!-- remember me -->
            <div class="form-check mb-3">
                <div class="col-lg-offset-3 col-lg-8">
                    <input class="form-check-input" type="checkbox" name="reme" value="1">
                    <label class="form-check-label fw-bold"><?php echo ucfirst($rememberMeName);?></label>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="col-lg-offset-3 col-lg-8">
                    <input type="submit" class="btn btn-outline-success fw-bold" value="<?php echo ucfirst($loginName);?>">
                </div>
            </div>
        </form>
        
        <div class="col-lg-12">
            <div class="d-flex">
                <div class="p-2 bg-transparent flex-fill"><a class="link-primary fw-bold" href="resetpass"><?php echo ucfirst($resetPasswordName);?></a></div>
                <div class="p-2 bg-transparent text-end flex-fill"><a class="link-primary fw-bold" href="register"><?php echo ucfirst($registerName);?></a></div>
            </div>
            <div class="d-flex">
                <div class="p-2 bg-transparent flex-fill"><a class="link-secondary fw-bold" href="aya"><?php echo ucfirst($activateYourAccountName);?></a></div>
            </div>
        </div>
    </div>
</div>
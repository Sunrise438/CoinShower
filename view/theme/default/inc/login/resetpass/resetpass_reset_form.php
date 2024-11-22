<div class="login-blade mt-4 p-5 bg-opacity-50 bg-gradient text-dark rounded mt-4 mb-4 border">
    <div class="row">
    <div class="col-lg-12">
        <h2><?php echo ucwords($changeName.' '.$passwordName)?></h2>
            <p class="text-justify"><?php echo ucfirst($newPassWordInfoName);?></p>
        <span class="text-danger fw-bold"><?php if(isset($FdataErr)){ echo $FdataErr;};?></span>
    </div>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            
            <input type="hidden" name="token" value="<?php if(isset($_GET['token'])){ echo $_GET['token'];}?>" required="">
            <input type="hidden" name="user" value="<?php if(isset($_GET['user'])){ echo $_GET['user'];}?>" required="">
            
           <!-- new password -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fw-bold" id="basic-addon1"><span class="material-icons">lock</span></span>
                <div class="form-floating">
                    <input type="password" name="npass" id="npass" class="form-control bg-transparent fw-bold" value=""
                       placeholder="<?php echo ucfirst($newName.' '.$passwordName);?>" required="" autocomplete="off"> 
                <label><?php echo ucfirst($newName.' '.$passwordName);?></label>
                </div>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($passErr)){ echo $passErr;};?></span>
            <span class="text-danger fw-bold d-none" id="npassErrValid"><?php echo ucfirst($passwordMustCharactersName);?></span>
            
            <!-- new confirm password -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fw-bold" id="basic-addon1"><span class="material-icons">lock</span></span>
                <div class="form-floating">
                    <input type="password" name="ncpass" id="ncpass" class="form-control bg-transparent fw-bold" value=""
                       placeholder="<?php echo ucfirst($confirmName.' '.$newName.' '.$passwordName);?>" required="" autocomplete="off"> 
                <label><?php echo ucwords($confirmName.' '.$newName.' '.$passwordName);?></label>
                </div>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($passErr)){ echo $passErr;};?></span>
            <span class="text-danger fw-bold d-none" id="ncpassErrValid"><?php echo ucfirst($passwordAndConfirmPasswordDoesNotMatchName);?></span>
            
            <div class="mb-3">
                <div class="col-lg-offset-3 col-lg-8">
                    <input type="submit" class="btn btn-outline-success fw-bold" id="btnresetpass"
                           value="<?php echo ucwords($resetPasswordName);?>">
                </div>
            </div>
        </form>
        
        <div class="col-lg-12">
            <div class="d-flex">
                <div class="p-2 bg-transparent flex-fill"></div>
                <div class="p-2 bg-transparent text-end flex-fill"><a class="link-primary fw-bold" href="login"><?php echo ucfirst($loginName);?></a></div>
            </div>
        </div>
    </div>
</div>
<script <script src="js/resetpass.js"></script>></script>
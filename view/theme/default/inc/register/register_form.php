<div class="register-blade rounded p-3 mt-4 mb-4 border">
    <div class="row">
    <div class="col-lg-offset-3 col-lg-9">
        <h2><?php echo ucfirst($createYourAccountName)?></h2>
        <span class="text-danger fw-bold"><?php if(isset($FdataErr)){ echo $FdataErr;};?></span>
    </div>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        
            <!-- username -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text fw-bold bg-transparent" id="basic-addon1">
                    <i class="material-icons">account_circle</i></span>
                <div class="form-floating">
                    <input type="text" name="uname" id="uname" class="form-control bg-transparent fw-bold" 
                       value="<?php if(isset($_POST['uname'])){ echo $_POST['uname'];};?>"
                       placeholder="<?php echo ucwords($userNameName);?>" required="">  
                <label for="email"><?php echo ucwords($userNameName);?></label>
                </div>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($unameErr)){ echo $unameErr;};?></span>
            <span class="text-danger fw-bold d-none" id="unameErrValid"><?php echo ucfirst($usernameMustBeAtLeastName);?></span>
            
            <!-- email -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text fw-bold bg-transparent" id="basic-addon1">
                    <i class="material-icons">alternate_email</i></span>
                <div class="form-floating">
                    <input type="email" name="email" id="email" class="form-control bg-transparent fw-bold" 
                       value="<?php if(isset($_POST['email'])){ echo $_POST['email'];};?>"
                       placeholder="<?php echo ucwords($emailName);?>" required="">  
                <label for="email"><?php echo ucwords($emailName);?></label>
                </div>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($emailErr)){ echo $emailErr;};?></span>
            <span class="text-danger fw-bold d-none" id="emailErrValid"><?php echo ucfirst($enterName.' '.$validName.' '.$emailName);?></span>
            
            <!-- password -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fw-bold" id="basic-addon1"><span class="material-icons">lock</span></span>
                <div class="form-floating">
                    <input type="password" name="pass" id="pass" class="form-control bg-transparent fw-bold" value=""
                       placeholder="<?php echo ucfirst($passwordName);?>" required=""> 
                <label for="email"><?php echo ucfirst($passwordName);?></label>
                </div>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($passErr)){ echo $passErr;};?></span>
            <span class="text-danger fw-bold d-none" id="passErrValid"><?php echo ucfirst($passwordMustCharactersName);?></span>
            
            <!-- confirm password -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fw-bold" id="basic-addon1"><span class="material-icons">lock</span></span>
                <div class="form-floating">
                    <input type="password" name="cpass" id="cpass" class="form-control bg-transparent fw-bold" value=""
                       placeholder="<?php echo ucfirst($confirmName.' '.$passwordName);?>" required=""> 
                <label for="email"><?php echo ucwords($confirmName.' '.$passwordName);?></label>
                </div>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($passErr)){ echo $passErr;};?></span>
            <span class="text-danger fw-bold d-none" id="cpassErrValid"><?php echo ucfirst($passwordAndConfirmPasswordDoesNotMatchName);?></span>
            
            <!-- agreements-->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="tos" required="">
                <label class="form-check-label fw-bold"><?php echo ucfirst($iAgreeToName);?></label>
            </div>
            
            <div class="mb-3">
                <div class="col-lg-offset-3 col-lg-8">
                    <input type="submit" class="btn btn-outline-success fw-bold" id="btnregister" value="<?php echo ucfirst($registerName);?>">
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

<script <script src="view/theme/<?php echo $themeAction;?>/js/register.js"></script>></script>
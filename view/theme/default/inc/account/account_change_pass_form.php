<div class="login-blade mt-4 p-5 bg-opacity-50 bg-gradient text-dark rounded mt-4 mb-4 border">
    <div class="row">
    <div class="col-lg-12">
        <h2><?php echo ucwords($changeName.' '.$passwordName)?></h2>
        <span class="text-danger fw-bold mt-3 mb-3"><?php if(isset($dataErr)){ echo $dataErr;};?></span>
    </div>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            
            <input type="hidden" name="changepass" value="1" required="">
            
            <!-- current password -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fw-bold" id="basic-addon1"><span class="material-icons">lock</span></span>
                <div class="form-floating">
                    <input type="password" name="cpass" id="cpass" class="form-control bg-transparent fw-bold" value=""
                       placeholder="<?php echo ucwords($currentName.' '.$passwordName);?>" required="" autocomplete="off"> 
                <label><?php echo ucwords($currentName.' '.$passwordName);?></label>
                </div>
            </div>            
                        
            <!-- new password -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fw-bold" id="basic-addon1"><span class="material-icons">lock</span></span>
                <div class="form-floating">
                    <input type="password" name="npass" id="npass" class="form-control bg-transparent fw-bold" value=""
                       placeholder="<?php echo ucwords($newName.' '.$passwordName);?>" required="" autocomplete="off"> 
                <label><?php echo ucwords($newName.' '.$passwordName);?></label>
                </div>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($passErr)){ echo $passErr;};?></span>
            <span class="text-danger fw-bold d-none" id="npassErrValid"><?php echo ucfirst($passwordMustCharactersName);?></span>
            
            <!-- new confirm password -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fw-bold" id="basic-addon1"><span class="material-icons">lock</span></span>
                <div class="form-floating">
                    <input type="password" name="ncpass" id="ncpass" class="form-control bg-transparent fw-bold" value=""
                       placeholder="<?php echo ucwords($confirmName.' '.$newName.' '.$passwordName);?>" required="" autocomplete="off"> 
                <label><?php echo ucwords($confirmName.' '.$newName.' '.$passwordName);?></label>
                </div>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($passErr)){ echo $passErr;};?></span>
            <span class="text-danger fw-bold d-none" id="ncpassErrValid"><?php echo ucfirst($passwordAndConfirmPasswordDoesNotMatchName);?></span>
            
            <div class="mb-3">
                <div class="col-lg-offset-3 col-lg-8">
                    <input type="submit" class="btn btn-outline-primary fw-bold" id="btnchangepass"
                           value="<?php echo ucwords($changeName.' '.$passwordName);?>">
                </div>
            </div>
        </form>
        
    </div>
</div>
<script <script src="js/changepass.js"></script>></script>
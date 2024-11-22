<div class="login-blade mt-4 p-5 bg-opacity-50 bg-gradient text-dark rounded mt-4 mb-4 border">
    <div class="row">
    <div class="col-lg-12">
        <h2><?php echo ucwords($changeName.' '.$userNameName)?></h2>
        <?php
        echo '<div class="alert alert-warning ">';
        echo '<strong>'.ucfirst($unameChangeInfoName).'!</strong>';
        echo '</div>';
        ?>
        <span class="text-danger fw-bold mt-3 mb-3"><?php if(isset($dataErr)){ echo $dataErr;};?></span>
    </div>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            
            <input type="hidden" name="changeuname" value="1" required="">
            
            <!-- email -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text fw-bold bg-transparent" id="basic-addon1">
                    <i class="material-icons">account_circle</i></span>
                <div class="form-floating">
                    <div class="form-control bg-transparent fw-bold" >
                        <?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];};?>
                    </div>  
                <label for="email"><?php echo ucwords($emailName);?></label>
                </div>
            </div>
            
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
            
            <!-- current password -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fw-bold" id="basic-addon1"><span class="material-icons">lock</span></span>
                <div class="form-floating">
                    <input type="password" name="cpass" id="cpass" class="form-control bg-transparent fw-bold" value=""
                           placeholder="<?php echo ucwords($currentName.' '.$passwordName);?>" required="" autocomplete="off"> 
                <label><?php echo ucwords($currentName.' '.$passwordName);?></label>
                </div>
            </div> 

            <div class="mb-3">
                <div class="col-lg-offset-3 col-lg-8">
                    <input type="submit" class="btn btn-outline-primary fw-bold" id="btnchangeunames"
                           value="<?php echo ucwords($changeName.' '.$userNameName);?>">
                </div>
            </div>
        </form>
        
    </div>
</div>
<script <script src="js/changeuname.js"></script>></script>
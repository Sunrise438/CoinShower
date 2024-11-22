<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        
    <div class="col-lg-offset-3 col-lg-9">
    </div>
        
        <form method="post"
              action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        
        <?php //username or email?>
            <div class="mb-3 input-group">
                <span class="input-group-text fw-bold"><i class="bi bi-person-square"></i></span>
                <input type="email" name="email" class="form-control fw-bold" value="<?php if (isset($Funame)){ echo $Funame;}?>"
                       placeholder="<?php echo ucfirst($enterName).' '. ucfirst($emailName);?>" required="">
            </div>
            <div class="text-danger fw-bold"><?php if (isset($funameErr)){ echo ucfirst($funameErr);}?></div>
            
        <?php //password?>
            <div class="mb-3 input-group">
                <span class="input-group-text fw-bold"><i class="bi bi-file-lock2"></i></span>
                <input type="password" name="pass" class="form-control fw-bold" value=""
                       placeholder="<?php echo ucfirst($enterName).' '. ucfirst($passwordName);?>" required="">
            </div>
            <div class="text-danger fw-bold"><?php if (isset($fpassErr)){ echo ucfirst($fpassErr);}?></div>
            
            <div class="mb-3">
                <input type="submit" class="btn btn-outline-success fw-bold" value="<?php echo ucfirst($loginName);;?>">
            </div>
        </form>
        
        <div class="col-lg-12">
            <div class="d-flex">
                <div class="p-2 bg-transparent flex-fill"><a class="link-primary fw-bold" href="resetpass"><?php echo ucwords($resetPasswordName);?></a></div>
            </div>
            <div class="d-flex">
            </div>
        </div>
        
        </div>
    <div class="col-lg-2"></div>
</div>


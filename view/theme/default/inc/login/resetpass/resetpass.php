<!-- reset password -->
<div class="container-fluid">   
    <div class="row">
        <div class="col-xl-3"><?php require_once requireLeftCode();?></div>
        <div class="col-lg-6">
            <?php
            require 'ctrl/login/resetpass/resetpass.php';
            if (isset($_GET['token']) && isset($_GET['user'])){
                $token = test_input($_GET['token']);
                $email = test_input($_GET['user']);
                if(getResetPassTokenStatus($email, $token)){
                    require __DIR__.'/resetpass_reset_form.php';
                } else {
                    require __DIR__.'/resetpass_error_blade.php';
                }
            } else {
                require __DIR__.'/resetpass_form.php';
            }
            ?>
        </div>
        <div class="col-xl-3"><?php require_once requireRightCode();?></div>
    </div>
</div>
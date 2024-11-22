<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="col-lg-12">
                <div class="mt-5 mb-5 p-5 bg-dark bg-gradient text-white fw-bold rounded">
                    <h1 class="text-center"><i class="bi bi-gear"></i> <?php echo ucfirst($adminName);?></h1>
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
            </div> 
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
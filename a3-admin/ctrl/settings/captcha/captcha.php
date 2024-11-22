<!-- captcha -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($captchaName);?></h1>
            <?php
            require 'libs/captcha/captcha.php';
            require 'captcha_fun/captcha_fun.php';
            require 'recaptcha/recaptcha_info.php';
            require 'turnstile/turnstile_info.php';
            ?>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3"><?php require_once requireLeftCode();?></div>
        <div class="col-xl-6">
            <?php 
            require 'ctrl/login/login.php';
            require __DIR__.'/login_form.php'
            ?>
        </div>
        <div class="col-xl-3"><?php require_once requireRightCode();?></div>
    </div>
</div>
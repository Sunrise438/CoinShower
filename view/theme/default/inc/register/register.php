<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3"><?php require_once requireLeftCode();?></div>
        <div class="col-lg-6">
            <?php 
            require 'ctrl/register/register.php';
            require __DIR__.'/register_form.php';
            ?>
        </div>
        <div class="col-lg-3"><?php require_once requireRightCode();?></div>
    </div>
</div>
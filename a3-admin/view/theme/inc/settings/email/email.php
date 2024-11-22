<!-- admin dashboard email -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-xl-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-xl-10">
            <h1 class=" fw-bold"><?php echo ucwords($mailName.' '.$settingsName);?></h1>
            <?php
                require 'ctrl/settings/email/email.php';
                require __DIR__.'/email_blade.php';
                require __DIR__.'/email_form.php';
            ?>
        </div>
    </div>
</div>
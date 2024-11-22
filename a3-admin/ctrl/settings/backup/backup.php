<!-- admin dashboard table -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($backupName).' '. ucfirst($databaseName);?></h1>
            <?php  
                require 'backup_form.php';
                require 'backup_info.php';
            ?>
        </div>
    </div>
</div>

<script src="ctrl/settings/backup/js/js.js"></script>

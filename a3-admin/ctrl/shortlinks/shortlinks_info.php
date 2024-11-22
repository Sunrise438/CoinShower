<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
            <?php require 'view/theme/side_menu.php';?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center"><b><?php echo ucfirst($userName).' '. ucfirst($shortLinksName).' '. ucfirst($historyName);?></b></h1>
            <?php require 'shortlinks_info_table.php';?>
        </div>
    </div>
</div>
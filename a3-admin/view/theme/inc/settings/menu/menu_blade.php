<div class="row">
    <div class="col-xl-6">
        <h4 class="mb-3"><?php echo ucfirst($menuName).' '. ucfirst($itemName);?></h4>
        <ul class="list-group p-3">
            <?php 
            require __DIR__.'/menu_list_blade.php';
            require __DIR__.'/change/change_form_modal.php';
            require __DIR__.'/new/new_form_modal.php';
            ?>
        </ul>
        
    </div>
    
    <div class="col-xl-6">
        <div class="row">
            <div class="col-xl-12 mt-3 mb-3">
                <h4 class="mb-3"><?php echo ucwords($mainName.' '. $menuName);?></h4>
                <?php require __DIR__.'/list/main_menu_list.php';?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 mt-3 mb-3">
                <h4 class="mb-3"><?php echo ucwords($sideName.' '. $menuName);?></h4>
                <?php require __DIR__.'/list/side_menu_list.php';?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 mt-3 mb-3">
                <h4 class="mb-3"><?php echo ucwords($userName.' '. $menuName);?></h4>
                <?php require __DIR__.'/list/user_menu_list.php';?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 mt-3 mb-3">
                <h4 class="mb-3"><?php echo ucwords($footerName.' '. $menuName);?></h4>
                <?php require __DIR__.'/list/footer_menu_list.php';?>
            </div>
        </div>
                
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <ul class="list-group list-group-flush">
            <li class="list-group-item border-0">
                <i class="bi bi-square bg-dark bg-gradient bg-opacity-75"></i><?php echo ucwords(' '.$defaultName.' '.$menuName.' '.$itemName)?>
            </li>
            <li class="list-group-item border-0">
                <i class="bi bi-square bg-primary bg-gradient bg-opacity-75"></i><?php echo ucwords(' '.$parentName.' '.$menuName.' '.$itemName)?>
            </li>
            <li class="list-group-item border-0">
                <i class="bi bi-square bg-primary bg-gradient bg-opacity-50"></i><?php echo ucwords(' '.$childName.' '.$menuName.' '.$itemName)?>
            </li>
        </ul>
    </div>
</div>

<script src="js/settings/menu/menu.js"></script>
<!-- admin dashboard table -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($usersName).' '. ucfirst($infoName);?></h1>
            <?php
                require requireUserInfo();
                require 'users_info_data.php';
                require 'users_info_form.php';
            
                if (isset($_GET['token'])){
                    
                    if ($ok == 1){
                        require 'users_info_layout.php';
                    }
                    
                }
                
            ?>
        </div>
    </div>
</div>
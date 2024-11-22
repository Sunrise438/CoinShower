<!-- surf -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($surfName);?></h1>
            <?php
                //surf history
                if (isset($_GET['t'])){
                    if ($_GET['t'] == 'clear'){
                        require 'clear/clear.php';
                    } else {
                        require 'libs/fun/surf/surf_info.php';
                        require 'surf_history_data.php';
                    }
                    
                } else {
                    require 'libs/fun/surf/surf_info.php';
                    require 'surf_history_data.php';
                }
                
            ?>
        </div>
    </div>
</div>
<!-- withdraw -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($depositName);?></h1>
            <?php
                
                if (isset($_GET['t'])){
                    if ($_GET['t'] == 'deposit' || $_GET['t'] == 'history' || $_GET['t'] == 'user'){
                        if ($_GET['t'] != 'user'){
                            require 'deposit_info/deposit_info.php';
                        }
                        require 'deposit_table_data.php';

                    }elseif ($_GET['t'] == 'statistics'){
                        require 'deposit_info/deposit_info.php';
                        require 'statistics/statistics.php';
                    }


                } else {
                    header('location:deposit?t=deposit');
                }
                                    
            ?>
        </div>
    </div>
</div>

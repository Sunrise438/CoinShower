<!-- withdraw -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($withdrawName);?></h1>
            <?php
                //check action
                require 'libs/api_key_list.php';
                require requireUserInfo();
                require requireSiteInfoFun();
                
                if (isset($_GET['a']) && isset($_GET['token'])){
                    $token = test_input(base64_decode($_GET['token']));
                    $token = (int)$token;
                    require __DIR__.'/action/action.php';
                    $payments_info = withdrawInfo($token);

                    if ($_GET['a'] == 'approve'){
                        require __DIR__.'/action/approve.php';
                    }elseif ($_GET['a'] == 'cancel'){
                        require __DIR__.'/action/cancel.php';
                    }elseif ($_GET['a'] == 'reject'){
                        require __DIR__.'/action/reject.php';
                    } else {
                        header('location:withdraw?t=withdraw');
                    }
                } else {
                    if (isset($_GET['t'])){
                        if ($_GET['t'] == 'withdraw' || $_GET['t'] == 'history' || $_GET['t'] == 'user'){
                            require __DIR__.'/withdraw_info/withdraw_info.php';
                            require __DIR__.'/withdraw_table_data.php';
                            
                        }elseif ($_GET['t'] == 'statistics'){
                            require __DIR__.'/withdraw_info/withdraw_info.php';
                            require __DIR__.'/statistics/statistics.php';
                        }
                        
                        
                    } else {
                        header('location:withdraw?t=withdraw');
                    }
                    
                }
                
            ?>
        </div>
    </div>
</div>

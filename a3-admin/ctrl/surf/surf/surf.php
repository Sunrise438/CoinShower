<!-- surf -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($surfName);?></h1>
            <?php
                //check action
                require 'libs/fun/surf/surf_info.php';
                require 'libs/fun/user/user_info.php';
                if (isset($_GET['a']) && isset($_GET['token'])){
                    $token = test_input(base64_decode($_GET['token']));
                    $token = (int)$token;
                    require 'action/action.php';
                    $surf_info = surfInfoById($token);
                    $surf_id = $surf_info['id'];

                    if ($_GET['a'] == 'approve'){
                        require 'action/approve.php';
                    }elseif ($_GET['a'] == 'reject'){
                        require 'action/reject.php';
                    }elseif ($_GET['a'] == 'pause'){
                        require 'action/pause.php';
                    }elseif ($_GET['a'] == 'play') {
                        require 'action/play.php';
                    }elseif ($_GET['a'] == 'delete') {
                        require 'action/delete.php';
                    }elseif ($_GET['a'] == 'edit') {
                        require 'action/delete.php';
                    } else {
                        header('location:surf');
                    }
                } else {
                    if (isset($_GET['t'])){
                        require 'surf_table_data.php';
                    } else {
                        require 'surf_info/surf_info.php';
                    }
                    
                }
                
            ?>
        </div>
    </div>
</div>
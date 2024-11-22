<!-- admin user ban list table -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($bannedName).' '. ucfirst($listName);?></h1>
            <?php
                require 'banned_table.php';
                //check action
                if (isset($_GET['q']) && isset($_GET['token'])){
                    $token = htmlspecialchars(strip_tags(trim($_GET['token'])));
                    $token = (int)$token;
                    require 'fun/user/user_ban.php';
                    require 'action/action.php';
                    if ($_GET['q'] == 'ban'){
                        require 'action/ban.php';
                    }elseif ($_GET['q'] == 'delete') {
                        require 'action/delete.php';
                    } else {
                        header('location:banned_list');
                    }
                }
            ?>
        </div>
    </div>
</div>
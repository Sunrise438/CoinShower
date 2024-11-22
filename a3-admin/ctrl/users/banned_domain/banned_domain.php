<!-- admin user banned domain table -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($bannedName).' '. ucfirst($emailName);?></h1>
            <?php
                require 'add/add_data.php';
                require 'add/add_form.php';
                require 'banned_domain_table.php';
                //check action
                if (isset($_GET['q']) && isset($_GET['token'])){
                    $token = htmlspecialchars(strip_tags(trim($_GET['token'])));
                    $token = (int)$token;
                    require 'action/action.php';
                    if ($_GET['q'] == 'ban'){
                        require 'action/ban.php';
                    }elseif ($_GET['q'] == 'active') {
                        require 'action/active.php';
                    }elseif ($_GET['q'] == 'delete') {
                        require 'action/delete.php';
                    } else {
                        header('location:banned_domain');
                    }
                }
            ?>
        </div>
    </div>
</div>
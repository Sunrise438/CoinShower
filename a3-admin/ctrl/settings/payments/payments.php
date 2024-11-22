<!-- admin payments -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="fw-bold"><?php echo ucfirst($paymentsName);?></h1>
            <?php
            require 'libs/api_key_list.php';
            require 'libs/fun/payments/payments.php';
            $payments_method = getPaymentsMethod();
            require __DIR__.'/payments_fun.php';
            echo '<ul class="nav nav-pills">';
            foreach ($payments_method AS $key => $payments_method_value){
                if (is_dir('../plugins/'.$payments_method_value['type'])){
                    if (is_file('../plugins/'.$payments_method_value['type'].'/settings.php')){
                        echo '<li class="nav-item">';
                        if ($key == 0){
                            $active = 'active';
                        } else {
                            $active = '';
                        }
                        echo '<a class="nav-link '.$active.'" data-bs-toggle="pill" href="#'.$payments_method_value['type'].'">'.$payments_method_value['type'].'</a>';
                        echo '</li>';
                    }
                }
            }
            echo '</ul>';
            
            echo '<div class="tab-content">';
            foreach ($payments_method AS $key => $payments_method_value){
                if (is_dir('../plugins/'.$payments_method_value['type'])){
                    if (is_file('../plugins/'.$payments_method_value['type'].'/settings.php')){
                        if ($key == 0){
                            $active = 'active';
                        } else {
                            $active = '';
                        }
                        echo '<div class="tab-pane container '.$active.'" id="'.$payments_method_value['type'].'">';
                        require '../plugins/'.$payments_method_value['type'].'/settings.php';
                        echo '</div>';
                        
                    }
                }
            }
            echo '</div>';
            ?>
        </div>
    </div>
</div>
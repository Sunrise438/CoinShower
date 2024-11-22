<?php 
require __DIR__.'/theme/head.php';
require '../config/config.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h1 class="text-center fw-bold mb-3">a3script Installation</h1>
            
            <div class="card p-5 mt-3 mb-3">
                <div class="card-body">
                <h4 class="card-title">Create Admin</h4>
                    <?php 
                        require __DIR__.'/assets/fun.php';
                        require __DIR__.'/admin/admin_form_data.php';
                        require __DIR__.'/admin/admin_form.php';
                    ?>
                </div>
            </div> 
      
        </div>
        <div class="col-lg-2"></div>
    </div>
    

</div>
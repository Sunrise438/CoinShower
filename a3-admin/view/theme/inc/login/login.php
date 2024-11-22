<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="col-lg-12">
                <div class="mt-5 mb-5 p-5 bg-dark bg-gradient text-white fw-bold rounded">
                    <h1 class="text-center"><i class="bi bi-gear"></i> <?php echo ucfirst($adminName);?></h1>
                    <?php 
                    require 'ctrl/login/login.php';
                    require __DIR__.'/login_form.php'
                    ?>
                </div>
            </div> 
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
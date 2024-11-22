 <div class="row">
    <div class="col-xl-2"><?php require requireSideBar();?></div>
    <div class="col-xl-10">
        <div class="col-xl-12">
            <?php 
            require 'ctrl/page/page.php';
            if (isset($_GET['slug'])){
                $slug = test_input($_GET['slug']);
                require showPage($slug);
            }
            
            ?>
        </div>
    </div>
</div>


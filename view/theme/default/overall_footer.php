</div>
</body>
     
<!-- Footer -->
<footer class="container-fluid text-center text-lg-start">
    <hr>
    <?php require 'mnav.php';?>
    <?php require 'fnav.php';?>

    <div class="row">
        <div class="col-lg-12 mt-3 mb-3">
            <?php require requireFooterCode();?>
        </div>
    </div>

    <div class="container">
        <h6 class="text-center">Copyrighted <b> @ </b><a href="<?php echo getScriptInfo()['url'];?>"><?php echo getScriptInfo()['name'];?></a><?php ' 2018 - ';?> <?php echo date("Y"); ?> All rights reserved.</h6>
    </div>

    </footer>
</html>


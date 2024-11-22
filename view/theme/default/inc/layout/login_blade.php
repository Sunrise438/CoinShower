<div class="row text-center rounded mt-3 mb-3">
    <div class="col-xl-4 mt-2 mb-2 p-2">
        <?php require_once requireLeftCode();?>
    </div>
    
    <div class="col-xl-4 mt-3 mb-3 p-2">
        <div class="col-xl-12 rounded p-2 mt-3 mb-3">
            <h2 class="mt-3 mb-3 text-dark"><?php echo ucwords('easy way to earn money')?></h2>
            <div class="btn-group btn-group-lg">
                <a href="login" type="button" class="btn btn-outline-primary"><?php echo ucfirst($loginName)?></a>
                <a href="register" type="button" class="btn btn-outline-primary"><?php echo ucfirst($registerName)?></a>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4 mt-2 mb-2 p-2">
        <?php require_once requireRightCode();?>
    </div>
</div>
<div class="row deposit-blade">
<?php 
foreach ($withdraw_method AS $method){
    if ($method['wid_action']){
        ?>
        <div class="col-lg-6 text-center mt-3 mb-2">
            <div class="bg-white border rounded p-2">
                <img class="mb-3" src="<?php 
                if (is_file('image/img/'.$method['type'].'.png')){
                    echo 'image/img/'.$method['type'].'.png';
                } else {
                    if (is_file('plugins/'.$method['type'].'/logo.png')){
                        echo 'plugins/'.$method['type'].'/logo.png';
                    }
                }
                    ?>" height="60px">
                <h6 class="fw-bold">
                    <a class="btn btn-outline-primary" href="withdraw?t=<?php echo $method['type']?>">
                        <?php echo ucwords($withdrawName.' '.$toName).' '.ucfirst($method['type'])?>
                    </a>
                </h6>
            </div>
        </div> 
        <?php
    }
}
?>
</div>
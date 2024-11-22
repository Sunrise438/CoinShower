<!-- The Modal -->
<div class="modal fade" id="myModalrecap">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title"><?php echo ucfirst($googleName).' '. $reCaptchaName.' v2';?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <?php 
                require 'recaptcha_form_site_key.php';
                require 'recaptcha_form_secret_key.php';
            ?>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

        </div>
    </div>
</div>
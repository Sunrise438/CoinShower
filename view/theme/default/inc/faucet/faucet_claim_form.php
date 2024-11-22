<div class="row">
    <div class="col-lg-8 border rounded">
        <div class="col-lg-12 mt-3 mb-3">
            <?php require_once 'view/theme/'.$themeAction.'/inc/code/code_faucet_top.php';?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center mt-3 mb-3"> 
                    <span class="">
                        <?php echo ucfirst($claimName).' <strong>'.number_format($site_info_row['faucet_amount'],8).' '. strtoupper($selectedCoin). '</strong> '. ucfirst($everyName).' '.$site_info_row['faucet_timer'].' '. ucfirst($minutesName);?>
                    </span>
                </h3>
            </div>
        </div>

        <form class="form-horizontal" id="claim">
            <input type="hidden" id="Fclaim" value="Fclaim">

            <div class="mb-3">
                <div class="d-flex justify-content-center">
                    <div class="p-2">
                        <?php require 'libs/captcha/captcha_type.php';?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-3 mb-3">
                <?php require_once 'view/theme/'.$themeAction.'/inc/code/code_faucet_code.php';?>
            </div>
            <div class="mb-3">
                <div class="text-center" id="newClaim">
                    <button type="submit" class="btn btn-outline-primary text-dark fw-bold" id="fbtn"><b>
                        <?php echo ucfirst($claimName);?></b></button>
                </div>
            </div>
            

        </form>
        <span id="faucettimer"></span>
        
        <div id="g-recaptcha-error"></div>
        <div id="newClaimAlert" class="d-none">
            <div class="alert alert-success text-center">
                <strong><?php echo number_format($site_info_row['faucet_amount'],8).' '. strtoupper($selectedCoin);?> </strong><?php echo ucfirst($earnedName);?>
            </div>
        </div>
        <div class="col-lg-12 mt-3 mb-3">
            <?php require_once 'view/theme/'.$themeAction.'/inc/code/code_faucet_bottom.php';?>
        </div>
    </div>
    <div class="col-lg-4">
        <?php require requireRightCode();?>
    </div>
</div>

<script src="ctrl/faucet/faucet/js/js.js"></script>
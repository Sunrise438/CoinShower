<?php
if (isset($recap_ok)){
    if ($recap_ok){
        setCookieSurf();
        header('location:surf');
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    
    <div class="mb-3">
        <div class="d-flex justify-content-center">
            <div class="p-2">
                <?php
                    //google recapcha
                    if ($grecap_action == 1){
                        echo '<div class="mb-3 mt-3 d-flex justify-content-center" id="recap">
                        <div class="g-recaptcha" data-sitekey="'.$grecap_site_key.'" data-callback="verifyCaptcha"></div></div>'
                                . '<div id="g-recaptcha-error"></div>';
                    } 
                ?>
            </div>
        </div>
    </div>
    
    <div class="mb-3">
        <div class="d-flex justify-content-center">
                <input type="submit" class="btn btn-primary" value="<?php echo ucfirst($enterName);?>">
        </div>
    </div>

</form>

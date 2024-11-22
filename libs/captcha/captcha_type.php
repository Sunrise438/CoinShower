<select class="form-select" id="cap">
    <option value="recap"><?php echo $reCaptchaName?></option>
    <option value="cf-turnstile"><?php echo $turnstileName?></option>
</select>

<script>
    $(document).ready(function(){
    $("#cap").change(function(){
            const cap = $("#cap").val();
            const c = "#"+cap;
            console.log(c);
            $(c).show();
            $("#recap").addClass("d-none");
            $("#cf-turnstile").addClass("d-none");
            $(c).removeClass("d-none")
        });
    });
</script>

<?php

//google recapcha
if (isset($grecap_action)){
    if ($grecap_action == 1){
        echo '<div class="mb-3 mt-3 d-flex justify-content-center">
        <div id="recap" class="g-recaptcha" data-sitekey="'.$grecap_site_key.'" data-callback="verifyCaptcha"></div></div>'
                . '<div id="g-recaptcha-error"></div>';
    } 
    
}
        
//turnstile recapcha
if (isset($turnstile_action)){
    if ($turnstile_action == 1){
        echo '<div class="mb-3 mt-3 d-flex justify-content-center">
        <div id="cf-turnstile" class="cf-turnstile d-none" data-sitekey="'.$turnstile_site_key.'" data-callback="javascriptCallback"></div></div>'
                . '<div id="cf-turnstile-error"></div>';
    }
}
 
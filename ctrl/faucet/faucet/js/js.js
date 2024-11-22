$(document).ready(function(){
    $("#claim").submit(function(){
        event.preventDefault();
        const cap = $("#cap").val();
        if (cap == "recap"){
            submitUserForm();
        }else if(cap == "cf-turnstile"){
            submitUserFormTurnstile();
        }
        
    });
});

function submitUserForm() {
    var response = grecaptcha.getResponse();
    //console.log(response);
    if(response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
        
    }else{
        SetClaim();
    }
    return true;
}
 
function verifyCaptcha() {
    document.getElementById('g-recaptcha-error').innerHTML = '';
}
    function SetClaim(){
        
    }
    
function SetClaim(){
   
        //send to data url_deposit_action page
        var fclaim = $('#Fclaim').val();
        
       
        $.post('ctrl/faucet/faucet/data.php',{Fclaim:fclaim,},
        function(data, success)
        {
            if (success == "success"){
                if (data == 1){
                    $('#newClaimAlert').removeClass("d-none");
                }else{
                    $('#newClaimAlert').addClass("d-none");
                }
                $('#newClaim').addClass("d-none");
                $('#cap').addClass("d-none");
                $('#recap').addClass("d-none");
                $('#cf-turnstile').addClass("d-none");
            }
        });      
    }
    
// if using synchronous loading, will be called once the DOM is ready
function submitUserFormTurnstile(){
    turnstile.ready(function () {
        turnstile.render('#cf-turnstile', {
            sitekey: tsitekey,
            callback: function(token) {
                SetClaim();
            },
        });
    });
}



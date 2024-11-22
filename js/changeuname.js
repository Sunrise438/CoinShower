$(document).ready(function(){
    $("#uname").keyup(function(){
        const uname = $("#uname").val();
        if (uname.length >= 8){
            $("#btnchangeunames").removeClass('disabled');
            $("#unameErrValid").addClass('d-none');
        }else{
            $("#btnchangeunames").addClass('disabled');
            $("#unameErrValid").removeClass('d-none');
        }
    });
});

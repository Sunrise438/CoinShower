$(document).ready(function(){
    $("#npass").keyup(function(){
        const npass = $("#npass").val();
        if (npass.length >= 8 && npass.length <= 128){
            $("#btnresetpass").removeClass('disabled');
            $("#npassErrValid").addClass('d-none');
        }else{
            $("#btnresetpass").addClass('disabled');
            $("#npassErrValid").removeClass('d-none');
        }
    });
    $("#ncpass").keyup(function(){
        const ncpass = $("#ncpass").val();
        const npass = $("#npass").val();
        if (ncpass === npass){
            $("#btnresetpass").removeClass('disabled');
            $("#ncpassErrValid").addClass('d-none');
        }else{
            $("#btnresetpass").addClass('disabled');
            $("#ncpassErrValid").removeClass('d-none');
        }
    });
});
$(document).ready(function(){
    $("#npass").keyup(function(){
        const npass = $("#npass").val();
        if (npass.length >= 8 && npass.length <= 128){
            $("#btnchangepass").removeClass('disabled');
            $("#npassErrValid").addClass('d-none');
        }else{
            $("#btnchangepass").addClass('disabled');
            $("#npassErrValid").removeClass('d-none');
        }
    });
    $("#ncpass").keyup(function(){
        const ncpass = $("#ncpass").val();
        const npass = $("#npass").val();
        if (ncpass === npass){
            $("#btnchangepass").removeClass('disabled');
            $("#ncpassErrValid").addClass('d-none');
        }else{
            $("#btnchangepass").addClass('disabled');
            $("#ncpassErrValid").removeClass('d-none');
        }
    });
});
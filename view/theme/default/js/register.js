$(document).ready(function(){
    $("#uname").keyup(function(){
        const uname = $("#uname").val();
        if (uname.length >= 0 && uname.length <=32){
            $("#btnregister").removeClass('disabled');
            $("#unameErrValid").addClass('d-none');
        }else{
            $("#btnregister").addClass('disabled');
            $("#unameErrValid").removeClass('d-none');
        }
    });
    $("#email").keyup(function(){
        const email = $("#email").val();
        if (isEmail(email)){
            $("#btnregister").removeClass('disabled');
            $("#emailErrValid").addClass('d-none');
        }else{
            $("#btnregister").addClass('disabled');
            $("#emailErrValid").removeClass('d-none');
        }
    });
    $("#pass").keyup(function(){
        const pass = $("#pass").val();
        if (pass.length >= 8 && pass.length <= 128){
            $("#btnregister").removeClass('disabled');
            $("#passErrValid").addClass('d-none');
        }else{
            $("#btnregister").addClass('disabled');
            $("#passErrValid").removeClass('d-none');
        }
    });
    $("#cpass").keyup(function(){
        const cpass = $("#cpass").val();
        const pass = $("#pass").val();
        if (cpass === pass){
            $("#btnregister").removeClass('disabled');
            $("#cpassErrValid").addClass('d-none')
        }else{
            $("#btnregister").addClass('disabled');
            $("#cpassErrValid").removeClass('d-none')
        }
    });
});
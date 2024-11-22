$(document).ready(function(){
    $("#ffpname").change(function(){
         var txt = $("#ffpname").val();
          $.post("fun/fun/check_email.php", {suggest: txt}, function(result){
            $("#ffpcheck").html(result);
          });
    });
});


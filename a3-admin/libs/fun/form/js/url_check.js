//check url
$(document).ready(function(){
    $("#url").change(function(){
        var txt = $("#url").val();
        $.post("fun/form/url_check.php", {suggest: txt}, function(result){
        $("#urlerr").html(result);
        });
    });
});
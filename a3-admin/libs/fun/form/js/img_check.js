//check image
$(document).ready(function(){
    $("#img").change(function(){
        var txt = $("#img").val();
        $.post("fun/form/img_check.php", {suggest: txt}, function(result){
        $("#imgerr").html(result);
        });
    });
});
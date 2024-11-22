//check url
$(document).ready(function(){
    $("#score").change(function(){
        var txt = $("#score").val();
        $.post("fun/form/score_check.php", {suggest: txt}, function(result){
        $("#scoreerr").html(result);
        });
    });
});


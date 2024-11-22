$(document).ready(function(){
    $("#chbtn").click(function(){
        $("#clearing").css({"display":"block"});
        var ch = $("#ch").val();
        $.post("ctrl/surf/surf_history/clear/clear_data.php",
        {
            chv : ch
        }, 
        function(data, status){
            
            if (status == "success"){
                $("#clearing").css({"display":"none"});
                $("#crleared").html(data);
            }
            
            
        });
    });
});

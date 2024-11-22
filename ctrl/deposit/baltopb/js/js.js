$(document).ready(function(){
    $("#amount").keyup(function(){
        var txt = $("#amount").val();
        
        $.post('ctrl/deposit/baltopb/data/data.php',{txt:txt},
        function(data, success)
        {
            if (success == "success"){
                
                if (data == 1){
                    $("#amountErr").addClass("d-none"); 
                    $("#amountlabel").removeClass("d-none"); 
                    $("#submitbtnbaltopb").removeClass("disabled"); 
                }else{
                    $("#amountErr").removeClass("d-none");
                    $("#amountlabel").addClass("d-none"); 
                    $("#submitbtnbaltopb").addClass("disabled"); 
                }
            }
        });
        
    });
});
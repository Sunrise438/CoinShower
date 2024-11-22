$(document).ready(function(){
    $("#amount1").keyup(function(){
        let txt = $("#amount1").val();

        if (txt > 0.00000001){
            $("#amountErr").addClass("d-none"); 
            $("#amountlabel").removeClass("d-none"); 
            $("#submitbtnfaucetpay").removeClass("disabled"); 
        }else{
            $("#amountErr").removeClass("d-none");
            $("#amountlabel").addClass("d-none"); 
            $("#submitbtnfaucetpay").addClass("disabled"); 
        }
        
    });
});
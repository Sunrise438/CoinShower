$(document).ready(function(){
    $("#advertisesurf").change(function(){
        const duration = $("#duration").val();
        const pricepersecond = $("#pricepersecond").val();
        const baseprice = $("#baseprice").val();
        const min = $("#min").val();
        var total1 = ((duration-min)*pricepersecond);
        var total = parseFloat(baseprice)+parseFloat(total1);
        $("#adsV").text(parseFloat(total).toFixed(8));
    });
});

$(document).ready(function(){
    $("#advertisesurf").load(function(){
        const duration = $("#duration").val();
        const pricepersecond = $("#pricepersecond").val();
        const baseprice = $("#baseprice").val();
        const min = $("#min").val();
        var total1 = ((duration-min)*pricepersecond);
        var total = parseFloat(baseprice)+parseFloat(total1);
        $("#adsV").text(parseFloat(total).toFixed(8));
    });
});

$(document).ready(function(){
    $("#url").keyup(function(){
        var url = $("#url").val();
        
        if (isValidHttpUrl(url) == true){
            $("#urllabel").removeClass("d-none"); 
            $("#urlErr").addClass("d-none");
            $("#submitbtn").removeClass("disabled"); 
        }else{
           $("#urlErr").removeClass("d-none"); 
           $("#urllabel").addClass("d-none"); 
           $("#submitbtn").addClass("disabled"); 
        }
        
        function isValidHttpUrl(string) {
          var urlPattern = new RegExp('^(https?:\\/\\/)?'+ // validate protocol
	    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // validate domain name
	    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // validate OR ip (v4) address
	    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // validate port and path
	    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // validate query string
	    '(\\#[-a-z\\d_]*)?$','i'); // validate fragment locator
	  return !!urlPattern.test(string);
        }
        
    });
});

$(document).ready(function(){
    $("#duration").keyup(function(){
        const duration = $("#duration").val();
        const min = $("#min").val();
        const max = $("#max").val();
        if (duration >= min && duration <= max){
            $("#durationlabel").removeClass("d-none"); 
            $("#durationErr").addClass("d-none");
            $("#submitbtn").removeClass("disabled"); 
        }else{
           $("#durationErr").removeClass("d-none"); 
           $("#durationlabel").addClass("d-none"); 
           $("#submitbtn").addClass("disabled"); 
        }
        
    });
});

$(document).ready(function(){
    $("#title").keyup(function(){
        var title = $("#title").val();
        let length = title.length;
        
        if (length <= 60){
            $("#titlelabel").removeClass("d-none"); 
            $("#titleErr").addClass("d-none");
            $("#submitbtn").removeClass("disabled"); 
        }else{
           $("#titleErr").removeClass("d-none"); 
           $("#titlelabel").addClass("d-none"); 
           $("#submitbtn").addClass("disabled"); 
        }
        
    });
});

$(document).ready(function(){
    $("#description").keyup(function(){
        var description = $("#description").val();
        let length = description.length;
        
        if (length <= 200){
            $("#descriptionlabel").removeClass("d-none"); 
            $("#descriptionErr").addClass("d-none");
            $("#submitbtn").removeClass("disabled"); 
        }else{
           $("#descriptionErr").removeClass("d-none"); 
           $("#descriptionlabel").addClass("d-none"); 
           $("#submitbtn").addClass("disabled"); 
        }
        
    });
});
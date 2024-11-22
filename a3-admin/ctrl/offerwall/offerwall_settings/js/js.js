$(document).ready(function(){
  $("#offerwalltype").change(function(){
    var txt = $('#offerwalltype').val();
        
        $.post('ctrl/offerwall/offerwall_settings/data/offerwall_status_form.php',
        {
            txt:txt
        },
        function(data)
        {
            $("#submitbtnofferwallstatus").remove();
            $("#offerwallstatus").remove();
            $('#offerwalltypeinputgroup').append(data);
        });
  });
});

function offerwallstatus(){
    var txt = $('#offerwalltype').val();
        
        $.post('ctrl/offerwall/offerwall_settings/data/offerwall_status_form.php',
        {
            txt:txt
        },
        function(data)
        {
            $("#submitbtnofferwallstatus").remove();
            $("#offerwallstatus").remove();
            $('#offerwalltypeinputgroup').append(data);
        });
}

offerwallstatus();

$(document).ready(function(){
  $("#viewchangeofferwallapi").click(function(){
        $("#changeofferwallapiform").removeClass("d-none");
        $(this).hide();
        
        var txt = $('#offerwalltypeapi').val();
        
        $.post('ctrl/offerwall/offerwall_settings/data/change_api_form.php',
        {
            txt:txt
        },
        function(data)
        {
            $("#changeapiform").html(data);
        });
  });
});

$(document).ready(function(){
  $("#offerwalltypeapi").change(function(){
    var txt = $('#offerwalltypeapi').val();
        
        $.post('ctrl/offerwall/offerwall_settings/data/change_api_form.php',
        {
            txt:txt
        },
        function(data)
        {
            $("#changeapiform").html(data);
        });
  });
});
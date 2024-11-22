$(document).ready(function(){
    $("#dbup").submit(function(){
        
        event.preventDefault();
        
        var fdbup = $("#fdbup").val()   
         
            $.post("ctrl/settings/backup/backup_data.php",
            {
              fdbup : fdbup
            },
            function(data, status){
              if (status == "success"){
                  dbupresult();
              }

            });
    });
});

function dbupresult(){
    let fdbup = "fdbup";
    $.post("ctrl/settings/backup/backup_info_data.php",
        {
          fdbup : fdbup
        },
        function(data, status){
          if (status == "success"){
              $("#dbupresult").html(data);
          }

        });
}

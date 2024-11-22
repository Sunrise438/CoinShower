$(document).ready(function(){
    $( "form" ).on( "submit", function( event ) {
        event.preventDefault();
        var x = $(this).serializeArray();
        var fo = [];
        $.each(x, function(i, field){
            fo[field.name] = field.value;
        });
        v1(fo['url'], fo['timer'], fo);
        
        $("#submitbtn").addClass('disabled');
      
    });
});
    
function v1(view, timer, fo){
    coinwin = window.open(view);
    v2(timer, fo);
}

function v2(timer, fo){
   //timer code
    var downloadTimer = setInterval(function(){
    timer--;
    if(timer >= 0){
        if(coinwin.closed){
            document.getElementById('timer').innerHTML = 
           'Window is closed. Please refresh the page.' ;
           document.getElementById('title').innerHTML = 
           'Window is closed' ;
           reF();
            }else {
                let timerresult = fo['id']+"timerresult";
                document.getElementById(timerresult).textContent = timer;
                document.getElementById('title').textContent = timer;
        }
    }
    
    if(timer <= 0){
        v3(fo);
    }
        
    
    if(timer <= 0)
        clearInterval(downloadTimer); 
    
    },1000);
    
    }
    
function v3(fo){
       if(coinwin.closed){
           reF();
       }else{
        const id = fo['id'];
        const country = fo['country'];
        $.post('ctrl/surf/surf/data/data.php',{id:id},
        function(data)
        {
            reP();
        });
    }
}
      
function reF() {

    if (confirm("Window is closed. Please refresh the page!")) {
        location.reload();
    } else {
        location.reload();
    }
    
}

function reP(){
    location.reload();
}
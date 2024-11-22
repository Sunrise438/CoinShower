temHistory();

function temHistory(){
    const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("temhis").innerHTML =
        this.responseText;
      }
      xhttp.open("GET", "ctrl/surf/surf/surf_history/data/surf_tem_history_table.php");
      xhttp.send();
      
      const myTimeout = setTimeout(temHistory, 10000);
}
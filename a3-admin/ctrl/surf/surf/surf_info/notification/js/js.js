notification();

function notification(){
    const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("notification").innerHTML =
        this.responseText;
      }
      xhttp.open("GET", "ctrl/surf/surf/surf_info/notification/notification.php");
      xhttp.send();
      
      const myTimeout = setTimeout(notification, 10000);
}
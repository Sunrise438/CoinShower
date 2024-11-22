notification();

function notification(){
    const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("withdrawnotification").innerHTML =
        this.responseText;
      }
      xhttp.open("GET", "ctrl/withdraw/notification/notification.php");
      xhttp.send();
      
      const myTimeout = setTimeout(notification, 10000);
}
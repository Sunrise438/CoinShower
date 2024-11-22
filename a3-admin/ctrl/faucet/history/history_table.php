<?php
        
        if($result->num_rows >0){
            
            echo '<table class="table table-striped">';
            
            if (isset($_GET['t'])){
                if ($_GET['t'] == 'today' || $_GET['t'] == 'fraud'){
                    require 'history_th_today.php';
                } else {
                    require 'history_th.php';
                }
                
            } else {
                require 'history_th.php';
            }
            
            
            echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            if (isset($_GET['t'])){
                if ($_GET['t'] == 'today' || $_GET['t'] == 'fraud'){
                    require 'history_tr_today.php';
                } else {
                    require 'history_tr.php';
                }
                
            } else {
                require 'history_tr.php';
            }
            
        }  echo '</tbody>';
            echo '</table>';
        }else {
            echo '<div class="alert alert-warning ">';
            echo '<strong>'.ucfirst($noRecordsFoundName).'!</strong>';
            echo '</div>';
        }
        


?>

<script>
    function confirmationDelete(anchor)
    {
       var conf = confirm('Are you sure want to do this?');
       if(conf)
          window.location=anchor.attr("href");
    }
</script>
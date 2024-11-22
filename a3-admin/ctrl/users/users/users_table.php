<?php
        
        if($result->num_rows >0){
            
            echo '<table class="table table-striped">';
            require 'users_th.php';
            
            echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            require 'users_tr.php';
            
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
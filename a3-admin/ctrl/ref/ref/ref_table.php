<?php
        
        if($result->num_rows >0){
            
            echo '<table class="table table-striped">';
            
            if (isset($_GET['t'])){
                if ($_GET['t'] == 'today'){
                    require 'ref_th_count.php';
                } else {
                    require 'ref_th.php';
                }
                
            } else {
                require 'ref_th_count.php';
            }
            
            
            echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            if (isset($_GET['t'])){
                if ($_GET['t'] == 'today'){
                    require 'ref_tr_count.php';
                } else {
                    require 'ref_tr.php';
                }
                
            } else {
                require 'ref_tr_count.php';
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
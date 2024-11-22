<?php
        
if($result != 0){

    echo '<table class="table table-striped">';

    require 'th.php';

    echo '<tbody>';
foreach  ($result['result'] AS $row) {

    echo '<tr>';
    echo '<td>'. $row["id"] .'</td>';
    echo '<td>'. $row["date"] .'</td>';
    echo '<td class="text-primary fw-bold">'.substr($row["address"],0,5).'....'.'</td>';
    echo '<td>'. number_format($row["amount"],$site_info_row['truncate_currency']) .'</td>';
    
    if (is_file("ctrl/withdraw/withdraw/".$row['method']."/logo.png")){
        echo '<td><img src="ctrl/withdraw/withdraw/'.$row['method'].'/logo.png" style="height:24px" title="'.$row['method'].'"></td>';
    } else {
        if (is_file("plugins/".$row['method']."/logo.png")){
            echo '<td><img src="plugins/'.$row["method"].'/logo.png" style="height:24px" data-bs-toggle="tooltip" title="'.$row['method'].'"></td>';
        } else {
            echo '<td></td>';
        }
    }

    if ($row["status"] == 0){
                echo '<td class="text-info fw-bold">'. ucfirst($pendingName) .'</td>';
            } elseif($row["status"] == 1){
                    echo '<td class="text-primary fw-bold">'. ucfirst($paidName) .'</td>';
            }elseif ($row["status"] == 3) {
                echo '<td class="text-danger fw-bold">'. ucfirst($rejectedName) .'</td>';
            }elseif ($row["status"] == 4) {
                echo '<td class="text-muted fw-bold">'. ucfirst($cancelledName) .'</td>';
            } else {
                echo '<td></td>';
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
    
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<?php
        
if($result != 0){

    echo '<table class="table table-striped">';

    require 'th.php';

    echo '<tbody>';
foreach  ($result AS $row) {

    echo '<tr>';
    echo '<td>'.$row["currency"].'</td>';
    echo '<td>'. number_format($row["rate"],$site_info_row['truncate_currency']).'</td>';
    echo '<td>'.$row["method"].'</td>';
    if ($row["dep_status"]){
        echo '<td><span class="text-primary">'. ucfirst($enabledName).'</span></td>';
    } else {
       echo '<td><span class="text-secondary">'. ucfirst($disabledName).'</span></td>'; 
    }
    if ($row["wid_status"]){
        echo '<td><span class="text-primary">'. ucfirst($enabledName).'</span></td>';
    } else {
       echo '<td><span class="text-secondary">'. ucfirst($disabledName).'</span></td>'; 
    }
    echo '<td><button class="material-icons bg-transparent text-primary border-0" onclick="changeCoinType(this.value)"
                  data-bs-toggle="modal" data-bs-target="#cointypeform"
            title="'.ucfirst($addName).' '.$toName.' '. ucfirst($menuName).'"
            value="'.$row['id'].'">edit</button></td>';
    echo '</tr>';

}  echo '</tbody>';
    echo '</table>';
}else {
    echo '<div class="alert alert-warning ">';
    echo '<strong>'.ucfirst($noRecordsFoundName).'!</strong>';
    echo '</div>';
}
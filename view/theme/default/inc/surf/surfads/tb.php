<?php
        
if($result != 0){

    echo '<table class="table table-striped">';

    require 'th.php';

    echo '<tbody>';
foreach  ($result['result'] AS $row) {

    echo '<tr>';
    echo '<td>'. $row["id"]
        . '<button type="button" class="text-primary border-0" data-bs-toggle="modal" 
            title="'.$row["title"].'" 
            data-bs-target="#modal'.$row["id"].'">
              <i class="bi bi-info-circle"></i>
          </button>'
    . '</td>';
    echo '<td><a href="'.$row["url"].'" class="text-primary border-0" target="_blank">
          '. get_url_hostname($row["url"]).'
          </a>'
    . '</td>';
    echo '<td><button type="button" class="text-primary border-0" data-bs-toggle="modal" 
            title="'.$row["title"].'" 
            data-bs-target="#addmodal'.$row["id"].'">
              <i class="bi bi-plus-circle"></i> '.number_format($row["balance"],$site_info_row['truncate_currency']).'
          </button>'
    . '</td>';
    echo '<td>'. number_format($row["price"],$site_info_row['truncate_currency']).'</td>';
    $totay_views = getSurfTodayViews($row["id"]);
    echo '<td>'. hrfFormat($totay_views) .'</td>';
    echo '<td>'. hrfFormat($row["view"]) .'</td>';
    echo '<td>'. $countries[$row["country_code"]] .'</td>';
    echo '<td>'. $row["date"] .'</td>';

    if ($row['status'] == 0){
        echo '<td><span class="badge text-secondary">'. ucwords($pendingName.' '.$approvalName).'</span>';
    }elseif ($row['status'] == 1) {
        echo '<td><span class="badge text-success">'. ucfirst($approvedName).'</span></td>';
    }elseif ($row['status'] == 3) {
        echo '<td><span class="badge text-danger">'. ucfirst($rejectedName).'</span></td>';
    }elseif ($row['status'] == 4) {
        echo '<td><span class="badge text-warning">'. ucfirst($cancelledName).'</span></td>';
    }    
    
    echo '<td>';
            if ($row['active'] == 1){
                echo '<button type="button" class="btn btn-outline-warning dropdown-toggle" data-bs-toggle="dropdown">';
                echo ucfirst($optionName);
                echo '</button>';
            } else {
                echo '<button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown">';
                echo ucfirst($optionName);
                echo '</button>';
            }
                
                echo '<ul class="dropdown-menu">';   
                if ($row['active'] == 1){
                    echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-warning" '
                . 'href="surfads?a=pause&token='. base64_encode($row['id']).'">'. ucfirst($pauseName).'</a></li>';
                } else {
                    echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-success" '
                . 'href="surfads?a=play&token='. base64_encode($row['id']).'">'. ucfirst($playName).'</a></li>';
                }
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-primary" '
                . 'href="surfads?a=edit&token='. base64_encode($row['id']).'">'. ucfirst($editName).'</a></li>';
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-secondary" '
                . 'href="surfads?a=delete&token='. base64_encode($row['id']).'">'. ucfirst($deleteName).'</a></li>';
                echo '</ul>';
            echo '</td>';
            echo '</tr>';
            require 'add_modal.php';
            require 'modal.php';
}  echo '</tbody>';
    echo '</table>';
}else {
    echo '<div class="alert alert-warning ">';
    echo '<strong>'.ucfirst($noRecordsFoundName).'!</strong>';
    echo '</div>';
}
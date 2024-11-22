<?php
require 'ctrl/shortlinks/data/today_shortlinks_views.php';
        
        if($result->num_rows >0){
            
            echo '<table class="table table-striped">';
            
            require 'shortlinks_th.php';
            
            echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            
            echo '<tr>';
            echo '<td><a href="shortlinks?t=shortlinks&sq='. $row["id"] .'" target="_blank">'. $row["id"] .'</a></td>';            
            echo '<td>'. number_format($row["pay_amount"],$site_info_row['truncate_currency']) .' '. strtoupper($selectedCoin).'</td>';
            echo '<td>'. number_format($row["usd_amount"],4) .' '. strtoupper('usd').'</td>';
            echo '<td>'. hrfFormat($row["view"]) .'</td>';
            echo '<td>'. hrfFormat(todayShortlinksViews($row["link"])) .'</td>';
            echo '<td>'. $row["view_limit"] .'</td>';
            echo '<td><a href="'.$site_info_row['site_url'].'/shortlinks?q='. $row["link"] .'">'. $row["link"] .'</a></td>';
            
            if (empty($row["shortlinks"])){
                echo '<td><a href="shortlinks?token='. $row["id"] .'"><button class="btn btn-outline-primary">'. ucfirst($addName).'</button></a></td>';

            } else {
                echo '<td class="text-break"><a href="'.$row["shortlinks"] .'">'. $row["shortlinks"] .'</a></td>';
            }
            
            echo '<td>';
            if ($row['status']){
                echo '<button type="button" class="btn btn-outline-warning dropdown-toggle" data-bs-toggle="dropdown">';
                echo ucfirst($optionalName);
                echo '</button>';
            } else {
                echo '<button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown">';
                echo ucfirst($optionalName);
                echo '</button>';
            }
                
                echo '<ul class="dropdown-menu">';
                if ($row['status']){
                    echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-warning" '
                . 'href="shortlinks?a=s&qid='.$row["id"].'">'. ucfirst($pauseName).'</a></li>';
                } else {
                    echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-success" '
                . 'href="shortlinks?a=p&qid='.$row["id"].'">'. ucfirst($playName).'</a></li>';
                }
                
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-primary" '
                . 'href="shortlinks?a=e&qid='.$row["id"].'">'. ucfirst($editName).'</a></li>';
                
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-secondary" '
                . 'href="shortlinks?a=d&qid='.$row["id"].'">'. ucfirst($deleteName).'</a></li>';
                
                echo '</ul>';
                
            echo '</td>';
            echo '<td>'. $row["date"] .'</td>';
           
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
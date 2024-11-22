<?php
        
if($result != 0){

    echo '<table class="table table-striped">';

    require 'th.php';

    echo '<tbody>';
foreach  ($result['result'] AS $row) {

    echo '<tr>';
    echo '<td>#'.$row["id"].'</td>';
    echo '<td>'.substr($row["ref_uname"],0,4).'......</td>';

    if ($site_info_row['faucet_action']){
        echo '<td>'.number_format($row["faucet_amount"],$site_info_row['truncate_currency']) .'</td>';
    }

    if ($site_info_row['surf_action']){
        echo '<td>'.number_format($row["surf_amount"],$site_info_row['truncate_currency']) .'</td>';
    }

    if ($site_info_row['shortlinks_action']){
        echo '<td>'.number_format($row["shortlinks_amount"],$site_info_row['truncate_currency']) .'</td>';
    }

    if ($site_info_row['offerwall_action']){
        echo '<td>'.number_format($row["offerwall_amount"],$site_info_row['truncate_currency']) .'</td>';
    }

    if ($site_info_row['ref_market_action']){
        echo '<td>'.number_format($row["buysell_amount"],$site_info_row['truncate_currency']) .'</td>';
    }


    echo '<td>'.$row["date"].'</td>';
    if ($site_info_row['ref_market_action']){
    //check buy sell time required

    if ((strtotime("now") - $site_info_row['ref_buysell_time_required']) > strtotime($row['date'])){
        if ($row['buysell_status'] == 0){
            echo '<td><a href="refsell?ru='.base64_encode($row["ref_uname"]).
                    '&rid='. base64_encode($row['id']).'" class="btn btn-outline-primary" title="'. ucfirst($sellName).'">'
                    . ucfirst($sellName).'</a></td>';


            } else if($row['buysell_status'] == 1){
                echo '<td><a href="refsell?ru='.base64_encode($row["ref_uname"]).
                    '&rid='. base64_encode($row['id']).'&bss=no" class="btn btn-outline-danger">'
                        .'<i class="bi bi-x-circle" title="'. ucfirst($doNotSellName).'"></i>'.'</a></td>';

            }

                echo '<td>'. number_format($row["buysell_price"],$site_info_row['truncate_currency']) .'</td>';
        } else {
            echo '<td><i class="bi bi-clock opacity-25"></i></td>';
            echo '<td>'. number_format($row["buysell_price"],$site_info_row['truncate_currency']).'</td>';
        }
    }
    echo '</tr>';

}  echo '</tbody>';
    echo '</table>';
}else {
    echo '<div class="alert alert-warning ">';
    echo '<strong>'.ucfirst($noRecordsFoundName).'!</strong>';
    echo '</div>';
}
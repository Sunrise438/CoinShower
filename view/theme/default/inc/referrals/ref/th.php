<?php

if (isset($_GET['t'])){
    if (isset($_GET['token'])){
        $t = 'token='.$_GET['token'].'&';
    } else {
        $t = '&';
    }
    
} else {
    $t = '';
}

/*
 * set order type
 */
if (isset($_GET['q'])){
    if ($_GET['q'] == 'asc'){
        $q = 'desc';
    } else {
        $q = 'asc';
    }
} else {
    $q = 'desc';
}

echo '<thead>';
echo '<tr>';
echo '<th> <a href="?'.$t.'o=id&q='.$q.'">'. ucfirst($idName).'</a></th>';
echo '<th> <a href="?'.$t.'o=username&q='.$q.'">'. ucfirst($userNameName).'</a></th>';

if ($site_info_row['faucet_action']){
    echo '<th> <a href="?'.$t.'o=faucet&q='.$q.'">'. ucfirst($faucetName).'</a></th>';
}

if ($site_info_row['surf_action']){
    echo '<th> <a href="?'.$t.'o=surf&q='.$q.'">'. ucfirst($surfName).'</a></th>';
}

if ($site_info_row['shortlinks_action']){
    echo '<th> <a href="?'.$t.'o=shortlinks&q='.$q.'">'. ucfirst($shortlinksName).'</a></th>';
}

if ($site_info_row['offerwall_action']){
    echo '<th> <a href="?'.$t.'o=offerwall&q='.$q.'">'. ucfirst($offerwallName).'</a></th>';
}

if ($site_info_row['ref_market_action']){
    echo '<th> <a href="?'.$t.'o=refbuysell&q='.$q.'">'. ucfirst($refName).' '. ucfirst($marketsName).'</a></th>';
}
    
echo '<th> <a href="?'.$t.'o=date&q='.$q.'">'. ucfirst($dateName).'</a></th>';
if ($site_info_row['ref_market_action']){
    echo '<th> <a href="?'.$t.'o=action&q='.$q.'">'. ucfirst($actionName).'</a></th>';
    echo '<th> <a href="?'.$t.'o=price&q='.$q.'">'. ucfirst($priceName).'</a></th>';
}
echo '</tr>';
echo '</thead>';
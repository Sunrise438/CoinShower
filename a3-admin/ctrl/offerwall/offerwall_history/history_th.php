<?php
if (isset($_GET['t'])){
    if (isset($_GET['token'])){
        $t = 't='.$_GET['t'].'&token='.$_GET['token'].'&';
    } else {
        $t = 't='.$_GET['t'].'&';
    }
    
} else {
    $t = '';
}

//set order type
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
echo '<th> <a href="?'.$t.'o=username&q='.$q.'">'. ucfirst($usernameName).'</a></th>';
echo '<th> <a href="?'.$t.'o=offerwall&q='.$q.'">'. ucfirst($offerwallName).'</a></th>';
echo '<th> <a href="?'.$t.'o=task&q='.$q.'">'. ucfirst($tasksName).'</a></th>';
echo '<th> <a href="?'.$t.'o=reward&q='.$q.'">'. ucfirst($rewardName).'</a></th>';
echo '<th> <a href="?'.$t.'o=ref&q='.$q.'">'. ucfirst($statusName).'</a></th>';
echo '<th> <a href="?'.$t.'o=date&q='.$q.'">'. ucfirst($dateName).'</a></th>';
echo '<th> <a href="?'.$t.'o=ref&q='.$q.'">'. ucfirst($referralName).'</a></th>';
echo '</tr>';
echo '</thead>';
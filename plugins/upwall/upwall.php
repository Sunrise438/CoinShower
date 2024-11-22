<?php
/*
 * upwall
 */

$offerwall_info = offerwallInfo('upwall');

/*
 * api key
 */
if ($offerwall_info != 0){
    $apiupwall = $offerwall_info['api_key'];
} else {
    header('location:offerwall');
}
?>
    
<div class="row">
    <div class="col-xl-12">
        <iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://upwall.xyz/offerwall?api=<?php echo $apiupwall;?>&uid=<?php echo $uname;?>"></iframe>
    </div>
</div>
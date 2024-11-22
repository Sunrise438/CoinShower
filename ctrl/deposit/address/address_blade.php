<div class="row">
    <div class="col-lg-12 bg-white p-3 rounded">
        <input type="text" value="<?php echo $deposit_address['FLaddress'];?>" id="myInput" style="visibility: hidden;">

        <h1 class="text-center"><img class="mb-2" src="image/coin/<?php echo $selectedCoin.'.png';?>" height="68px"></h1>
        <h5 class="form-control text-center" onclick="myFunction()" onmouseout="outFunc()" id="cmyTooltip">
                <?php echo $deposit_address['FLaddress'];?>
        </h5>
    </div>
</div>

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
  var tooltip = document.getElementById("cmyTooltip");
  tooltip.innerHTML = "<?php echo ucfirst($copiedName);?>";
}

function outFunc() {
  var tooltip = document.getElementById("cmyTooltip");
  tooltip.innerHTML = "<?php echo $deposit_address['FLaddress'];?>";
}
</script>
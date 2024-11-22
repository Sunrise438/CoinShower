<div class="row">
    <div class="col-xl-6">
        <!-- notification -->
        <div class="row">
            <div class="col-xl-12">
                <div id="withdrawnotification"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="notification"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-3 mb-1">
            <div class="card-header">
                <h5 class="card-title text-center text-success fw-bold"></i><?php echo getScriptInfo()['name'];?></h5>
            </div>
            <div class="card-body">
                <p class="text-secondary fw-bold"><?php echo  $versionName.' : <span class="text-dark fw-bold">v'.$site_info_row['version'].'</span>';?></p>
                <p class="text-secondary fw-bold"><?php echo  $vendorName.' : <a class="link-primary fw-bold" href="'. getScriptInfo()['url'].'" target="_blank">'. getScriptInfo()['name'].'</a>';?></p>

            </div>
        </div>
    </div>
</div>

<script src="ctrl/withdraw/notification/js/js.js"></script>
<script src="ctrl/surf/surf/surf_info/notification/js/js.js"></script>
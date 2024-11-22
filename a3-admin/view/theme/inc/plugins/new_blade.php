<div class="row">
    <div class="col-xl-12 mt-3 mb-3">
        <button class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#uploadpluginsblade"><?php echo ucwords($uploadName.' '.$pluginsName);?></button>
    </div>
    <div class="collapse col-xl-12 mt-3 mb-3 p-5 border border-2 rounded" id="uploadpluginsblade">
        <h6><?php echo ucfirst($IfYouHaveaPluginsInaZipFormatName); ?></h6>
        <div class="row">
            <div class="col-xl-6">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
    
                    <input type="hidden" name="plugins_install" value="1" required="">
                    
                    <!-- zip -->
                    <div class="input-group mb-3 mt-3">
                        <input class="form-control" type="file" name="file" id="theme" accept=".zip" required="">
                        <button class="btn btn-outline-success fw-bold"><?php echo ucwords($installName.' '.$pluginsName);?></button>
                    </div>

                </form>
            </div>
            <div class="col-xl-6"></div>
        </div>
    </div>
</div>
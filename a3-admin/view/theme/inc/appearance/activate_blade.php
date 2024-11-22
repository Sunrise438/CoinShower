<div class="row">
    <div class="col-xl-12 mt-3 mb-3 p-5 border border-2 rounded" id="uploadpluginsblade">
        <?php
        if (isset($_GET['success'])){
            if ($_GET['success'] == 'success'){
                echo '<div class="alert alert-success fw-bold">';
                echo ucfirst($activationKeyAddedName);
                echo '</div>';
            }
        }
        ?>
        <h5 class="mb-3"><?php echo ucwords($themeName.' '.$nameName.' : <span class="text-primary fw-bold">'.test_input($_GET['activate'])).'</span>'; ?></h5>
        <h6><?php echo ucfirst($IfYouHaveaThemesActivationKeyName); ?></h6>
        <div class="row">
            <div class="col-xl-6">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?activate=upwall';?>" enctype="multipart/form-data">
    
                    <input type="hidden" name="themes_activation" value="1" required="">
                    <input type="hidden" name="themes" value="<?php echo test_input($_GET['activate']); ?>" required="">
                    
                    <!-- zip -->
                    <div class="input-group mb-3 mt-3">
                        <input class="form-control" type="text" name="activation_key"
                               placeholder="<?php echo ucwords($enterName.' '.$activateName.' '.$keyName)?>" required="">
                        <button class="btn btn-outline-success fw-bold"><?php echo ucwords($activateName.' '.$themeName);?></button>
                    </div>

                </form>
            </div>
            <div class="col-xl-6"></div>
        </div>
    </div>
</div>
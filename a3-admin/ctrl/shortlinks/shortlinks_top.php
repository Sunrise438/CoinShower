<div class="row">

    <div class="col-lg-6">
        <?php require 'shortlinks/shortlinks_info_left.php';?>
    </div>

    <div class="col-lg-6">
        <?php require 'shortlinks/shortlinks_info_right.php';?>

        <div class="row mt-3 p-4">

            <div class="row <?php if (isset($_GET['t'])){ echo 'd-none';}?>">
                <div class="col-lg-12">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return confirm('Are you sure you want to submit?')">
                    <input type="hidden" name="gen" value="genlink">
                    <div class="btn-group">
                        <button type="submit"  class="btn btn-outline-primary"><?php echo ucwords($generateNewLinkName);?></button>
                        <a href="shortlinks?pa=up" onclick="javascript:confirmationDelete($(this));return false;" class="btn btn-outline-secondary"><?php echo ucwords($updatePayAmountnName);?></a>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <?php 
                //genarate new shortlinks
                    if (empty($_GET['token'])){
                        require 'shortlinks_generate.php';
                    }
                ?>
            </div>
        </div>
    </div>

</div> 

<div class="row">
    <div class="col-lg-12">
    <?php
        if (isset($_GET['token'])){
            require 'add_shortlinks.php';
        }
    ?>
    </div>
</div>
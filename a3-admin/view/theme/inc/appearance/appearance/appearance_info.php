<?php

$drr = '../view/theme/';

if ($handle = opendir($drr)) {
        $x = 0;
        $filedate = array();
        $fileName = array();
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && $file != 'index.php') {
                $lastModified = (filemtime($drr.$file));
                $filedate[$x] = $lastModified;
                $fileName[$x] = $file;

                $x++;
            }
        }
        closedir($handle);
    }

    //file as desending oder 
    arsort($filedate);
    echo '<div class="row">';?>

<div class="col-lg-4 p-3 mt-3 mb-3">
    <div class="">
  <div class="card">
      <?php 
      if (is_dir($drr.$themeAction.'/')){
          $screenshot_url = '../view/theme/'.$themeAction.'/screenshot.jpg';
          if (!is_file($screenshot_url)){
              $screenshot_url = 'image/img/theme.jpg';
          }
      } else {
          $screenshot_url = 'image/img/theme.jpg';
      }
      ?>
    <div class="card-body"><img class="img-fluid" src="<?php echo $screenshot_url;?>"></div> 
    <div class="card-footer">
        <div class="d-flex">
            <div class="p-2 flex-fill fw-bold"><?php echo $themeAction;?></div>
            <div class="p-2 flex-fill">
                <div class="d-flex justify-content-center btn-group">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                            <div class="input-group">
                                <a class="btn btn-primary btn-sm" href="?settings=<?php echo $themeAction;?>"><?php echo ucfirst($customizeName);?></a>
                            </div>

                        </form>
                </div> 
            </div>
        </div>
    </div>
  </div>
    </div>

</div>

    <?php foreach($filedate as $x => $x_value) {
        if($themeAction != $fileName[$x]){?>

<div class="col-lg-4 p-3 mt-3 mb-3">
    <div class="">
  <div class="card">
      <?php 
      if (is_dir($drr.$fileName[$x].'/')){
          $screenshot_url = '../view/theme/'.$fileName[$x].'/screenshot.jpg';
          if (!is_file($screenshot_url)){
              $screenshot_url = 'image/img/theme.jpg';
          }
      } else {
          $screenshot_url = 'image/img/theme.jpg';
      }
      ?>
    <div class="card-body"><img class="img-fluid" src="<?php echo $screenshot_url;?>"></div> 
    <div class="card-footer">
        <div class="d-flex">
            <div class="p-2 flex-fill fw-bold"><?php echo $fileName[$x];?></div>
            <div class="p-2 flex-fill">
                <div class="d-flex justify-content-center btn-group">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                            <div class="input-group">
                                <?php if($themeAction != $fileName[$x]){?>
                                <input type="hidden" class="form-control" name="taname" value="<?php echo $fileName[$x];?>" required="">
                                <button onclick="javascript:confirmationSubmit($(this));return false;" type="submit" 
                                        class="btn btn-outline-primary text-dark btn-sm fw-bold">
                                        <?php echo '<i class="bi bi-download"></i>'.ucfirst($activateName);?>
                                    </button>
                                <?php } else {?>
                                <span class="btn btn-primary text-dark btn-sm fw-bold"><?php echo ucfirst($activatedName);?></span>
                                <?php }?>
                            </div>

                        </form>
                </div> 
            </div>
        </div>
    </div>
  </div>
    </div>

</div>
<?php } }?>
<script>
    
    function confirmationSubmit(anchor)
    {
       var conf = confirm('Are you sure want to do this?');
       if(conf)
           form.submit();
    }
</script>
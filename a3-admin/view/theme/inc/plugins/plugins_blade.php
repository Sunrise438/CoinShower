<table class="table table-striped tb">
    <thead class="table-success">
        <tr>
            <th class="text-start"><?php echo ucfirst($pluginsName)?></th>
            <th class="text-start"><?php echo ucfirst($descriptionName)?></th>
        </tr>
    </thead>
    <tbody>
<?php
$plugins = getPlugins();

$drr = '../plugins/';

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
    arsort($fileName);
    echo '<div class="row">';?>

    <?php foreach($filedate as $x => $x_value) {
        
        //$fileContent = file_get_contents($drr.'/'.$fileName[$x].'/index.php');
        
//print_r(getPluginsMeta($fileName[$x]));
        
        
        if($themeAction != $fileName[$x]){?>

        <tr class="table-active">
            <td>
                <p class="fw-bold"><?php echo ucfirst($fileName[$x]);?></p>
                <?php
                if (is_file('../plugins/'.$fileName[$x].'/screenshot.jpg')){
                    echo '<img class="rounded" src="../plugins/'.$fileName[$x].'/screenshot.jpg" width="250px">';
                }
                ?>
                <br>
                
                        <?php 
                        if (isset($plugins[$fileName[$x]]['action'])){
                            
                            if ($plugins[$fileName[$x]]['action']){
                                ?>
                                <form class="mb-3 mt-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" name="iname" value="<?php echo $fileName[$x];?>" required="">
                                    <button onclick="javascript:confirmationSubmit($(this));return false;" type="submit" 
                                            class="btn btn-outline-secondary text-dark btn-sm fw-bold">
                                            <?php echo ucfirst($deactivateName);?>
                                    </button>
                                </div>
                                </form>
                                <?php

                            }else{
                                ?>
                                <div class="btn-group">
                                <form class="mb-3 mt-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" name="aname" value="<?php echo $fileName[$x];?>" required="">
                                    <button onclick="javascript:confirmationSubmit($(this));return false;" type="submit" 
                                            class="btn btn-outline-primary text-primaty btn-sm fw-bold border-0">
                                            <?php echo ucfirst($activateName);?>
                                    </button>
                                </div>
                                </form>
                
                                <form class="mb-3 mt-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" name="rname" value="<?php echo $fileName[$x];?>" required="">
                                    <button onclick="javascript:confirmationSubmit($(this));return false;" type="submit" 
                                            class="btn btn-outline-primary text-dark fw-bold border-0" title="<?php echo ucfirst($removeName);?>">
                                            <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                                </form>
                            </div>
                                <?php
                            }
                            
                        } else {
                            ?>
                            <div class="btn-group">
                                <form class="mb-3 mt-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" name="aname" value="<?php echo $fileName[$x];?>" required="">
                                    <button onclick="javascript:confirmationSubmit($(this));return false;" type="submit" 
                                            class="btn btn-outline-primary text-primaty btn-sm fw-bold border-0">
                                            <?php echo ucfirst($activateName);?>
                                    </button>
                                </div>
                                </form>
                
                                <form class="mb-3 mt-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" name="rname" value="<?php echo $fileName[$x];?>" required="">
                                    <button onclick="javascript:confirmationSubmit($(this));return false;" type="submit" 
                                            class="btn btn-outline-primary text-dark fw-bold border-0" title="<?php echo ucfirst($removeName);?>">
                                            <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                                </form>
                            </div>
                                <?php
                        }
                        ?>
                    
            </td>
            <td></td>
        </tr>

<?php } }?>
    </tbody>
</table>

<script>
    
    function confirmationSubmit(anchor)
    {
       var conf = confirm('Are you sure want to do this?');
       if(conf)
           form.submit();
    }
</script>
<?php

session_start();

if (empty($_SESSION['aemail'])){
    die();
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require '../../../libs/fun/fun.php';
    require '../../../lng/en.php';
    $drr = '../../../backup_db/';

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
    echo '<div class="row">';
    foreach($filedate as $x => $x_value) {?>

    <div class="col-lg-3">
        <div class="mt-4 p-3 bg-primary bg-gradient bg-opacity-50 text-white rounded">
            <div class="col-lg-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-database-exclamation" viewBox="0 0 16 16">
                  <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
                  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5Zm0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z"/>
                </svg>
            </div>

            <h6 class="text-center text-break text-dark fw-bold" style="font-size: 10px;"><?php echo $fileName[$x];?></h6>
            <p class="text-center text-black-50 fw-bold" style="font-size: 10px;"> <i class="bi bi-clock-history"></i> 
                <?php echo date("M d Y H:i:s A", filemtime('../../../backup_db/'.$fileName[$x]));?>
            </p>
            <p class="text-dark text-center">
                <?php echo filesize_formatted('../../../backup_db/'.$fileName[$x]);?>
            </p>

            <div class="d-flex justify-content-center btn-group">
            <form method="post" action="ctrl/settings/backup/backup_download.php">

                    <div class="input-group mt-3 mb-3">
                        <input type="hidden" class="form-control" name="dbname" value="<?php echo $fileName[$x];?>" required="">
                        <button onclick="javascript:confirmationSubmit($(this));return false;" type="submit" class="btn btn-outline-success text-dark btn-sm fw-bold">
                                <?php echo '<i class="bi bi-download"></i>'.ucfirst($downloadName);?>
                            </button>
                    </div>

                </form>
            <form method="post" action="backup">

                    <div class="input-group mt-3 mb-3">
                        <input type="hidden" class="form-control" name="dbdelete" value="<?php echo $fileName[$x];?>" required="">
                            <button onclick="javascript:confirmationSubmit($(this));return false;" type="submit" class="btn btn-outline-danger text-dark btn-sm fw-bold">
                                <?php echo '<i class="bi bi-trash"></i>'.ucfirst($deleteName);?>
                            </button>
                    </div>

                </form>

        </div>     

        </div>
    </div>
                <?php
    }
    echo '</div>';

    
}

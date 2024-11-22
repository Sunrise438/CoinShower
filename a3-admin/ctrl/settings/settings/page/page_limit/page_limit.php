<div class="row mt-2 mb-2">
    <div class="col-lg-8">
        <ol class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($pageName).' '. ucfirst($limitName);?></div>
                    <h5><span class="badge bg-primary text_dark"><?php echo $site_info_row['page_limit'];?></span></h5>
                        
                </div>
                    <?php 
                    require 'page_limit_data.php';
                    require 'page_limit_form.php';
                    ?>
            </li>
        </ol>
    </div>
    <div class="col-lg-4"></div>
</div>

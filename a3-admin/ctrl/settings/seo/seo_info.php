<h4 class=" fw-bold">
    <button type="button" class="btn btn-outline-primary border border-0" data-bs-toggle="modal" data-bs-target="#seo">
        <i class="bi bi-pencil-square" title="<?php echo ucfirst($editName);?>"></i>
    </button>
</h4>

<div class="row">
    <div class="col-lg-12 border rounded p-3 mt-3 mb-3">
        <h4 class="fw-bold"><?php echo ucfirst($siteNameName).' '. ucfirst($descriptionName);?></h4>
        <p><?php echo $site_info_row['description'];?></p>
    </div>
    <div class="col-lg-12 border rounded mb-3 p-3">
        <h4 class="fw-bold"><?php echo ucfirst($keyName).' '. ucfirst($wordsName);?></h4>
        <p><?php echo $site_info_row['keywords'];?></p>
    </div>
</div>
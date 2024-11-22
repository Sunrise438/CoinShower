<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="pill" href="#top_code"><?php echo ucfirst($topName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#bottom_code"><?php echo ucfirst($bottomName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#left_code"><?php echo ucwords($leftName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#right_code"><?php echo ucwords($rightName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#head_code"><?php echo ucwords($headName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#footer_code"><?php echo ucwords($footerName);?></a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane container active border" id="top_code">
        <?php require __DIR__.'/code/top_code_form.php';?>
    </div>
    <div class="tab-pane container border" id="bottom_code">
        <?php require __DIR__.'/code/bottom_code_form.php';?>
    </div>
    <div class="tab-pane container border" id="left_code">
        <?php require __DIR__.'/code/left_code_form.php';?>
    </div>
    <div class="tab-pane container border" id="right_code">
        <?php require __DIR__.'/code/right_code_form.php';?>
    </div>
    <div class="tab-pane container border" id="head_code">
        <?php require __DIR__.'/code/head_code_form.php';?>
    </div>
    <div class="tab-pane container border" id="footer_code">
        <?php require __DIR__.'/code/footer_code_form.php';?>
    </div>
</div>
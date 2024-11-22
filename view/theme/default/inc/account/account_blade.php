<div class="row">
    <div class="col-xl-12">

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="pill" href="#profile">
                    <?php echo ucfirst($profileName);?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#accountchangepass">
                    <?php echo ucwords($changeName.' '.$passwordName);?>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane container active" id="profile">
                <?php require __DIR__.'/profile_blade.php';?>
            </div>
            <div class="tab-pane container fade" id="accountchangepass">
                <?php require __DIR__.'/account_change_pass_form.php';?>
            </div>
        </div>
        
    </div>
</div>
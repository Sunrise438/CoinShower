<div class="row">
    
    <div class="col-lg-3">
        <div class="mt-4 mb-2 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h4 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($usersName);?></h4>
                    <h5 class="bg-secondary bg-opacity-25 p-1"><a class="link-dark text-black-50" href="users"><?php echo totalUsers('all');?></a></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-people text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="mt-4 mb-2 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h4 class="text-secondary"><?php echo ucfirst($activeName).' '. ucfirst($usersName);?></h4>
                    <h5 class="text-primary bg-primary bg-opacity-25 p-1"><a class="link-primary" href="users?t=active"><?php echo totalUsers('active');?></a></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-people text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="mt-4 mb-2 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h4 class="text-secondary"><?php echo ucfirst($bannedName).' '. ucfirst($usersName);?></h4>
                    <h5 class="text-danger bg-danger bg-opacity-25 p-1"><a class="link-danger" href="users?t=ban"><?php echo totalUsers('ban');?></a></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-people text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="mt-4 mb-2 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h4 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($usersName);?></h4>
                    <h5 class="bg-secondary bg-opacity-25 p-1"><a class="link-secondary" href="users?t=today"><?php echo totalUsers('today');?></a></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-people text-primary"></i></div>
            </div>
        </div>
    </div>
   
</div>
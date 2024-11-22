<div class="row">
    
    <div class="col-lg-3">
        <div class="mt-4 mb-2 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($sessionName);?></h5>
                    <h5 class="bg-secondary bg-opacity-25 p-1"><a class="link-dark text-black-50" href="users_login_session"><?php echo totalUsers('all');?></a></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-people text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="mt-4 mb-2 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($activeName).' '. ucfirst($sessionName);?></h5>
                    <h5 class="text-primary bg-primary bg-opacity-25 p-1"><a class="link-primary" href="users_login_session?t=active"><?php echo totalUsers('active');?></a></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-people text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="mt-4 mb-2 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($inactiveName).' '. ucfirst($sessionName);?></h5>
                    <h5 class="text-danger bg-danger bg-opacity-25 p-1"><a class="link-danger" href="users_login_session?t=ban"><?php echo totalUsers('inactive');?></a></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-people text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="mt-4 mb-2 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($sessionName);?></h5>
                    <h5 class="bg-secondary bg-opacity-25 p-1"><a class="link-secondary" href="users_login_session?t=today"><?php echo totalUsers('today');?></a></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-people text-primary"></i></div>
            </div>
        </div>
    </div>
   
</div>
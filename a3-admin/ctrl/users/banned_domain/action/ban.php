<?php

//select banned domain
$banned_domain = bannnedDomainInfoById($token);

if (isset($banned_domain)){
    bannnedDomainChangeStatus($token, 1);

}

header('location:banned_domain');
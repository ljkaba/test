<?php 

use App\Security\LoginFormAuthenticator;
use Symfony\Config\SecurityConfig;

return static function (SecurityConfig $security) {
    // ...

    $mainFirewall = $security->firewall('main');
    // ...

    $mainFirewall
        ->guard()
            ->authenticators([LoginFormAuthenticator::class])
    ;

    $mainFirewall
        ->logout()
            ->path('app_logout')
    ;
};
<?php
return [
    'providers' => [

        Ixudra\Curl\CurlServiceProvider::class,
    
    ],
    
    'aliases' => [
    
        'Curl' => Ixudra\Curl\Facades\Curl::class,
    
    ]
        
];

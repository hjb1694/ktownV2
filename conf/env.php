<?php 
return [
    'database' => [
        'hname' => '127.0.0.1', 
        'uname' => 'root',
        'pword' => '',
        'port' => 3306, 
        'dbname' => 'ktown', 
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
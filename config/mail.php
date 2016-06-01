<?php
return array(
 
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'from' => array('address' => 'codelution@gmail.com', 'name' => 'Admin Codelution'),
    'encryption' => 'tls',
    'username' => 'codelution',
    'password' => '123456',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,
 );
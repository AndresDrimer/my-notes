<?php
require 'vendor/autoload.php';

require 'config/config.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
 }
 
require 'src/app.php';


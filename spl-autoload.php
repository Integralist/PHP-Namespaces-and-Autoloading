<?php
    include 'core/loader/autoloader.php';
    
    // Required for setting up the autoloader
    \core\loader\autoloader::register();

    // Example usage for autoloading
    echo \core\loader\myclass::WhoAmI();
?>

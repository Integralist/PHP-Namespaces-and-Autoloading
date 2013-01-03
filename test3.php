<?php
    // application library 3
    namespace App\Lib3;
    
    const MYCONST = 'App\Lib3\MYCONST';
    
    function MyFunction() {
        return __FUNCTION__;
    }
    
    class MyClass {
        static function WhoAmI() {
            return __METHOD__;
        }
    }
?>
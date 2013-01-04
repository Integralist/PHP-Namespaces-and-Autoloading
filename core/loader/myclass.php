<?php

    namespace core\loader;
    
    class MyClass {
        static public function WhoAmI() {
            return '<b>SPL Loader MyClass:</b><br>' . __METHOD__;
        }
    }

?>
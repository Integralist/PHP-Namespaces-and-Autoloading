<?php

    namespace core\loader;

    class Autoloader {
        static public function register(){
            ini_set('unserialize_callback_func', 'spl_autoload_call');
            
            //die(print_r(array(__CLASS__, 'autoload'))); 
            // Array ( [0] => core\loader\Autoloader [1] => autoload ) 1
            
            //spl_autoload_register(array(__CLASS__, 'autoload'));

            //spl_autoload_register(self::autoload);

            spl_autoload_register(function ($class) {
                $class = strtolower(str_replace('\\', '/', $class)) . '.php';
                require_once $class;
            });
        }

        public function autoload ($class) {
            $format = PATH.str_replace(array('\\', '-'), array('/', '_'), ltrim(strtolower($class), '\\'));
            $file = strtolower($format) . '.php';

            if (is_file($file)) {
                require $file;
            }
        }
    }

?>
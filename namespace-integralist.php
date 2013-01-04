<?php
    use Integralist\Lib1\MyClass as IN1;
    use Integralist\Lib2\MyClass as IN2;

    function __autoload ($class_name) {
        $class = 'Classes/' . str_replace('\\', '/', $class_name) . '.php';
        require_once $class;
    }

    header('Content-type: text/html');

    $in1 = new IN1();
    echo $in1->WhoAmI() . '<br><br>';

    $in2 = new IN2();
    echo $in2->WhoAmI() . '<br><br>';
?>
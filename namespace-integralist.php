<?php
    namespace Integralist\Lib1;
    use Integralist\Lib1;

    // Used for autoloading tests
    use Integralist\Lib1\MyClass as IN1;
    use Integralist\Lib2\MyClass as IN2;

    header('Content-type: text/html');

    function __autoload ($class_name) {
        // Convert namespace to full file path
        $class = 'Classes/' . str_replace('\\', '/', $class_name) . 'php';

        require_once $class;
    }

    /*
        `__autoload` is a magic method that loads newly instantiated classes at run time
        When using namespaces things get more complicated.
        Our Classes need to be in the same folder structure as the namespace they're assigned.
        We still need the `use` operator to qualify our namespace (see line 5 above)
     */
    $in1 = new IN1();
    echo $in1->WhoAmI() . '<br><br>';

    $in2 = new IN2();
    echo $in2->WhoAmI() . '<br><br>';
?>
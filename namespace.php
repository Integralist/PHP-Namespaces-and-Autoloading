<?php
    namespace App\Lib1;
    use App\Lib2 as L2; // we can also alias specific functions, classes, constants etc
    use App\Lib3;

    // Used for autoloading tests
    use App\Lib1\MyClass as MC1;
    use App\Lib2\MyClass as MC2;
    use App\Lib3\MyClass as MC3;

    // Doesn't work although it's just a duplication of the above two classes?
    use Integralist\Lib1\MyClass as IN1;
    use Integralist\Lib2\MyClass as IN2;

    header('Content-type: text/html');

    function __autoload ($class_name) {
        // Convert namespace to full file path
        $class = 'Classes/' . str_replace('\\', '/', $class_name) . 'php';

        require_once $class;
    }

    require 'Database.php';
    require 'test1.php';
    require 'test2.php';
    require 'test3.php';

    // For us to use the Namespace defined in the required script we need to reference the full path...
    echo \Integralist\Database\Database::WhoAmI() . '<br><br>';
    
    // We don't include the fully qualified name, but this displays 'App\Lib1\MYCONST' because of the namespace at the top of the file
    echo MYCONST . '<br><br>';

    // We use the `use` operator which lets us use a part of the namespace to locate the right content
    echo Lib3\MYCONST . '<br><br>';

    // We use a namespace alias
    echo L2\MYCONST . '<br><br>';

    // Returns the current namespace (in this example `App\Lib1`)
    echo __NAMESPACE__ . '<br><br>';

    /*
        `__autoload` is a magic method that loads newly instantiated classes at run time
        When using namespaces things get more complicated.
        Our Classes need to be in the same folder structure as the namespace they're assigned.
        We still need the `use` operator to qualify our namespace (see line 5 above)
     */
    $obj1 = new MC1();
    echo $obj1->WhoAmI() . '<br><br>';

    $obj2 = new MC2();
    echo $obj2->WhoAmI() . '<br><br>';

    $obj3 = new MC3();
    echo $obj3->WhoAmI() . '<br><br>';

    /*
    $in1 = new IN1();
    echo $in1->WhoAmI() . '<br><br>';

    $in2 = new IN2();
    echo $in2->WhoAmI() . '<br><br>';
    */

    /*
    $db_connection = new Database('root', 'stormy');

    $results_array = $db_connection->fetch('SELECT * FROM testing');
    $results_object = $db_connection->fetch('SELECT * FROM testing', PDO::FETCH_OBJ);

    print_r($results_array);
        echo '<br><hr>';
    print_r($results_object);
        echo '<br><hr>';

    $sql = 'SELECT * FROM testing INNER JOIN roles ON testing.user_role = roles.role_id'; // In MySQL we set-up `user_role` to be an index/foreign key which points to the `roles` table
    $results_full_object = $db_connection->fetch($sql, PDO::FETCH_OBJ);

    print_r($results_full_object);
        echo '<hr>';

    /
        An Array wraps multiple Objects in the results.
        So we have to loop through the Array first before we can access the Objects within.
     /
    foreach ($results_full_object as $index) {
        
        foreach ($index as $key => $value) {
            echo $key . ': ' . $value . '<br>';

            /
                // This loop will display something like this...

                user_id: 1
                user_name: Joe
                user_surname: Bloggs
                user_age: 30
                user_role: 1
                role_id: 1
                role_name: Manager
                user_id: 1
                user_name: Bob
                user_surname: Smith
                user_age: 99
                user_role: 2
                role_id: 2
                role_name: Developer
             /
        }
    }

    $db_connection->close();
    */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>

<body>
    <?php
    var_dump($_SERVER);

    $fruits = ["apple", "banana", "orange"];
    $fruits[] = "grapes";
    array_push($fruits, "mango");
    $fruits[10] = "pineapple"; // this will create empty indexes


    for ($i=0; $i <= count($fruits); $i++) { 
        echo $fruits[$i] . "<br>"; // this will give error because of undefined index
    }
    echo "<br>";
    foreach ($fruits as $key => $value) {
        echo "<p>The $key. fruit: $value</p><br>";
    }

    echo "<table border='1'>";
    echo "<h2>Fruits Table</h2>";
    foreach ($fruits as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "</table>";

    echo "<table border='1'>";
    echo '<h2>$_SERVER Table</h2>';
    foreach ($_SERVER as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "</table>";


    // students and scholarship
    $students = array("John" => 23000, "Jane" => 25000, "Peter" => 20000);
    $students["Sara"] = 42000;
    $students["John"] = 30000;
    // you can't use array_push() for associative arrays
    // can you?
    // yes, you can
    $students = array_merge($students, array("Sara" => 42000));
    
    array_push($students, 50000); // this will give error


    // PHP array sorting
    // sort() - sort arrays in ascending order
    // rsort() - sort arrays in descending order
    // asort() - sort associative arrays in ascending order, according to the value
    // ksort() - sort associative arrays in ascending order, according to the key
    // arsort() - sort associative arrays in descending order, according to the value
    // krsort() - sort associative arrays in descending order, according to the key

    sort($students);
    echo "<pre>";
    print_r($students);
    echo "</pre>";

    rsort($students);
    echo "<pre>";
    print_r($students);
    echo "</pre>";
    
    asort($students);
    echo "<pre>";
    print_r($students);
    echo "</pre>";

    ksort($students);
    echo "<pre>";
    print_r($students);
    echo "</pre>";

    arsort($students);
    echo "<pre>";
    print_r($students);
    echo "</pre>";

    krsort($students);
    echo "<pre>";
    print_r($students);
    echo "</pre>";


    // PHP array functions
    // count() - return the number of elements in an array
    // array_sum() - return the sum of the values in an array
    // array_product() - return the product of the values in an array
    // array_reverse() - return an array in the reverse order
    // in_array() - search an array for a specific value
    // array_rand() - return a random key from an array
    // array_unique() - remove duplicate values from an array
    // array_merge() - merge one or more arrays
    // array_search() - search an array for a specific value and return the key
    // range() - create an array containing a range of elements
    // sort() - sort arrays in ascending order
    // rsort() - sort arrays in descending order
    // asort() - sort associative arrays in ascending order, according to the value

    echo "<pre>";
    print_r($students);
    echo "</pre>";

    echo count($students) . "<br>";
    echo array_sum($students) . "<br>";
    echo array_product($students) . "<br>";

    echo "<pre>";
    print_r(array_reverse($students));
    echo "</pre>";

    echo in_array(42000, $students) . "<br>";
    echo array_rand($students) . "<br>";
    echo array_unique($students) . "<br>";

    echo "<pre>";
    print_r(array_merge($students, array("Sara" => 42000)));
    echo "</pre>";

    echo array_search(42000, $students) . "<br>";

    echo "<pre>";
    print_r(range(0, 10));
    echo "</pre>";

    echo "<pre>";
    print_r(range("a", "z"));
    echo "</pre>";

    echo "<pre>";
    print_r(range("A", "Z"));
    echo "</pre>";

    echo "<pre>";
    print_r(range("A", "Z", 2));
    echo "</pre>";

    echo "<pre>";
    print_r(range("A", "Z", 3));


    // PHP multidimensional arrays
    // an array inside an array

    $students = array(
        array("John", 23000),
        array("Jane", 25000),
        array("Peter", 20000),
        array("Sara", 42000)
    );

    echo "<pre>";
    print_r($students);
    echo "</pre>";

    echo $students[0][0] . "<br>";
    echo $students[1][0] . "<br>";
    echo $students[2][0] . "<br>";
    echo $students[3][0] . "<br>";

    echo $students[0][1] . "<br>";
    echo $students[1][1] . "<br>";

    echo "<table border='1'>";
    echo "<h2>Students Table</h2>";
    foreach ($students as $key => $value) {
        echo "<tr><td>$value[0]</td><td>$value[1]</td></tr>";
    }
    echo "</table>";

    $students = array(
        array("name" => "John", "scholarship" => 23000),
        array("name" => "Jane", "scholarship" => 25000),
        array("name" => "Peter", "scholarship" => 20000),
        array("name" => "Sara", "scholarship" => 42000)
    );

    echo "<pre>";
    print_r($students);
    echo "</pre>";

    echo $students[0]["name"] . "<br>";
    echo $students[1]["name"] . "<br>";
    echo $students[2]["name"] . "<br>";
    echo $students[3]["name"] . "<br>";

    echo $students[0]["scholarship"] . "<br>";
    echo $students[1]["scholarship"] . "<br>";

    echo "<table border='1'>";
    echo "<h2>Students Table</h2>";
    foreach ($students as $key => $value) {
        echo "<tr><td>$value[name]</td><td>$value[scholarship]</td></tr>";
    }
    echo "</table>";


    // PHP Copilot Tutorial


    

    // PHP Regular Expressions
    // also known as regex
    // Regular expressions are used to perform pattern matching and "search and replace" functions on text.
    // a sequence of characters that define a search pattern




    // PHP Superglobals
    // PHP superglobals are built-in variables that are always available in all scopes
    // $GLOBALS
    // $_SERVER
    // $_REQUEST
    // $_POST
    // $_GET
    // $_FILES
    // $_ENV
    // $_COOKIE
    // $_SESSION


    // PHP $GLOBALS
    // $GLOBALS is a PHP super global variable which is used to access global variables from anywhere in the PHP script (also from within functions or methods).
    // PHP stores all global variables in an array called $GLOBALS[index]. The index holds the name of the variable.
    $x = 10;
    $y = 20;

    function add() {
        $GLOBALS["z"] = $GLOBALS["x"] + $GLOBALS["y"];
    }

    add();
    echo $z;
    
    // PHP $_SERVER
    // $_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.

    echo $_SERVER["PHP_SELF"] . "<br>";
    echo $_SERVER["SERVER_NAME"] . "<br>";
    echo $_SERVER["HTTP_HOST"] . "<br>";
    echo $_SERVER["HTTP_REFERER"] . "<br>";
    echo $_SERVER["HTTP_USER_AGENT"] . "<br>";
    echo $_SERVER["SCRIPT_NAME"] . "<br>";

    // PHP $_REQUEST
    // $_REQUEST is a PHP super global variable which is used to collect data after submitting an HTML form.
    // $_REQUEST can collect data from both GET and POST methods.
    // $_REQUEST can also collect data from cookies and form submissions.
    // $_REQUEST is an array of variables passed to the current script via the URL parameters.

    echo $_REQUEST["name"] . "<br>";
    echo $_REQUEST["email"] . "<br>";
    
    // PHP $_POST
    // $_POST is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post".
    // $_POST is also widely used to pass variables.
    // $_POST is an array of variables passed to the current script via the HTTP POST method when using application/x-www-form-urlencoded or multipart/form-data as the HTTP Content-Type in the request.




    ?>
</body>

</html>
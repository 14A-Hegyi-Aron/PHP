<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        echo "<h1 style='text-decoration:underline'>Hello World</h1>";
        $a = 10;
        echo "a is $a";
        // create a function
        function hello($name){
            echo "<h2>Hello $name</h2>";
        }
        // call the function
        hello("John");

        // creat a function that raises a php warning
        function raiseWarning(){
            echo "<h2>Warning</h2>";
            trigger_error("This is a warning", E_USER_WARNING);
        }
        raiseWarning();

        // githun copilot is awesome
    ?>

</body>

</html>
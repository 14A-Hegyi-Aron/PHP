<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div>
            <label for="name">Sorok száma:</label>
            <input type="number" name="sor">
        </div>
        <div>
            <label for="name">Oszlopok száma:</label>
            <input type="number" name="oszlop">
        </div>
        <input type="submit" value="Küldés">
    </form>
    <?php
    // var_dump($_POST);
    var_dump($_SERVER['REQUEST_METHOD']);
    if (
        $_SERVER['REQUEST_METHOD'] == 'POST' and
        // isset($_POST['sor']) and isset($_POST['oszlop'])
        !empty($_POST['sor']) and !empty($_POST['oszlop'])
    ) {
        $sor = $_POST['sor'];
        $oszlop = $_POST['oszlop'];
        // check if the input is a number
        if (is_numeric($sor) and is_numeric($oszlop)) {
            echo "<table border='1'>";
            for ($i = 0; $i < $sor; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $oszlop; $j++) {
                    echo "<td>Cella</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nem számot adtál meg!";
        }
    }

    // isset vs empty
    // isset() is true if the variable is set and is not NULL
    // !empty() is true if the variable is set and is not NULL or empty string or 0 or 0.0 or "0" or false or array() or $var;

    ?>
</body>

</html>
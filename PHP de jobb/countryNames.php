<?php
$FILENAME = 'countries.csv';
include 'countries.class.php';
$countries = new Countries($FILENAME);
$list = "<ol>";
foreach ($countries->getCountryNames() as $name) {
    $list .= "<li>$name</li>";
}
$list .= "</ol>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries</title>
</head>

<body>
    <h1>Country Names</h1>
    <?php echo $list; ?>
</body>

</html>
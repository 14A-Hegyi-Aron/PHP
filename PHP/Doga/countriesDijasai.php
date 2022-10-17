<?php
if (!empty($_GET["orszag"])) {
    $orszag = $_GET["orszag"];
} else {
    $orszag = "all";
}

echo "<h2>$orszag Nobel-dijasai</h2>";

include_once('dijasok.class.php');
$dijasok = new Díjasok('nobeldijak.txt');
$list = "<div class='row'>";
foreach ($dijasok->filteredDíjakByDíjak($orszag) as $key => $value) {
    $list .= "
    <div class='col-sm-6 col-md-4'>
        <div class='card my-3'>
            <div class='card-header bg-dark'>$value->name</div>
            <ul class='list-group list-group-flush'>
            <li class='list-group
            -item'>Díj: $value->díj</li>
                <li class='list-group
                -item'>Év: $value->év</li>
                <li class='list-group
                -item'>Ország: $value->ország</li>
            </ul>
        </div>
    </div>";
}

$list .= "</div>";

echo $list;

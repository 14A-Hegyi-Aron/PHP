<?php
if (!empty($_GET["orszag"])) {
    $orszag = $_GET["orszag"];
} else {
    $orszag = "A világ";
}

echo "<h2>$orszag Nobel-díjasai</h2>";

include_once('dijasok.class.php');
$dijasok = new Díjasok('nobeldijak.txt');
$list = "<div class='row'>";
foreach ($dijasok->filteredDíjakByCountry($orszag) as $key => $value) {
    $list .= "
    <div class='col-sm-6 col-md-4'>
        <div class='card my-3 p-2'>
            <div class='card-header bg-dark'>$value->Nev</div>
            <ul class='list-group list-group-flush'>
            <li class='list-group
            -item'>Nobel-díjay kapott: $value->Ev</li>
                <li class='list-group
                -item'>Él(t): $value->SzuletesHalalozas</li>
                <li class='list-group
                -item'>Ország: $value->Orszag</li>
            </ul>
        </div>
    </div>";
}

$list .= "</div>";

echo $list;

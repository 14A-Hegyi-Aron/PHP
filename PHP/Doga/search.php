<?php
$search = isset($_POST["dijakName"]) ? $_POST["dijakName"] : "";
?>

<form class="bg-secondary p-3" method="POST" action="?page=searchList">
    <div>
        <h2 class="form-label">Nobel-díjasok keresése</h2>
        <input type="text" class="form-control" id="searchBox" name="dijakName" value="<?php echo $search; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Keres</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('dijasok.class.php');
    $dijasok = new Díjasok('nobeldijak.txt');
    $list = "<div class='row'>";
    foreach ($dijasok->searchDíjak($search) as $key => $value) {
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
}

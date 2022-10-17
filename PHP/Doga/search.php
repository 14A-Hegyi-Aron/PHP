<?php
$search = isset($_POST["dijakName"]) ? $_POST["dijakName"] : "";
?>

<form class="bg-secondary p-3">
    <div>
        <h2 class="form-label">Nobel-díjasok keresése</h2>
        <input type="text" class="form-control" id="searchBox" name="search" value="<?php echo $search; ?>">
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
}

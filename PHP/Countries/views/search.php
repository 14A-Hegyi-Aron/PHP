<?php
$search = isset($_POST["countryName"]) ? $_POST["countryName"] : "";
?>

<h1>Search country</h1>
<form method="POST" action="?todo=search">
  <div class="mb-3">
    <label for="countryName" class="form-label">Country name</label>
    <input type="text" class="form-control" name="countryName" value="<?php echo $search; ?>">

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include('models/countries.class.php');
  $countries = new Countries($FILENAME);
  $list = "<div class='row'>";
  foreach ($countries->searchCountry($search) as $key => $value) {
    $list .= "
    <div class='col-sm-6 col-md-4'>
        <div class='card my-3'>
            <div class='card-header bg-dark'>$value->name</div>
            <ul class='list-group list-group-flush'>
            <li class='list-group-item'>Subregion: $value->subregion</li>
                <li class='list-group-item'>Capital: $value->capital</li>
                <li class='list-group-item'>Currency: $value->currency</li>
            </ul>
        </div>
    </div>";
  }
  $list .= "</div>";

  echo $list;
}
?>
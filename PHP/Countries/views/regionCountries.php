<?php
    if (!empty($_GET["region"])) {
        $region = $_GET["region"];
        $region = $region == "N/A" ? "" : $region;
    }
    else {
        $region = "all";
    }

    echo "<h2>Country names of region $region</h2>";
    include_once('config.php');
    include_once('models/countries.class.php');
    $countries = new Countries($FILENAME);
    $list = "<div class='row'>";
    foreach ($countries->filteredCountriesByRegion($region) as $key => $value) {
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
?>
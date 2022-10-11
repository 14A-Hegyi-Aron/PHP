<h1>Regions</h1>
<?php
    include('models/countries.class.php');
    // include_once('country.class.php');
    $countries = new Countries($FILENAME);
    $list = "<ul>";
    foreach ($countries->getRegions() as $key => $value) {
        $list .= "<li><a class='text-white' href='?todo=regionList&region=$value'>$value</a></li>";
    }
    $list .= "</ul>";

    echo $list;

    include('regionCountries.php');
?>
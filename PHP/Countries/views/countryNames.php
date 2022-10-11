<h1>Country names</h1>
<?php
    include_once('config.php');
    include('models/countries.class.php');
    $countries = new Countries($FILENAME);
    $list = "<ol>";
    foreach ($countries->getCountryNames() as $key => $value) {
        $list .= "<li>$value</li>";
    }
    $list .= "</ol>";
    
    echo $list;
?>
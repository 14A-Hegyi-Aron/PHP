<?php
class Country {
    // private $barmi;
    function __construct($fields, $row){
        $this->barmi = 'akarmi';
        // $this->fields = 'id;name;iso3;capital;currency;currency_name;currency_symbol;tld;native;region;subregion';
        $fieldsArray = explode(';', $fields);
        $data = explode(';', $row);
        if (count($fieldsArray) != count($data)) {
            throw new Exception('Field and data counts mismatch.');
        }
        $i = 0;
        foreach ($fieldsArray as $key => $value) {
            $this->$value = $data[$i]; //$this->$value - stringből változó lesz
            $i++;
        }        
    }
}
?>
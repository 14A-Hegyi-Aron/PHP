<?php
class Country {
    private $fields;
    function __construct($fields, $row){
        $this->fields = 'id;name;iso3;capital;currency;currency_name;currency_symbol;tld;native;region;subregion';
        $fieldsArray = explode(';', $this->fields);
        $data = explode(";", $row);
        $i = 0;
        foreach($fieldsArray as $value){
            $this->$value = $data[$i];
            $i++;
        }
    }
    
    
}

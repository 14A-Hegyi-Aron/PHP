<?php
include 'country.class.php';
class Countries
{
    private $countries = array();
    function __construct($fileName)
    {
        if (!file_exists($fileName)) {
            throw new
                Exception('File not found');
        }
        $f = fopen($fileName, 'r');
        $fields = fgets($f);
        while (!feof($f)) {
            $row = fgets($f);
            if (!empty($row)) {
                $country = new Country($fields, $row);
                $this->countries[] = $country;
            }
        }

        fclose($f);
    }

    public function getCountryNames()
    {
        $names = array();
        foreach ($this->countries as $country) {
            $names[] = $country->name;
        }
        return $names;
    }
}

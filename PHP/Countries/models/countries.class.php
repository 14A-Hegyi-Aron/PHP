<?php
    include('country.class.php');
    class Countries {
        private $countries = array();
        
        function __construct($fileName)
        {
            if (! file_exists($fileName)) {
                throw new Exception('File not found');
            }
            $f = fopen($fileName, 'r');
            $fields = trim(fgets($f));
            while (!feof($f)) {
                $row = trim(fgets($f));
                if (!empty($row)) {
                    $country = new Country($fields, $row);
                    $this->countries[] = $country;
                }
            }
            fclose($f);
        }

        public function getCountryNames() {
            $names = array();
            foreach ($this->countries as $key => $value) {
                $names[] = $value->name;
            }
            return $names;
        }

        public function getRegions() {
            $regions = array();
            foreach ($this->countries as $key => $value) {
                $region = empty($value->region) ? "N/A" : $value->region;
                if (!in_array($region, $regions)) {
                    $regions[] = $region;
                }
            }
            return $regions;
        }

        public function filteredCountriesByRegion($region) {
            $filtered = array();
            foreach ($this->countries as $key => $value) {
                if ($value->region == $region) {
                    $filtered[] = $value;
                }
            }
            return $filtered;
        }

        public function searchCountry($country) {
            $filtered = array();
            foreach ($this->countries as $key => $value) {
                if (stripos($value->name, $country) !== false) {
                    $filtered[] = $value;
                }
            }
            return $filtered;
        }
    }
?>
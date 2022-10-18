<?php
    include('dijak.class.php');
    class Díjasok {
        private $díjak = array();
        
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
                    $díjak = new Díjak($fields, $row);
                    $this->díjak[] = $díjak;
                }
            }
            fclose($f);
        }

        public function getCountries() {
            $countries = array();
            foreach ($this->díjak as $value) {
                $country = $value->Orszag;
                if (!in_array($country, $countries)) {
                    $countries[] = $country;
                }
            }
            return $countries;
        }

        public function filteredDíjakByCountry($díjNév) {
            if ($díjNév == "A világ") {
                return $this->díjak;
            }
            $filtered = array();
            foreach ($this->díjak as $díj) {
                if ($díj->Orszag == $díjNév) {
                    $filtered[] = $díj;
                }
            }
            return $filtered;
        }

        public function searchDíjak($díjak) {
            $filtered = array();
            foreach ($this->díjak as $value) {
                if (str_contains(strtolower($value->Nev), strtolower($díjak))) {
                    $filtered[] = $value;
                }
            }
            return $filtered;
        }
    }

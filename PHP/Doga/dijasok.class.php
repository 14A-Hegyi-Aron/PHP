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

        public function getCountries()
        {
            $countries = array();
            foreach ($this->díjak as $value) {
                $countries[] = $value->Orszag;
            }
            return array_unique($countries);
        }

        public function filteredDíjakByDíjak($díjak) {
            $filtered = array();
            foreach ($this->orszag as $value) {
                if ($value->orszag == $díjak) {
                    $filtered[] = $value;
                }
            }
            return $filtered;
        }

        public function searchDíjak($díjak) {
            $filtered = array();
            foreach ($this->díjak as $value) {
                if (stripos($value->name, $díjak) !== false) {
                    $filtered[] = $value;
                }
            }
            return $filtered;
        }
    }
?>
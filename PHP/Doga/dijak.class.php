<?php
class Díjak
{
    function __construct($fejlec, $sor)
    {
        $fejlecArray = explode(';', $fejlec);
        $sorArray = explode(';', $sor);
        if (count($fejlecArray) != count($sorArray)) {
            throw new Exception('Field and data counts mismatch.');
        }
        $i = 0;
        foreach ($fejlecArray as $value) {
            $this->$value = $sorArray[$i];
            $i++;
        }
    }

}

<h2>Díjasok</h2>
<?php
    include('dijasok.class.php');
    $dijasok = new Díjasok('nobeldijak.txt');
    $list = "<ol>";
    foreach ($dijasok->getDijazottNames() as $key => $value) {
        $list .= "<li><a href='searchList.php?orszag=$value'>$value</a></li>";
    }
    $list .= "</ol>";
    
    echo $list;
?>
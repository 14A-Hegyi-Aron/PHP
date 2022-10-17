<h1>Országok</h1>
<?php
include('dijasok.class.php');
$dijasok = new Díjasok('nobeldijak.txt');
$list = "<ul class='pagination'>";
foreach ($dijasok->getCountries() as $value) {
    $list .= "<li class='page-item'><a class='page-link' href='?page=countriesList&orszag=$value'>$value</a></li>";
}
$list .= "</ul>";
echo $list;
include('countriesDijasai.php');
?>
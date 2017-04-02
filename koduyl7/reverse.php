<?php
//Esimene
$t = 'qwerty';
$temp = '';
for ($i = 0, $length = mb_strlen($t); $i < $length; $i++) {
    $temp .= $t{$length - $i - 1};
}
echo "<br>Esimene variant";
echo '<br/>';
var_dump($temp);

//Teine
$st = 'peegel';
for ($i = 0, $length = mb_strlen($st); $i < $length; $i++) {
    $st = $st{$i}.mb_substr($st,0,$i).mb_substr($st,$i+1);
}
echo "<br>Teine variant";
echo '<br/>';
var_dump($st);

//Kolmas
echo "<br>Kolmas variant";
echo '<br/>';
$str = 'TereTulemast';
for($i=1; $i <= strlen($str); $i++) {
    echo substr($str, $i*-1, 1);
}
?>

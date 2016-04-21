<?php
$row = 8;
$column = 8;
 echo '<table>';
for($i = 0; $i < 8; $i++){
    echo '<tr>';
    for($x = 0; $x < 8; $x++){
        echo '<td id="'.$i.'x'.$x.'"></td>';
    }
    echo '</tr>';
}
echo '</table>';
?>

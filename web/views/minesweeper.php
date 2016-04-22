<?php
$tableGrid =  '<p id="title">Minesweeper</p><br>';
$tableGrid .=  '<table border="1" width="300px" height="300px">';
for($i = 1; $i < 9; $i++){
    $tableGrid .= '<tr>';
    for($x = 1; $x < 9; $x++){
        if($i == 3 && $x == 6){
            $class = "lost";
        }
        else{
            $class = "empty";
        }
        $tableGrid .= '<td class="'.$class.'" id="cell-'.$i.'x'.$x.'" onclick="load(this.id)"></td>';
    }
    $tableGrid .= '</tr>';
}
$tableGrid .= '</table>';

echo $tableGrid;

?>
<script>
    function load(cellId){
        var cellAttr = document.getElementById(cellId);

        if (cellAttr.className == "lost") {
            cellAttr.style.backgroundColor = "red";
        }      
    }
</script>

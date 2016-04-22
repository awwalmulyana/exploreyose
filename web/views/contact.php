<?php
$arr =  array("alive"  => true  );

echo json_encode($arr['alive']);

?>
<html>
    <a id="contact-me-link" href="#">Contact me</a>
</html>
<script>
    function load(cellId){
        var cellAttr = document.getElementById(cellId);

        if (cellAttr.className == "lost") {
            cellAttr.style.backgroundColor = "red";
        }
    }
</script>

<?php
    parse_str($_POST['formdata'],$formdata);
    $a = $formdata["program"];
    echo $a;
?>
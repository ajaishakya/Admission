<?php
    include 'class.php';
    $user = new User();

    parse_str($_POST['formdata'],$formdata);
    $program = $formdata["program"];
    $user_id = $_POST['uid'];

    $result = $user->get_program($user_id,$program);

    if($result==1)
    {
        echo "Success";
    }
    else
    {
        echo "Error while connection to database.";
    }
?>
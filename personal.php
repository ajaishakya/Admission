<?php
    include 'class.php';
    $user = new User();

    parse_str($_POST['formdata'],$formdata);
    $user_id = $_POST['uid'];

    $result = $user->get_personal($user_id, $formdata);

    if($result==1)
    {
        echo "Success";
    }
    else
    {
        echo "Error while connection to database.";
    }
?>
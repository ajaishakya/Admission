<?php
    include 'class.php';
    $user = new User();

    parse_str($_POST['formdata'],$formdata);
    $user_id = $_POST['uid'];
    $data = $formdata['careerobj'];

    $result = $user->get_obj($user_id, $data);

    if($result==1)
    {
        echo "Success";
    }
    else
    {
        echo "Error while connection to database.";
    }
?>
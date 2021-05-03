<?php
    include 'class.php';
    $user = new User();

    parse_str($_POST['formdata'],$formdata);
    $user_id = $_POST['uid'];
    $declaration = $formdata['declaration'];
    
    $result = $user->get_declaration($user_id, $declaration);

    if($result==1)
    {
        echo "Success";
    }
    else
    {
        echo "Error while connection to database.";
    }
?>
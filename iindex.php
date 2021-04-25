<?php
    include 'class.php';
    $user = new User();

    if(isset($_POST["submit1"]))
    {
        $register = $user->reg_user($_POST);
        if($register==1)
        {
            echo "<p>Please check your mail for the password and to verify your Account(IF not also check in SPAM mail).</p>";
        }
        else
        {
            echo"<p>Database Error, Please Contact Administration.</p>";
        }
    }

    // if(isset($_POST["submit2"]))
    // {
    //     $user->check_login($_POST);
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | MBA Admission</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="resource/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="resource/style.css"/>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" >
        <div class="xl-gap"></div>
        <div class="row myrow ">
            <div class="col-lg-2"></div>
            <div class="col-lg-4 reg_container bg-light">
                <div class="reg_header">
                    <h3>Step 1 : Registration</h3>
                </div>
                <div style="min-height:500px;" class="d-flex justify-content-center mt-5" >
                    <div style="width:280px;">
                        <form action="" method="POST" id="register">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="first_name" autocomplete="on" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="last_name" autocomplete="on" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control form-control-sm" name="mobile" autocomplete="on" placeholder="Mobile Number" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-sm" name="email" autocomplete="on" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-sm" name="uremail" autocomplete="on" placeholder="Re-type Email" required>
                            </div>
                            <div class="form-group">
                                <select name="gender"class="form-control form-control-sm">
                                    <option value="" disabled selected>Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-sm" name="dob" autocomplete="off" placeholder="Born on" required>
                            </div>
                             <input type="hidden" id="sid" name="session_id" value="1">
                            <div class="form-group text-center">
                                <input type="submit" value="Register" name="submit1">
                            </div>
                        </form>
                        <div class="text-center">Click <a href="https://mbainterview.apexcollege.edu.np">here</a> to fill MBA Interview Form.</div>
                        <img src="resource/logo.png" class="mt-3">
                    </div>
                </div>
                <div class="xl-gap"></div>

            </div>

            <div class="col-lg-4 reg_container bg-light">
                <div class="reg_header">
                    <h3>Step 2 : Sign In</h3>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <div style="width:280px;">
                        <form method="POST" action="" >
                            <div class="form-group">
                                <input type="email" class="form-control form-control-sm" name="email" autocomplete="on" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-sm" name="password" autocomplete="on" placeholder="Password" required>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Login" name="submit2">
                            </div>
                        </form>
                        <div class="text-center">
                            <img class="img-logo" src="resource/MBAmorning.png">
                            <img class="img-logo ml-4" src="resource/MBAevening.png">
                        </div>
                        <div class="text-center mt-5">Click <a href="https://mbainterview.apexcollege.edu.np">here</a> to fill MBA Interview Form.</div>
                        <div class="text-center mt-2">Click <a href="https://admissions.apexcollege.edu.np/">here</a> to fill MBA Interview Form.</div>
                        <img src="resource/logo.png" class="mt-4">
                    </div>
                </div>
            </div>
        </div>
        <div class="xl-gap"></div>
        <div class="xl-gap"></div>
    </div>

</body>
</html>

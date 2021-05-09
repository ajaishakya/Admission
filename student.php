<?php
    session_start();
    $user_id = $_SESSION["email"];
    $user_mail = $_SESSION['email'];

    if(!isset($user_id))
    {
        header("location:iindex.php");
    }

    include 'class.php';
    $user = new User();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form | MBA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="link_color.js"></script>
    <style>
        a
        {
            color:black;
        }
        a:hover
        {
            color:black;
        }

    </style>
</head>

<?php
$dec = $user->check_declaration($user_id,'student_program');
$per = $user->check_update($user_id,'personal_info');
$padd = $user->check_add($user_id, 'address');
$tadd = $user->check_adds($user_id, 'address');
$f = $user->check_family($user_id, 'family');
$m = $user->check_mfamily($user_id, 'family');
$lg = $user->check_lgfamily($user_id, 'family');
$ug = $user->check_ugacademics($user_id, 'academic');
$p2 = $user->check_p2academics($user_id, 'academic');
$slc = $user->check_slcacademics($user_id, 'academic');
$opt = $user->check_optacademics($user_id, 'academic');
$f1w = $user->check_f1w($user_id, 'work');
$f2w = $user->check_f2w($user_id, 'work');
$f3w = $user->check_f3w($user_id, 'work');
$f4w = $user->check_f4w($user_id, 'work');
$p1w = $user->check_p1w($user_id, 'work');
$p2w = $user->check_p2w($user_id, 'work');
$p3w = $user->check_p3w($user_id, 'work');
$p4w = $user->check_p4w($user_id, 'work');
$arr= $user->check_boxes($user_id, 'work_other');
$ach1 = $user->check_ach1($user_id, 'ach_data');
$ach2 = $user->check_ach2($user_id, 'ach_data');
$ach3 = $user->check_ach3($user_id, 'ach_data');
$object = $user->check_objective($user_id, 'objective');
?>

<body>
<!-- Header -->
    <div style="height:100px" class="bg-dark d-flex align-items-center">
        <div class="container-fluid"  style="width:1230px;">
            <div class="row">
                <div class="col">
                    <img src="resource/logo.png">
                </div>
                <div class="col d-flex align-items-center justify-content-end">
                    <div class="text-white"> 
                        Logged in as <?=$user_id?> | <a href="home.php" class="btn btn-sm" style="background-color:rgb(115, 15, 14);color:lightgrey;">Logout</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Body -->
    <div class="container-fluid d-flex justify-content-center">
        <div class="row bg-light mt-4 mb-4 shadow-lg" style="min-height:500px; width:1200px;">
            <div class="col-3" style="border-right:1px solid lightgrey" >
                  <!-- Nav tabs --> 
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item"><a id="cwelcome" data-toggle="tab" class="nav-link active" href="#welcome">Welcome</a></li>
                    <li class="nav-item"><a id="cchoose" data-toggle="tab" class="nav-link" href="#choose">Choose Program</a></li>
                    <li class="nav-item"><a id="cpersonal" data-toggle="tab" class="nav-link" href="#personal">Personal Information</a></li>
                    <li class="nav-item"><a id="caddress" data-toggle="tab" class="nav-link" href="#address">Address Information</a></li>
                    <li class="nav-item"><a id="cfamily" data-toggle="tab" class="nav-link" href="#family">Family Details</a></li>
                    <li class="nav-item"><a id="cacademic" data-toggle="tab" class="nav-link" href="#academic">Academic Information</a></li>
                    <li class="nav-item"><a id="cwork" data-toggle="tab" class="nav-link" href="#work">Work and other Professional Experiences</a></li>
                    <li class="nav-item"><a id="cachievements" data-toggle="tab" class="nav-link" href="#achievements">Achievements</a></li>
                    <li class="nav-item"><a id="ccareer" data-toggle="tab" class="nav-link" href="#career">Statement of purpose</a></li>
                    <li class="nav-item"><a id="cdecleration" data-toggle="tab" class="nav-link" href="#decleration">Declaration</a></li>
                </ul>
            </div>

            <div class="col">
                 <!-- Tab panes -->
                <div class="tab-content">
                    <div id="welcome" class="container tab-pane active"><br>
                        <h3>Online Admissions Application Instructions</h3>
                        <p>Welcome to Apex College's online application for Graduate Admission. We are happy for your interest for pursuing higher 
                        education at Apex, and it is our goal to make the admission process as quick and easy as possible. As you begin your 
                        application, there are a few things you should know about the online application process.</p>

                        <ul>
                        <li>Once you log in with your new account, you will receive an Email with password for your new Apex admission account in your E-mail ID.</li>
                        <li>There are some boxes where you are required to fill up the required information. Your failure to fill up the boxes will result into error.</li>
                        <li>If you have to leave your application without completing, you may save it on our server by clicking the "Save" button at the bottom of each page. You can later view or edit your application.</li>
                        <li>When you are done with your online application, you must click the "Save" button at the bottom of the page.</li>
                        <li>After submission of online application, you need to submit following documents at Apex Admission Council for verification and documentation before deadline date.</li>
                            <ul>
                                <li>Two passport size photos.</li>
                                <li>Photocopy of Mark sheet of SLC</li>
                                <li>Photocopy of Character Certificate of SLC</li>
                                <li>Photocopy of Transcript of + 2</li>
                                <li>Photocopy of Character Certificate of +2</li>
                                <li>Photocopy of Transcript of Bachelor's Degree or grade sheets/mark sheets of all years/semesters</li>
                                <li>Photocopy of Character Certificate of Bachelor's Degree</li>
                                <li>Photocopy of Citizenship</li>
                            </ul>
                        </ul>
                        <br>
                        <p>Our Admission Officer will clarify all the application process by phone, or by Email.<br>
                        Please contact us at:<a href="admissions@apexcollege.edu.np"> admissions@apexcollege.edu.np</a> or 01-4467922, 01-2278841.</p>
                    </div>

                    <div id="choose" class="container tab-pane"><br>
                        <h3>Program Applied For:</h3>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <form action="" method="post" id='form_program'>
                                    <input type="radio" name="program" value="MBA" <?php if($dec["program"]=="MBA"){echo "checked";} ?> required>
                                    <label for="">MBA</label>
                                    <br>
                                    <input type="radio"  name="program" value="MBAE" <?php if($dec["program"]=="MBAE"){echo "checked";} ?> required>
                                    <label for="">MBA-Evening</label>
                                    <br>
                                    <input type="submit" value="Save" name="submitmba" class="btn btn-bg text-white mt-4" style="background-color:rgb(115, 15, 14);">
                                </form>
                            </div>
                            <div class="col">To veiw the FAQ, click <a target="_blank" href="http://mba.apexcollege.edu.np/pdf/MBA_Admission_FAQ.pdf" style="color:blue;" >here</a></div>
                        </div>
                    </div>

                    <div id="personal" class="container tab-pane"><br>
                        <h3>Personal Information:</h3>
                        <hr>
                        <form action="" method="POST" id="form_personal">
                            <div class="row">
                                <div class="col offset-2"> 
                                    <input type="radio" name='initial' value="Mr" required <?php if($per['initial']=='Mr') {echo 'checked';} ?>>
                                    <label for="">Mr.</label>
                                    <input type="radio" name='initial' value="Ms" required <?php if($per['initial']=='Ms') {echo 'checked';} ?>>
                                    <label for="">Ms.</label>
                                    <input type="radio" name='initial' value="Mrs" required <?php if($per['initial']=='Mrs') {echo 'checked';} ?>>
                                    <label for="">Mrs.</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-2"><label for="">Name:</label></div>
                                <div class="col"><input type="text" name="st_lname" required value="<?=$per["st_lname"]?>" placeholder="Last" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="st_fname" required value="<?=$per["st_fname"]?>" placeholder="First" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="st_mname" value="<?=$per["st_mname"]?>" placeholder="Middle" class="form-control form-control-sm"></div>
                            </div>

                            <div class="form-row">
                                <div class="col-2"><label for="">Date of Birth:</label></div>
                                <div class="col-4"><input type="date" name="dob" required value="<?=$per["dob"]?>" class="form-control form-control-sm"></div>
                            </div>

                            <div class="form-row">
                                <div class="col-2"><label for="">Gender:</label></div>
                                <div class="col">
                                    <input type="radio" name="gender" value="male" required <?php if($per['gender']=='male') {echo 'checked';} ?>>
                                    <label for="">Male</label>
                                    <input type="radio" name="gender" value="female" required <?php if($per['gender']=='female') {echo 'checked';} ?>>
                                    <label for="">Female</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-2"><label for="">Marital Status:</label></div>
                                <div class="col">
                                    <input type="radio" name="status" required <?php if($per['status']=='married') {echo 'checked';} ?> value="married" >
                                    <label for="">Married</label>
                                    <input type="radio" name="status" required <?php if($per['status']=='single') {echo 'checked';} ?> value="single" >
                                    <label for="">Single</label>
                                </div>
                            </div>

                             <div class="form-row">
                                <div class="col-2"><label for="">Citizenship:</label></div>
                                <div class="col"><input type="text" required value="<?=$per["citizenship"]?>" name="citizenship" placeholder="Citizenship" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" required value="<?=$per["issuing_district"]?>" name="issuing_district" placeholder="Issuing District" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" required value="<?=$per["citizenship_no"]?>" name="citizenship_no" placeholder="Citizenship No." class="form-control form-control-sm"></div>
                            </div>

                            <div class="form-row">
                                <div class="col-2"><label for="">Telephone No:</label></div>
                                <div class="col-4"><input type="number" required value="<?=$per["telephone"]?>" name="telephone" placeholder="Telephone" class="form-control form-control-sm"></div>
                            </div>

                            <div class="form-row">
                                <div class="col-2"><label for="">Cell No:</label></div>
                                <div class="col-4"><input type="number" required value="<?=$per["mobile"]?>" name="mobile" placeholder="Mobile" class="form-control form-control-sm"></div>
                            </div>

                            <div class="form-row">
                                <div class="col-2"><label for="">Email:</label></div>
                                <div class="col-4"><input type="email" required value="<?=$per["email"]?>" name="email" placeholder="Email" class="form-control form-control-sm"></div>
                            </div>

                            <div class="row">
                                <div class="col offset-2"><p>Have you ever been suspended, expelled or placed on probation at any School or University for academic or disciplinary reasons?</p></div>
                            </div>

                            <div class="form-row">
                                 <div class="col offset-2">
                                    <input type="radio" name='expel_flag' value="1" required <?php if($per['expel_flag']=='1') {echo 'checked';} ?>>
                                    <label for="">Yes</label>
                                    <input type="radio" name='expel_flag' value="0" required <?php if($per['expel_flag']=='0') {echo 'checked';} ?>>
                                    <label for="">No</label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-2">If Yes, Please explain</div>
                                <div class="col"><textarea name="expel_reason" class="form-control"><?=$per["expel_reason"]?></textarea></div>
                            </div>

                            <input type="submit" value="Save" name="submit-personal" class="btn btn-bg text-white mt-4 mb-4" style="background-color:rgb(115, 15, 14);">
                        </form>
                    </div>

                    <div id="address" class="container tab-pane"><br>
                        <form action="" method="post" id="form_address">
                            <h4>Permanent Address:</h4>
                            <hr>
                            <div class="row form-group">
                                <div class="col"><input type="text" required value="<?=$padd["ward"]?>" name="ward" placeholder="Ward" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" required value="<?=$padd["place"]?>" name="place" placeholder="Place" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" required value="<?=$padd["city"]?>" name="city" placeholder="City" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" required value="<?=$padd["vdc"]?>" name="vdc" placeholder="VDC/Municipality" class="form-control form-control-sm"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col"><input type="text" required value="<?=$padd["district"]?>" name="district" placeholder="District" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" required value="<?=$padd["phone"]?>" name="phone" placeholder="Phone" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" required value="<?=$padd["cell"]?>" name="cell" placeholder="Cell" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" required value="<?=$padd["fax"]?>" name="fax" placeholder="Fax" class="form-control form-control-sm"></div>
                            </div>
                            <p><input type="checkbox" name="mycheckaddress" value="mycheckaddress"> Check here, If you want to include Local Address</p>

                            <h4>Temporary Address: (Only if different from your permanent address)</h4>
                            <hr>
                            <div class="row form-group">
                                <div class="col"><input type="text" value="<?=$tadd["ward"]?>" name="lward" placeholder="Ward" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" value="<?=$tadd["place"]?>" name="lplace" placeholder="Place" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" value="<?=$tadd["city"]?>" name="lcity" placeholder="City" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" value="<?=$tadd["vdc"]?>" name="lvdc" placeholder="VDC/Municipality" class="form-control form-control-sm"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col"><input type="text" value="<?=$tadd["district"]?>" name="ldistrict" placeholder="District" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" value="<?=$tadd["phone"]?>" name="lphone" placeholder="Phone" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" value="<?=$tadd["cell"]?>" name="lcell" placeholder="Cell" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" value="<?=$tadd["fax"]?>" name="lfax" placeholder="Fax" class="form-control form-control-sm"></div>
                            </div>
                            <input type="submit" name="submit_address" value="Save" class="btn btn-bg text-white mt-4" style="background-color:rgb(115, 15, 14);">
                        </form>
                    </div>

                    <div id="family" class="container tab-pane"><br>
                        <form action="" method="post" id="form_family">
                            <h3>Family Details</h3>
                            <hr>
                            <h4>Father's Information</h4><br>
                            <div class="row form-group">
                                <div class="col-4"><input class="form-control form-control-sm" required value="<?=$f["name"]?>" type="text" name="fname" placeholder="Father's Name"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$f["profession"]?>" type="text" name="fprofession" placeholder="Profession"></div>
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$f["employer"]?>" type="text" name="femployer" placeholder="Employer"></div>
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$f["email"]?>" type="email" name="femail" placeholder="Email"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$f["phone"]?>" type="number" name='fphone' placeholder="Phone"></div>
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$f["cell"]?>" type="number" name='fcell' placeholder="Cell"></div>
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$f["fax"]?>" type="text" name='ffax' placeholder="Fax"></div>
                            </div>

                            <h4>Mother's Information</h4><br>
                            <div class="row form-group">
                                <div class="col-4"><input class="form-control form-control-sm" required value="<?=$m["name"]?>" type="text" name="mname" placeholder="Mother's Name"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$m["profession"]?>" type="text" name="mprofession" placeholder="Profession"></div>
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$m["employer"]?>" type="text" name="memployer" placeholder="Employer"></div>
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$m["email"]?>" type="email" name="memail" placeholder="Email"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$m["phone"]?>" type="number" name='mphone' placeholder="Phone"></div>
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$m["cell"]?>" type="number" name='mcell' placeholder="Cell"></div>
                                <div class="col"><input class="form-control form-control-sm" required value="<?=$m["fax"]?>" type="text" name='mfax' placeholder="Fax"></div>
                            </div>
                            <p><input type="checkbox" name="checkfamily" value="checkfamily"> Check here if you want to include Local Guardian information</p>

                            <h4>Local Guardian Information</h4><br>
                            <div class="row form-group">
                                <div class="col-4"><input class="form-control form-control-sm" value="<?=$lg["name"]?>" type="text" name="lname" placeholder="Name"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" value="<?=$lg["profession"]?>" type="text" name="lprofession" placeholder="Profession"></div>
                                <div class="col"><input class="form-control form-control-sm" value="<?=$lg["employer"]?>" type="text" name="lemployer" placeholder="Employer"></div>
                                <div class="col"><input class="form-control form-control-sm" value="<?=$lg["email"]?>" type="email" name="lemail" placeholder="Email"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" value="<?=$lg["phone"]?>" type="number" name='lphone' placeholder="Phone"></div>
                                <div class="col"><input class="form-control form-control-sm" value="<?=$lg["cell"]?>" type="number" name='lcell' placeholder="Cell"></div>
                                <div class="col"><input class="form-control form-control-sm" value="<?=$lg["fax"]?>" type="text" name='lfax' placeholder="Fax"></div>
                            </div>

                            <input type="hidden" id="familyupstat" value="">
                            <input type="submit" value="Save" name="submit_family" class="btn btn-bg text-white mt-3 mb-4" style="background-color:rgb(115, 15, 14);">
                        </form>
                    </div>

                    <div id="academic" class="container tab-pane"><br>
                        <form action="" method="post" id="form_academic">
                            <h3>Undergraduate Degree</h3>
                            <hr>
                            <table>
                                <tr>
                                    <td>Degree/Diploma Awarded</td>
                                    <td><input type="text" value="<?=$ug["degree"]?>" name="degree1" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Percentage/CGPA Obtained</td>
                                    <td><input type="text" value="<?=$ug["percentage"]?>" name="percentage1" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Area of Specialization</br>(Concentration)</td>
                                    <td><input type="text" value="<?=$ug["specialization"]?>" name="specialization1" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Name of College</td>
                                    <td><input type="text" value="<?=$ug["college"]?>" name="college1" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Name of Board/University</td>
                                    <td><input type="text" value="<?=$ug["board"]?>" name="board1" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Year of Enrollment</td>
                                    <td><input type="text" value="<?=$ug["start_year"]?>" name="start_year1" required class="form-control form-control-sm"></td>
                                    <td>Year of Completion</td>
                                    <td><input type="text" value="<?=$ug["end_year"]?>" name="end_year1" required class="form-control form-control-sm"></td>
                                </tr>
                            </table>

                            <h3 class="mt-3">10+2 or Equivalent</h3>
                            <hr>
                            <table>
                                <tr>
                                    <td>Degree/Diploma Awarded</td>
                                    <td><input type="text" value="<?=$p2["degree"]?>" name="degree2" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Percentage/CGPA Obtained</td>
                                    <td><input type="text" value="<?=$p2["percentage"]?>" name="percentage2" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Stream</td>
                                    <td><input type="text" value="<?=$p2["specialization"]?>" name="specialization2" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Name of School/College</td>
                                    <td><input type="text" value="<?=$p2["college"]?>" name="college2" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Name of Board/University</td>
                                    <td><input type="text" value="<?=$p2["board"]?>" name="board2" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Year of Enrollment</td>
                                    <td><input type="text" value="<?=$p2["start_year"]?>" name="start_year2" required class="form-control form-control-sm"></td>
                                    <td>Year of Completion</td>
                                    <td><input type="text" value="<?=$p2["end_year"]?>" name="end_year2" required class="form-control form-control-sm"></td>
                                </tr>
                            </table>

                            <h3 class="mt-3">SLC or Equivalent</h3>
                            <hr>
                            <table>
                                <tr>
                                    <td>Degree/Diploma Awarded</td>
                                    <td><input type="text" value="<?=$slc["degree"]?>" name="degree3" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Percentage/CGPA Obtained</td>
                                    <td><input type="text" value="<?=$slc["percentage"]?>" name="percentage3" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Name of School</td>
                                    <td><input type="text" value="<?=$slc["college"]?>" name="college3" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Name of Board</td>
                                    <td><input type="text" value="<?=$slc["board"]?>" name="board3" required class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Year of Enrollment</td>
                                    <td><input type="text" value="<?=$slc["start_year"]?>" name="start_year3" required class="form-control form-control-sm"></td>
                                    <td>Year of Completion</td>
                                    <td><input type="text" value="<?=$slc["end_year"]?>" name="end_year3" required class="form-control form-control-sm"></td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="checkbox" name="checkacademic" value="checkacademic"> Check here if you want to enter other information.</p>

                            <h3 class="mt-3">Others</h3>
                            <hr>
                            <table>
                                <tr>
                                    <td>Degree/Diploma Awarded</td>
                                    <td><input type="text" value="<?=$opt["degree"]?>" name="degree4" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Percentage/CGPA Obtained</td>
                                    <td><input type="text" value="<?=$opt["percentage"]?>" name="percentage4" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Stream</td>
                                    <td><input type="text" value="<?=$opt["specialization"]?>" name="specialization4" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Name of School/College</td>
                                    <td><input type="text" value="<?=$opt["college"]?>" name="college4" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Name of Institution Attended </br>(Board University)</td>
                                    <td><input type="text" value="<?=$opt["board"]?>" name="board4" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td>Year of Enrollment</td>
                                    <td><input type="text" value="<?=$opt["start_year"]?>" name="start_year4" class="form-control form-control-sm"></td>
                                    <td>Year of Completion</td>
                                    <td><input type="text" value="<?=$opt["end_year"]?>" name="end_year4" class="form-control form-control-sm"></td>
                                </tr>
                            </table>
                            <input type="submit" name="submitacademics" value="Save" class="btn btn-bg text-white mt-4 mb-4" style="background-color:rgb(115, 15, 14);">
                        </form>
                    </div>

                    <div id="work" class="container tab-pane"><br>
                        <form action="" method="POST" id="form_work">
                            <h4><u>1. Full time work experience</u></h4>
                            <table class="table table-bordered table-sm text-center mt-4 mb-4">
                                <tr>
                                    <th rowspan="2">Organization</th>
                                    <th colspan="2">Date Attended</th>
                                    <th rowspan="2">Job title</th>
                                    <th rowspan="2">Job description</th>
                                </tr>
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                </tr>
                                <tr>
                                    <td><input type="text" value="<?=$f1w["organization"]?>" name="forg1" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$f1w["start"]?>" name="ffrom1" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$f1w["end"]?>" name="fto1" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$f1w["title"]?>" name="fjob1" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$f1w["description"]?>" name="fdes1" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" value="<?=$f2w["organization"]?>" name="forg2" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$f2w["start"]?>" name="ffrom2" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$f2w["end"]?>" name="fto2" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$f2w["title"]?>" name="fjob2" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$f2w["description"]?>" name="fdes2" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" value="<?=$f3w["organization"]?>" name="forg3" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$f3w["start"]?>" name="ffrom3" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$f3w["end"]?>" name="fto3" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$f3w["title"]?>" name="fjob3" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$f3w["description"]?>" name="fdes3" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" value="<?=$f4w["organization"]?>" name="forg4" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$f4w["start"]?>" name="ffrom4" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$f4w["end"]?>" name="fto4" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$f4w["title"]?>" name="fjob4" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$f4w["description"]?>" name="fdes4" class="form-control form-control-sm"></td>
                                </tr>
                            </table>

                            <h4><u>2. Part time/Internship experience</u></h4>
                            <table class="table table-bordered table-sm text-center mt-4 mb-4">
                                <tr>
                                    <th rowspan="2">Organization</th>
                                    <th colspan="2">Date Attended</th>
                                    <th rowspan="2">Job title</th>
                                    <th rowspan="2">Job description</th>
                                </tr>
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                </tr>
                                <tr>
                                    <td><input type="text" value="<?=$p1w["organization"]?>" name="porg1" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$p1w["start"]?>" name="pfrom1" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$p1w["end"]?>" name="pto1" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$p1w["title"]?>" name="pjob1" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$p1w["description"]?>" name="pdes1" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" value="<?=$p2w["organization"]?>" name="porg2" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$p2w["start"]?>" name="pfrom2" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$p2w["end"]?>" name="pto2" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$p2w["title"]?>" name="pjob2" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$p2w["description"]?>" name="pdes2" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" value="<?=$p3w["organization"]?>" name="porg3" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$p3w["start"]?>" name="pfrom3" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$p3w["end"]?>" name="pto3" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$p3w["title"]?>" name="pjob3" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$p3w["description"]?>" name="pdes3" class="form-control form-control-sm"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" value="<?=$p4w["organization"]?>" name="porg4" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$p4w["start"]?>" name="pfrom4" class="form-control form-control-sm"></td>
                                    <td><input type="date" value="<?=$p4w["end"]?>" name="pto4" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$p4w["title"]?>" name="pjob4" class="form-control form-control-sm"></td>
                                    <td><input type="text" value="<?=$p4w["description"]?>" name="pdes4" class="form-control form-control-sm"></td>
                                </tr>
                                 
                            </table>

                            <p>How do you know about Apex College and its Programs?</p>
                            <p>
                                <input type="checkbox"  name="check_list[]" value="1"> Apex Student &nbsp
                                <input type="checkbox"  name="check_list[]" value="2"> Apex Faculty  &nbsp
                                <input type="checkbox"  name="check_list[]" value="3"> Apex Staff &nbsp
                                <input type="checkbox"  name="check_list[]" value="4"> Apex Alumni &nbsp
                                <input type="checkbox"  name="check_list[]" value="5"> Advertisement
                            </p>
                            <p>
                                <input type="checkbox"  name="check_list[]" value="6"> Apex Website 
                                <input type="checkbox"  name="check_list[]" value="7" id="other" class="mb-4"> Others (Please Specify)
                                <input type="text" name='specify' id="spec" style="display:none">
                                <script>
                                    $(document).ready(function(){
                                        $('#other').click(function () {
                                          $('#spec').toggle(); 
                                        });
                                    });
                                </script>
                            </p>

                            <p>Why do you want to pursue MBA/MBA Evening Program?</p>
                            <textarea id="whyMBA" name="pursue" required class="form-control"><?=$arr["pursue"]?></textarea>

                            <input type="submit" name="submitwork" value="Save" class="btn btn-bg text-white mt-4 mb-4" style="background-color:rgb(115, 15, 14);"> 
                        </form>
                    </div>

                    <div id="achievements" class="container tab-pane"><br>
                        <form action="" method="post" id="form_ach">
                            <h6>Describe your major involvements / achievements in extra-curricular activities.</br>Note: Activity is mandatory.</h6>
                            <p>1</p>
                            <table class="table table-bordered table-sm text-center">
                                <tr>
                                    <th>Activity</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                    <th>Responsibility</th>
                                </tr>
                                <tr>
                                    <td><textarea required  name="act1" class="form-control"> <?=$ach1["activity"]?> </textarea></td>
                                    <td><textarea required name="role1" class="form-control"> <?=$ach1["role"]?> </textarea></td>
                                    <td><input    required value="<?=$ach1["date"]?>" name="date1" type="date" class="form-control form-control-sm"></td>
                                    <td><textarea required  name="respon1" class="form-control"> <?=$ach1["responsibility"]?> </textarea></td>
                                </tr>
                            </table>

                            <p>2</p>
                            <table class="table table-bordered table-sm text-center">
                                <tr>
                                    <th>Activity</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                    <th>Responsibility</th>
                                </tr>
                                <tr>
                                    <td><textarea name="act2" class="form-control"> <?=$ach2["activity"]?> </textarea></td>
                                    <td><textarea  name="role2" class="form-control"> <?=$ach2["role"]?> </textarea></td>
                                    <td><input    value="<?=$ach2["date"]?>" name="date2" type="date" class="form-control form-control-sm"></td>
                                    <td><textarea  name="respon2" class="form-control"> <?=$ach2["responsibility"]?> </textarea></td>
                                </tr>
                            </table>

                            <p>3</p>
                            <table class="table table-bordered table-sm text-center">
                                <tr>
                                    <th>Activity</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                    <th>Responsibility</th>
                                </tr>
                                <tr>
                                    <td><textarea name="act3" class="form-control"> <?=$ach3["activity"]?> </textarea></td>
                                    <td><textarea name="role3" class="form-control"> <?=$ach3["role"]?> </textarea></td>
                                    <td><input    value="<?=$ach3["date"]?>" name="date3" type="date" class="form-control form-control-sm"></td>
                                    <td><textarea  name="respon3" class="form-control"> <?=$ach3["responsibility"]?> </textarea></td>
                                </tr>
                            </table>
                            <input type="submit" name="" value="Save" class="btn btn-bg text-white mt-3 mb-4" style="background-color:rgb(115, 15, 14);">
                        </form>
                    </div>

                    <div id="career" class="container tab-pane"><br>
                        <p>Write a brief summary about your statement of purpose in your own words in about 200 words. 
                        Also mention how your education at APEX would help you achieve your statement of purpose.</p>
                        <form action="" method="post" id="form_obj">
                            <textarea name="careerobj" class="form-control" required rows="13"><?=$object["data"]?></textarea>
                            <input type="submit" name="submitobj" value="Save" class="btn btn-bg text-white mt-4 mb-4" style="background-color:rgb(115, 15, 14);">
                        </form>
                    </div>

                    <div id="decleration" class="container tab-pane"><br>
                        <h4>Declaration</h4>
                        <hr>
                        <ul>
                            <li type="1">I hereby declare that the information provided by me is true and correct.</li>
                            <li type="1">I would submit all the necessary documents required by the College and the University within the given deadline.</li>
                            <li type="1">I have read, understood and agree to be bound by the rules of the College and the University.</li>
                            <li type="1">I also agree to abide by the payment schedule.</li>
                            <li type="1">I hereby also give an undertaking that I will not participate in or originate any activities prejudicial to the interests of the College and the University.</li>
                            <li type="1">Once issued, application form is not refundable or transferable.</li>
                        </ul>

                        <form action="" method="post" id="form_declaration">
                            <input type="radio" name="declaration" value="1" required <?php if($dec["declaration"]=="1"){echo "checked";} ?>> I agree &nbsp
                            <input type="radio" name="declaration" value="0" required <?php if($dec["declaration"]=="0"){echo "checked";} ?>> I disagree
                            <br>
                            <input type="submit"  name="declaration1" value="Submit" class="btn btn-bg text-white mt-4 mb-4" style="background-color:rgb(115, 15, 14);">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<!-- Footer -->
    <div style="height:100px" class="bg-dark d-flex justify-content-center align-items-center">
        <div class="text-center text-white " >
            © Copyright 2017. All Rights Reserved.<br>Apex College
        </div>
    </div>
    
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Important</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                Please complete the form with all the required information. Please click save button in every form.
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
              </div>

            </div>
        </div>
    </div>

</body> 

    <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>

    <!-- Choose Program -->
    <script>
        $(document).ready(function(){
            $("#form_program").submit(function(e){
                e.preventDefault();

                alert("Please Wait");
                $.ajax({
                    type: 'POST',
                    url: "program.php",
                    data: {formdata : $('#form_program').serialize(), uid :'<?=$user_id?>'},
                    success: function(data){
                        alert(data);
                    }
                });
            });
        });
    </script>

    <!-- Personal Information -->
    <script>
        $(document).ready(function(){
            $("#form_personal").submit(function(e){
                e.preventDefault();

                alert("Please Wait");
                $.ajax({
                    type: 'POST',
                    url: "personal.php",
                    data: {formdata : $('#form_personal').serialize(), uid : '<?= $user_id?>'},
                    success: function(data){
                        alert(data);
                    }
                });
            });
        });
    </script>

    <!-- Address Information -->
    <script>
        $(document).ready(function(){
            $("#form_address").submit(function(e){
                e.preventDefault();

                alert("Please Wait");
                $.ajax({
                    type: 'POST',
                    url: "address.php",
                    data: {formdata : $('#form_address').serialize(), uid : '<?= $user_id?>'},
                    success: function(data){
                        alert(data);
                    }
                });
            });
        });
    </script>

    <!-- Family Details -->
    <script>
        $(document).ready(function(){
            $("#form_family").submit(function(e){
                e.preventDefault();

                alert("Please Wait");
                $.ajax({
                    type: 'POST',
                    url: "family.php",
                    data: {formdata : $('#form_family').serialize(), uid : '<?= $user_id?>'},
                    success: function(data){
                        alert(data);
                    }
                });
            });
        });
    </script>

     <!-- Academic Information -->
    <script>
        $(document).ready(function(){
            $("#form_academic").submit(function(e){
                e.preventDefault();

                alert("Please Wait");
                $.ajax({
                    type: 'POST',
                    url: "academic.php",
                    data: {formdata : $('#form_academic').serialize(), uid : '<?= $user_id?>'},
                    success: function(data){
                        alert(data);
                    }
                });
            });
        });
    </script>

    <!-- Work and Other Professional Experiences -->
    <script>
        $(document).ready(function(){
            $("#form_work").submit(function(e){
                e.preventDefault();

                alert("Please Wait");
                $.ajax({
                    type: 'POST',
                    url: "work.php",
                    data: {formdata : $('#form_work').serialize(), uid : '<?= $user_id?>'},
                    success: function(data){
                        alert(data);
                    }
                });
            });
        });
    </script>

    <!-- Achievements -->
    <script>
        $(document).ready(function(){
            $("#form_ach").submit(function(e){
                e.preventDefault();

                alert("Please Wait");
                $.ajax({
                    type: 'POST',
                    url: "ach.php",
                    data: {formdata : $('#form_ach').serialize(), uid : '<?= $user_id?>'},
                    success: function(data){
                        alert(data);
                    }
                });
            });
        });
    </script>

    <!-- Statement of Purpose -->
    <script>
        $(document).ready(function(){
            $("#form_obj").submit(function(e){
                e.preventDefault();

                alert("Please Wait");
                $.ajax({
                    type: 'POST',
                    url: "objective.php",
                    data: {formdata : $('#form_obj').serialize(), uid : '<?= $user_id?>'},
                    success: function(data){
                        alert(data);
                    }
                });
            });
        });
    </script>

    <!-- Decleration -->
    <script>
        $(document).ready(function(){
            $("#form_declaration").submit(function(e){
                e.preventDefault();

                alert("Please Wait");
                $.ajax({
                    type: 'POST',
                    url: "declaration.php",
                    data: {formdata : $('#form_declaration').serialize(), uid : '<?= $user_id?>'},
                    success: function(data){
                        alert(data);
                    }
                });
            });
        });
    </script>

</html>

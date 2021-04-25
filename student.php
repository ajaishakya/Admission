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
    <style>
        a
        {
            color:black;
        }
        
    </style>
</head>

<body>
<!-- Header -->
    <div style="height:100px" class="bg-dark d-flex align-items-center ">
        <div class="container-fluid"  style="width:1230px;">
            <div class="row">
                <div class="col-11">
                    <img src="resource/logo.png">
                </div>
                <div class="col d-flex align-items-center justify-content-end">
                    <button type="button" class="btn btn-sm" style="background-color:rgb(115, 15, 14);color:lightgrey;">Logout</button>
                </div>
            </div>
        </div>
    </div>

<!-- Body -->
    <div class="container-fluid d-flex justify-content-center">
        <div class="row bg-light mt-4 mb-4 shadow-lg" style="height:800px; width:1200px;">
            <div class="col-3" style="border-right:1px solid lightgrey" >
                  <!-- Nav tabs -->
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#welcome">Welcome</a></li>
                    <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#choose">Choose Program</a></li>
                    <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#personal">Personal Information</a></li>
                    <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#address">Address Information</a></li>
                    <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#family">Family Details</a></li>
                    <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#academic">Academic Information</a></li>
                    <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#work">Work and other Professional Experiences</a></li>
                    <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#achievements">Achievements</a></li>
                    <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#career">statement of purpose</a></li>
                    <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#decleration">Declaration</a></li>
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
                            <div class="col-6 ">
                                <form action="" method="post">
                                    <input type="radio" name="program" value="MBA">
                                    <label for="">MBA</label>
                                    <br>
                                    <input type="radio"  name="program" value="MBAE">
                                    <label for="">MBA-Evening</label>
                                    <br>
                                    <input type="submit" value="Save" name="submitmba" class="btn btn-bg text-white" style="background-color:rgb(115, 15, 14);">
                                </form>
                            </div>
                            <div class="col">To veiw the FAQ, click <a target="_blank" href="http://mba.apexcollege.edu.np/pdf/MBA_Admission_FAQ.pdf" style="color:blue;" >here</a></div>
                        </div>
                    </div>

                    <div id="personal" class="container tab-pane"><br>
                        <h3>Personal Information:</h3>
                        <hr>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col offset-2"> 
                                    <input type="radio" name='initial' value="Mr">
                                    <label for="">Mr.</label>
                                    <input type="radio" name='initial' value="Ms">
                                    <label for="">Ms.</label>
                                    <input type="radio" name='initial' value="Mrs">
                                    <label for="">Mrs.</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-2"><label for="">Name:</label></div>
                                <div class="col"><input type="text" placeholder="Last" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" placeholder="First" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" placeholder="Middle" class="form-control form-control-sm"></div>
                            </div>

                            <div class="form-row">
                                <div class="col-2"><label for="">Date of Birth:</label></div>
                                <div class="col-4"><input type="date" class="form-control form-control-sm"></div>
                            </div>

                            <div class="form-row">
                                <div class="col-2"><label for="">Gender:</label></div>
                                <div class="col">
                                    <input type="radio" name="gender" value="male">
                                    <label for="">Male</label>
                                    <input type="radio" name="gender" value="female">
                                    <label for="">Female</label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-2"><label for="">Marital Status:</label></div>
                                <div class="col">
                                    <input type="radio" name="status" value="married">
                                    <label for="">Married</label>
                                    <input type="radio" name="status" value="single">
                                    <label for="">Single</label>
                                </div>
                            </div>

                             <div class="form-row">
                                <div class="col-2"><label for="">Citizenship:</label></div>
                                <div class="col"><input type="text" placeholder="Citizenship" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" placeholder="Issuing District" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" placeholder="Citizenship No." class="form-control form-control-sm"></div>
                            </div>

                            <div class="form-row">
                                <div class="col-2"><label for="">Telephone No:</label></div>
                                <div class="col-4"><input type="number" placeholder="Telephone" class="form-control form-control-sm"></div>
                            </div>

                            <div class="form-row">
                                <div class="col-2"><label for="">Cell No:</label></div>
                                <div class="col-4"><input type="number" placeholder="Mobile" class="form-control form-control-sm"></div>
                            </div>

                            <div class="form-row">
                                <div class="col-2"><label for="">Email:</label></div>
                                <div class="col-4"><input type="email" placeholder="Email" class="form-control form-control-sm"></div>
                            </div>

                            <div class="row">
                                <div class="col offset-2"><p>Have you ever been suspended, expelled or placed on probation at any School or University for academic or disciplinary reasons?</p></div>
                            </div>

                            <div class="form-row">
                                 <div class="col offset-2">
                                    <input type="radio" name='expel_flag' value="1">
                                    <label for="">Yes</label>
                                    <input type="radio" name='expel_flag' value="0">
                                    <label for="">No</label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-2">If Yes, Please explain</div>
                                <div class="col"><textarea name="expel_reason" class="form-control "></textarea></div>
                            </div>

                            <input type="submit" value="Save" name="submit-personal" class="btn btn-bg text-white mt-3" style="background-color:rgb(115, 15, 14);">
                        </form>
                    </div>

                    <div id="address" class="container tab-pane"><br>
                        <form action="" method="post">
                            <h4>Permanent Address:</h4>
                            <hr>
                            <div class="row form-group">
                                <div class="col"><input type="text" name="ward" placeholder="Ward" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="place" placeholder="Place" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="city" placeholder="City" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="vdc" placeholder="VDC/Municipality" class="form-control form-control-sm"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col"><input type="text" name="district" placeholder="District" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="phone" placeholder="Phone" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="cell" placeholder="Cell" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="fax" placeholder="Fax" class="form-control form-control-sm"></div>
                            </div>
                            <p><input type="checkbox" name="mycheckaddress" value="mycheckaddress"> Check here, If you want to include Local Address</p>

                            <h4>Temporary Address: (Only if different from your permanent address)</h4>
                            <hr>
                            <div class="row form-group">
                                <div class="col"><input type="text" name="lward" placeholder="Ward" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="lplace" placeholder="Place" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="lcity" placeholder="City" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="lvdc" placeholder="VDC/Municipality" class="form-control form-control-sm"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col"><input type="text" name="ldistrict" placeholder="District" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="lphone" placeholder="Phone" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="lcell" placeholder="Cell" class="form-control form-control-sm"></div>
                                <div class="col"><input type="text" name="lfax" placeholder="Fax" class="form-control form-control-sm"></div>
                            </div>
                            <input type="submit" name="submit_address" value="Save" class="btn btn-bg text-white mt-3" style="background-color:rgb(115, 15, 14);">
                        </form>
                    </div>

                    <div id="family" class="container tab-pane"><br>
                        <form action="" method="post">
                            <h3>Family Details</h3>
                            <hr>
                            <h4>Father's Information</h4><br>
                            <div class="row form-group">
                                <div class="col-4"><input class="form-control form-control-sm" type="text" name="fname" placeholder="Father's Name"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" type="text" name="fprofession" placeholder="Profession"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name="femployer" placeholder="Employer"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name="femail" placeholder="Email"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" type="text" name='fphone' placeholder="Phone"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name='fcell' placeholder="Cell"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name='ffax' placeholder="Fax"></div>
                            </div>

                            <h4>Mother's Information</h4><br>
                            <div class="row form-group">
                                <div class="col-4"><input class="form-control form-control-sm" type="text" name="mname" placeholder="Mother's Name"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" type="text" name="mprofession" placeholder="Profession"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name="memployer" placeholder="Employer"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name="memail" placeholder="Email"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" type="text" name='mphone' placeholder="Phone"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name='mcell' placeholder="Cell"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name='mfax' placeholder="Fax"></div>
                            </div>
                            <p><input type="checkbox" name="checkfamily" value="checkfamily"> Check here if you want to include Local Guardian information</p>

                            <h4>Local Guardian Information</h4><br>
                            <div class="row form-group">
                                <div class="col-4"><input class="form-control form-control-sm" type="text" name="lname" placeholder="Name"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" type="text" name="lprofession" placeholder="Profession"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name="lemployer" placeholder="Employer"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name="lemail" placeholder="Email"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col"><input class="form-control form-control-sm" type="text" name='lphone' placeholder="Phone"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name='lcell' placeholder="Cell"></div>
                                <div class="col"><input class="form-control form-control-sm" type="text" name='lfax' placeholder="Fax"></div>
                            </div>

                            <input type="hidden" id="familyupstat" value="">
                            <input type="submit" value="Save" name="submit_family" class="btn btn-bg text-white mt-3" style="background-color:rgb(115, 15, 14);">
                        </form>
                    </div>

                    <div id="academic" class="container tab-pane"><br>
                    </div>

                    <div id="work" class="container tab-pane"><br>
                    </div>

                    <div id="achievements" class="container tab-pane"><br>
                    </div>

                    <div id="career" class="container tab-pane"><br>
                    </div>

                    <div id="decleration" class="container tab-pane"><br>
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
    
</body> 
</html>
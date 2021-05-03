<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

class User
{
    public $conn;
    var $servername="localhost";
    var $username="root";
    var $passsword="";
    var $dbname="apexmba";

    function __construct(){
            
        // Create connection
        $this->conn= new mysqli($this->servername,$this->username,$this->passsword,$this->dbname);

        // Check connection
        if($this->conn->connect_error){
            die("Connection Failed:".$this->conn->connect_error);
        }
    }

    function __destruct(){
        // Close connection
        $this->conn->close();
    }

    function reg_user($postarr){
        $first_name = $postarr["first_name"];
        $last_name = $postarr["last_name"];
        $mobile = $postarr["mobile"];
        $email = $postarr["email"];
        $gender = $postarr["gender"];
        $dob = $postarr["dob"];
        $session_id = $postarr["session_id"];
        // Generates Unique password
        $password_plain = uniqid();
        $password = md5($password_plain);

        $sql="INSERT INTO users(first_name,last_name,mobile,email,gender,dob,session_id,password)
        VALUE('$first_name','$last_name','$mobile','$email','$gender','$dob','$session_id','$password')";

        $result = mysqli_query($this->conn, $sql);
        $token=md5($email.$first_name);

        if($result)
        {
            $stat = $this->send_mail($postarr,$token,$password_plain);
        }
    }

    private function send_mail($info,$token,$pass){
        
        //Load Composer's autoloader
        require 'phpmailer/vendor/autoload.php';

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer();
        $link = 'http://mba.apexcollege.edu.np/index.php?activate_account=user&token_outh='.$token;

        //Server settings
        // Write 1 on SMTPDebug to find error
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

        // user your actual username and password (Need to allow unauthorized access from mail)
        $mail->Username   = 'ajai.shakya@apexcollege.edu.np';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('ajai.shakya@apexcollege.edu.np', 'Ajai Shakya');
        $mail->addAddress('ajaishakya08@gmail.com', 'Ajai Shakya');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'This is a test Email';
        $mail->msgHTML("Dear Applicants,<br/><br/>To verify your account for <b>APEX COLLEGE</b> online registration form 
        click the link: <a href='{$link}'>{$link}</a><br/>and login with your password: {$pass} <br/><br/>Best Regards,<br/>Apex Admission.");
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send())
        {
            return 1;
        }
    }

    function check_login($post)
    {
        $email = $post["email"];
        $password = $post["password"];

        // md5()
        // $password=md5($password);

        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                if($row["email"]==$email && $row["password"]==$password)
                {
                    $_SESSION["user_id"] = $row["email"];
                    $_SESSION['email'] = $row['email'];
                    return 1;
                }
            }
        }
    }

    function get_program($user_id, $program)
    {
        $sql = "INSERT INTO student_program(student_id,program) VALUES ('$user_id','$program')";

        if(mysqli_query($this->conn,$sql))
        {
            return 1;
        }
    }

    function get_personal($user_id, $formdata)
    {
        $initial = $formdata['initial'];
        $st_lname =  $formdata['st_lname'];
        $st_fname =  $formdata['st_fname'];
        $st_mname =  $formdata['st_mname'];
        $dob =  $formdata['dob'];
        $gender =  $formdata['gender'];
        $status =  $formdata['status'];
        $citizenship =  $formdata['citizenship'];
        $issuing_district =  $formdata['issuing_district'];
        $citizenship_no = $formdata['citizenship_no'];
        $telephone =  $formdata['telephone'];
        $mobile =  $formdata['mobile'];
        $email =  $formdata['email'];
        $expel_flag =  $formdata['expel_flag'];
        $expel_reason =  $formdata['expel_reason'];

        $sql = "INSERT INTO personal_info 
                SET student_id='$user_id',initial='$initial',st_fname='$st_fname',st_mname='$st_mname',st_lname='$st_lname',dob='$dob'
                ,gender='$gender',status='$status',citizenship='$citizenship',issuing_district='$issuing_district', citizenship_no='$citizenship_no',
                 telephone='$telephone', mobile='$mobile',email='$email',expel_flag='$expel_flag',expel_reason='$expel_reason'";

        if(mysqli_query($this->conn, $sql))
        {
            return 1;
        }
    }

    function get_address($user_id, $formdata)
    {
        $ward = $formdata['ward'];
        $place = $formdata['place'];
        $city = $formdata['city'];
        $vdc = $formdata['vdc'];
        $district = $formdata['district'];
        $phone = $formdata['phone'];
        $cell = $formdata['cell'];
        $fax = $formdata['fax'];

        $lward = $formdata['lward'];
        $lplace = $formdata['lplace'];
        $lcity = $formdata['lcity'];
        $lvdc = $formdata['lvdc'];
        $ldistrict = $formdata['ldistrict'];
        $lphone = $formdata['lphone'];
        $lcell = $formdata['lcell'];
        $lfax = $formdata['lfax'];
        $address_type1 = 'p';
        $address_type2 = 't';

        $sql1 = "INSERT INTO address SET student_id='$user_id', address_type='$address_type1', ward='$ward', place='$place', city='$city', 
                vdc='$vdc', district='$district', phone='$phone', cell='$cell', fax='$fax'";
        
        mysqli_query($this->conn, $sql1);

        $sql2 = "INSERT INTO address SET student_id='$user_id', address_type='$address_type2', ward='$lward', place='$lplace', city='$lcity', 
                vdc='$lvdc', district='$ldistrict', phone='$lphone', cell='$lcell', fax='$lfax'";
                
        mysqli_query($this->conn, $sql2);

            return 1;
    }

    function get_family($user_id,$formdata)
    {
        $fname = $formdata['fname'];
        $fprofession = $formdata['fprofession'];
        $femployer = $formdata['femployer'];
        $femail = $formdata['femail'];
        $fphone = $formdata['fphone'];
        $fcell = $formdata['fcell'];
        $ffax = $formdata['ffax'];

        $mname = $formdata['mname'];
        $mprofession = $formdata['mprofession'];
        $memployer = $formdata['memployer'];
        $memail = $formdata['memail'];
        $mphone = $formdata['mphone'];
        $mcell = $formdata['mcell'];
        $mfax = $formdata['mfax'];

        $lname = $formdata['lname'];
        $lprofession = $formdata['lprofession'];
        $lemployer = $formdata['lemployer'];
        $lemail = $formdata['lemail'];
        $lphone = $formdata['lphone'];
        $lcell = $formdata['lcell'];
        $lfax = $formdata['lfax'];
        $type1 = 'f';
        $type2 = 'm';
        $type3 = 'l';

        $sql1 = "INSERT INTO family SET student_id='$user_id', type='$type1', name='$fname', profession='$fprofession', employer='$femployer', 
                email='$femail', phone='$fphone', cell='$fcell', fax='$ffax'";

        mysqli_query($this->conn, $sql1);
        
        $sql2 = "INSERT INTO family SET student_id='$user_id', type='$type2', name='$mname', profession='$mprofession', employer='$memployer', email='$memail', phone='$mphone', cell='$mcell', fax='$mfax'";

        mysqli_query($this->conn, $sql2);
        
        $sql3 = "INSERT INTO family SET student_id='$user_id', type='$type3', name='$lname', profession='$lprofession', employer='$lemployer', 
                email='$lemail', phone='$lphone', cell='$lcell', fax='$lfax'";
                
        mysqli_query($this->conn, $sql3);
        
            return 1;
    }

    function get_academic($user_id, $formdata)
    {
        $degree1 = $formdata['degree1'];
        $percentage1 = $formdata['percentage1'];
        $specialization1 = $formdata['specialization1'];
        $college1 = $formdata['college1'];
        $board1 = $formdata['board1'];
        $start_year1 = $formdata['start_year1'];
        $end_year1 = $formdata['end_year1'];

        $degree2 = $formdata['degree2'];
        $percentage2 = $formdata['percentage2'];
        $specialization2 = $formdata['specialization2'];
        $college2 = $formdata['college2'];
        $board2 = $formdata['board2'];
        $start_year2 = $formdata['start_year2'];
        $end_year2 = $formdata['end_year2'];

        $degree3 = $formdata['degree3'];
        $percentage3 = $formdata['percentage3'];
        $college3 = $formdata['college3'];
        $board3 = $formdata['board3'];
        $start_year3 = $formdata['start_year3'];
        $end_year3 = $formdata['end_year3'];

        $degree4 = $formdata['degree4'];
        $percentage4 = $formdata['percentage4'];
        $specialization4 = $formdata['specialization4'];
        $college4 = $formdata['college4'];
        $board4 = $formdata['board4'];
        $start_year4 = $formdata['start_year4'];
        $end_year4 = $formdata['end_year4'];
        $type1 = "ug";
        $type2 = "p2";
        $type3 = "slc";
        $type4 = "o";

        $sql1 = "INSERT INTO academic SET student_id='$user_id', type ='$type1', degree ='$degree1', percentage='$percentage1', 
        specialization='$specialization1', college='$college1', board='$board1', start_year='$start_year1', end_year='$end_year1'";
                
        mysqli_query($this->conn, $sql1);

        $sql2 = "INSERT into academic SET student_id='$user_id', type='$type2', degree='$degree2', percentage='$percentage2', 
        specialization='$specialization2', college='$college2', board='$board2', start_year='$start_year2', end_year='$end_year2'";

        mysqli_query($this->conn, $sql2);

        $sql3 = "INSERT into academic SET student_id='$user_id', type='$type3', degree='$degree3', percentage='$percentage3', 
        specialization='SLC', college='$college3', board='$board3', start_year='$start_year3', end_year='$end_year3'";

        mysqli_query($this->conn, $sql3);

        $sql4= "INSERT into academic SET student_id='$user_id', type='$type4', degree='$degree4', percentage='$percentage4', 
        specialization='$specialization4', college='$college4', board='$board4', start_year='$start_year4', end_year='$end_year4'";

        mysqli_query($this->conn, $sql4);

        return 1;
    }

    function get_work($user_id, $formdata )
    {
        $type1 = 'f1';
        $type2 = 'f2';
        $type3 = 'f3';
        $type4 = 'f4';
        $type5 = 'p1';
        $type6 = 'p2';
        $type7 = 'p3';
        $type8 = 'p4';

        // Full Time
        $forg1 = $formdata['forg1'];
        $ffrom1 = $formdata['ffrom1'];
        $fto1 = $formdata['fto1'];
        $fjob1 =$formdata['fjob1'];
        $fdes1 =$formdata['fdes1'];

        $forg2 =$formdata['forg2'];
        $ffrom2 = $formdata['ffrom2'];
        $fto2 = $formdata['fto2'];
        $fjob2 =$formdata['fjob2'];
        $fdes2 =$formdata['fdes2'];

        $forg3 =$formdata['forg3'];
        $ffrom3 = $formdata['ffrom3'];
        $fto3 = $formdata['fto3'];
        $fjob3 =$formdata['fjob3'];
        $fdes3 =$formdata['fdes3'];

        $forg4 =$formdata['forg4'];
        $ffrom4 = $formdata['ffrom4'];
        $fto4 = $formdata['fto4'];
        $fjob4 =$formdata['fjob4'];
        $fdes4 =$formdata['fdes4'];

        // Part Time
        $porg1 = $formdata['porg1'];
        $pfrom1 = $formdata['pfrom1'];
        $pto1 =  $formdata['pto1'];
        $pjob1 = $formdata['pjob1'];
        $pdes1 = $formdata['pdes1'];

        $porg2 = $formdata['porg2'];
        $pfrom2 = $formdata['pfrom2'];
        $pto2 =  $formdata['pto2'];
        $pjob2 = $formdata['pjob2'];
        $pdes2 = $formdata['pdes2'];
 
        $porg3 = $formdata['porg3'];
        $pfrom3 = $formdata['pfrom3'];
        $pto3 =  $formdata['pto3'];
        $pjob3 = $formdata['pjob3'];
        $pdes3 = $formdata['pdes3'];
 
        $porg4 = $formdata['porg4'];
        $pfrom4 = $formdata['pfrom4'];
        $pto4 =  $formdata['pto4'];
        $pjob4 = $formdata['pjob4'];
        $pdes4 = $formdata['pdes4'];

        // Full Time
        $sql1 = "INSERT into work set student_id='$user_id', organization='$forg1', start='$ffrom1', end='$fto1', title='$fjob1', 
        description='$fdes1', type='$type1'";
        mysqli_query($this->conn, $sql1);

        $sql2 = "INSERT into work set student_id='$user_id', organization='$forg2', start='$ffrom2', end='$fto2', title='$fjob2', 
        description='$fdes2', type='$type2'";
        mysqli_query($this->conn, $sql2);

        $sql3 = "INSERT into work set student_id='$user_id', organization='$forg3', start='$ffrom3', end='$fto3', title='$fjob3', 
        description='$fdes3', type='$type3'";
        mysqli_query($this->conn, $sql3);

        $sql4 = "INSERT into work set student_id='$user_id', organization='$forg4', start='$ffrom4', end='$fto4', title='$fjob4', 
        description='$fdes4', type='$type4'";
        mysqli_query($this->conn, $sql4);

        // Part Time
        $sql5 = "INSERT into work set student_id='$user_id', organization='$porg1', start='$pfrom1', end='$pto1', title='$pjob1', 
        description='$pdes1', type='$type5'";
        mysqli_query($this->conn, $sql5);

        $sql6 = "INSERT into work set student_id='$user_id', organization='$porg2', start='$pfrom2', end='$pto2', title='$pjob2', 
        description='$pdes2', type='$type6'";
        mysqli_query($this->conn, $sql6);

        $sql7 = "INSERT into work set student_id='$user_id', organization='$porg3', start='$pfrom3', end='$pto3', title='$pjob3', 
        description='$pdes3', type='$type7'";
        mysqli_query($this->conn, $sql7);

        $sql8 = "INSERT into work set student_id='$user_id', organization='$porg4', start='$pfrom4', end='$pto4', title='$pjob4', 
        description='$pdes4', type='$type8'";
        mysqli_query($this->conn, $sql8);

       
        $check_list = $formdata['check_list'];
        $chckbx = implode('',$check_list);
        $pursue = $formdata['pursue'];
        $specify = $formdata['specify'];
        $concate = $chckbx.",".$specify;

        $sql = "INSERT INTO work_other set student_id='$user_id', options='$concate', pursue='$pursue'";
        mysqli_query($this->conn, $sql);

        return 1;
    }

    function get_ach($user_id, $formdata)
    {
        $type1 = "ach11";
        $type2 = "ach21";
        $type3 = "ach31";

        $act1 = $formdata['act1'];
        $role1 = $formdata['role1'];
        $date1 = $formdata['date1'];
        $respon1 = $formdata['respon1'];

        $act2 = $formdata['act2'];
        $role2 = $formdata['role2'];
        $date2 = $formdata['date2'];
        $respon2 = $formdata['respon2'];

        $act3 = $formdata['act3'];
        $role3 = $formdata['role3'];
        $date3 = $formdata['date3'];
        $respon3 = $formdata['respon3'];

        $sql1 = "INSERT INTO ach_data SET student_id='$user_id', activity='$act1', role='$role1', date='$date1', responsibility='$respon1', 
        type='$type1'";
        mysqli_query($this->conn, $sql1);

        $sql2 = "INSERT INTO ach_data SET student_id='$user_id', activity='$act2', role='$role2', date='$date2', responsibility='$respon2', 
        type='$type2'";
        mysqli_query($this->conn, $sql2);

        $sql3 = "INSERT INTO ach_data SET student_id='$user_id', activity='$act3', role='$role3', date='$date3', responsibility='$respon3', 
        type='$type3'";
        mysqli_query($this->conn, $sql3);

        return 1;
    }

    function get_obj($user_id, $data)
    {
        $sql = "INSERT INTO objective set student_id='$user_id', data='$data'";
        if(mysqli_query($this->conn, $sql))
        {
            return 1;
        }
    }

    function get_declaration($user_id, $declaration)
    {
        $sql = "INSERT INTO student_program SET student_id='$user_id', declaration='$declaration'";
        if(mysqli_query($this->conn, $sql))
        {
            return 1;
        }
    }

    // For Displaying values in Student.php

    function check_declaration($user_id, $tablename)
    {
        $sql = "SELECT * FROM $tablename WHERE student_id='$user_id'";
        $run = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($run)>0)
        {
           return mysqli_fetch_assoc($run);
        }
        else
        {
            return false;
        }
    }

    function check_update($user_id, $tablename)
    {
        $sql = "SELECT * FROM $tablename WHERE student_id='$user_id'";
        $run = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($run)>0)
        {
           return mysqli_fetch_assoc($run);
        }
        else
        {
            return false;
        }
    }
}
?>
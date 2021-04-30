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
        $sql = "INSERT INTO student_program(student_id,program)
                VALUES ('$user_id','$program')";

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
        
        if(mysqli_query($this->conn, $sql1))
        {
            return 1;
        }

        $sql2 = "INSERT INTO address SET student_id='$user_id', address_type='$address_type2', ward='$lward', place='$lplace', city='$lcity', 
                vdc='$lvdc', district='$ldistrict', phone='$lphone', cell='$lcell', fax='$lfax'";
                
        if(mysqli_query($this->conn, $sql2))
        {
            return 1;
        }
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
        $type1 = 'f';
        $type2 = 'm';
        $type = 'l';

        $sql1 = "INSERT INTO family SET student_id='$user_id', type='$type1', name='$fname', profession='$fprofession', employer='$femployer', 
                email='$femail', phone='$fphone', cell='$fcell', fax='$ffax'";

        if(mysqli_query($this->conn, $sql1))
        {
            return 1;
        }
        
        $sql2 = "INSERT INTO family SET student_id='$user_id', type='$type2', name='$mname', profession='$mprofession', employer='$memployer', 
                email='$memail', phone='$mphone', cell='$mcell', fax='$mfax'";

        if(mysqli_query($this->conn, $sql2))
        {
            return 1;
        }
            
        $lname = $formdata['lname'];
        $lprofession = $formdata['lprofession'];
        $lemployer = $formdata['lemployer'];
        $lemail = $formdata['lemail'];
        $lphone = $formdata['lphone'];
        $lcell = $formdata['lcell'];
        $lfax = $formdata['lfax'];

        $sql3 = "INSERT INTO family SET student_id='$user_id', type='$type3', name='$lname', profession='$lprofession', employer='$lemployer', 
                email='$lemail', phone='$lphone', cell='$lcell', fax='$lfax'";
                
        if(mysqli_query($this->conn, $sql3))
        {
            return 1;
        }
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
        $type1 = "ug";
        $type2 = "p2";
        $type3 = "slc";
        $type4 = "o";

        $ol = "INSERT INTO academic SET student_id='$user_id', type ='$type1', degree ='$degree1', percentage='$percentage1', specialization='$specialization1', college='$college1', board='$board1', start_year='$start_year1', end_year='$end_year1'";
                
        if(mysqli_query($this->conn, $ol))
        {
            return 1;
        }

        // $degree2 = $formdata['degree2'];
        // $percentage2 = $formdata['percentage2'];
        // $specialization2 = $formdata['specialization2'];
        // $college2 = $formdata['college2'];
        // $board2 = $formdata['board2'];
        // $start_year2 = $formdata['start_year2'];
        // $end_year2 = $formdata['end_year2'];

        // $degree3 = $formdata['degree3'];
        // $percentage3 = $formdata['percentage3'];
        // $college3 = $formdata['college3'];
        // $board3 = $formdata['board3'];
        // $start_year3 = $formdata['start_year3'];
        // $end_year3 = $formdata['end_year3'];

        

        // $sql2 = "INSERT into academic SET student_id='$user_id', type='$type2', degree='$degree2', percentage='$percentage2', 
        // specialization='$specialization2', college='$college2', board='$board2', start_year='$start_year2', end_year='$end_year2'";

        // if(mysqli_query($this->conn, $sql2))
        // {
        //     return 1;
        // }

        // $sql3 = "INSERT into academic SET student_id='$user_id', type='$type3', degree='$degree3', percentage='$percentage3', 
        // college='$college3', board='$board3', start_year='$start_year3', end_year='$end_year3'";

        // if(mysqli_query($this->conn, $sql3))
        // {
        //     return 1;
        // }

    }
}
?>
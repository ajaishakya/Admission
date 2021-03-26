<?php
class User
{
    public $conn;
    var $servername="localhost";
    var $username="root";
    var $passsword="";
    var $dbname="apexmba";

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;

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
        require 'mailer/vendor/autoload.php';

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer();
        $link = 'http://mba.apexcollege.edu.np/index.php?activate_account=user&token_outh='.$token;

        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ajai.shakya@apexcollege.edu.np';                     //SMTP username
        $mail->Password   = 'secret';                               //SMTP password
        $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('ajai.shakya@apexcollege.edu.np', 'AJAI');
        $mail->addAddress('ajaishakya@gmail.com', 'Ajai Shakya');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'This is a test Email';
        $mail->msgHTML("Dear Applicants,<br/><br/>To verify your account for <b>APEX COLLEGE</b> online registration form 
        click the link: <a href='{$link}'>{$link}</a><br/>and login with your password: {$pass} <br/><br/>Best Regards,<br/>Apex Admission.");
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    }
}
?>
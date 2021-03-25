<?php
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

        if ($this->conn->query($sql) === TRUE) 
        {
         echo "New record created successfully";
        } 
        else 
        {
        echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
}
?>
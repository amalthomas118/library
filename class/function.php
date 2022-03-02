<?php
session_start();

class connection{
    private $_localhost = 'localhost';
    private $_user = 'root';
    private $_password = '';
    private $_dbname = 'books';
protected $conn;
public function __construct(){
    $this->conn = new mysqli($this->_localhost , $this->_user , $this->_password , $this->_dbname);
}
}

class register extends connection{

    public function registration($name, $username, $email, $password, $confirmpassword){
        $duplicate = mysqli_query($this->conn, "SELECT * FROM login WHERE username = '$username' OR email = '$email'");
        if(mysqli_num_rows($duplicate) > 0){
        return 10;
//username already exists
    }
else{
    if($password == $confirmpassword){
$query = "INSERT INTO login VALUES('', '$name', '$username', '$email', '$password')";
mysqli_query($this->conn, $query);
return 1;
//resistration successs
    }
    else {
        return 100;
        //password does not match
    }
}    
}
}

class login extends connection{
    public $id;
    public function login($usernameemail, $password){
        $result = mysqli_query($this->conn, "SELECT * FROM login WHERE username = '$usernameemail' OR email = '$usernameemail'");
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0){
            if($password == $row["password"]){
                $this->id = $row["id"];
                return 1;
                //Shows Login successfull
}
else{
    return 10;
    //Wrong password
}
        }
        else
        { return 100;
        // shows error user not registered
    }
}
 
public function idUser(){
    return $this->id;
}
}
<?php
require_once 'connection.php';
class User
{
    private ?int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private ?string $password;

    public function __construct(string $fname, string $lname, string $email, string $password=null, int $id=null)
    {
        $this->id = $id;
        $this->first_name = $fname;
        $this->last_name = $lname;
        $this->email = $email;
        $this->password = $password;
    }

    public static function login(string $email, string $password):?int{
        session_start();
        $query = "SELECT * from user where email='$email' and password='$password'";
        $con = Connection::getConnection();
        $stmt = $con->prepare($query);
        $stmt->execute();
        $user = $stmt->fetch();
        if(!empty($user)){ 
            return $user['id'];
        }else{
            return null;
        }
    }

    public static function checkLoggedInUser():bool{
        session_start();
        return isset($_SESSION['user_id'])?true:false;
    }

    public static function logout(){
        session_start();
        session_destroy();
    }

    public static function isEmailExist(string $email):bool{
        $query = "SELECT count(*) as COUNTER from user where email='$email'";
        $con = Connection::getConnection();
        $stmt = $con->prepare($query);
        $stmt->execute();
        $mailExist = $stmt->fetch();
        
        $x = ($mailExist['COUNTER']>0)?true:false; 
        return $x;
    }

    public function addUser(){
        $query = "INSERT into user(first_name, last_name, email, password)
                values('$this->first_name', '$this->last_name', '$this->email', '$this->password')";
        $con = Connection::getConnection();
        $con->exec($query);
    }

    public function deleteUser(){
        $query="DELETE from user where id=$this->id";
        $con = Connection::getConnection();
        $con->exec($query);
    }

    public function updateUser(){
        $query="UPDATE user set first_name='$this->first_name', last_name='$this->last_name', email='$this->email', password='$this->password'
        where id=$this->id";
        $con = Connection::getConnection();
        $con->exec($query);
    }

    public function getId():int{
        return $this->id;
    }
    public function getFirstName():string{
        return $this->first_name;
    }
    public function getLastName():string{
        return $this->last_name;
    }
    public function getEmail():string{
        return $this->email;
    }
    public function getPassword():string{
        return $this->password;
    }
}

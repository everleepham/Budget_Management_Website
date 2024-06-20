<?php
require_once 'connection.php';
class Transactions
{
    private ?int $id;
    private string $name;
    private float $amount;
    private string $categorie;
    private Datetime $date;

    public function __construct(string $name=null, float $amount=null, string $categorie=null, DateTime $date=null, int $id=null)
    {
        $this->id=$id;
        $this->name=$name;
        $this->amount=$amount;
        $this->categorie=$categorie;
        $this->date=$date;
    }

    public static function checkLoggedInUser():bool{
        session_start();
        return isset($_SESSION['user_id'])?true:false;
    }

    public static function logout(){
        session_start();
        session_destroy();
    }

    public static function totalExpenses():float{
        $query = "SELECT sum(amount) as total from transactions";
        $con = Connection::getConnection();
        $stmt = $con->prepare($query);
        $stmt->execute();
        $total = $stmt->fetch();
        if($total['total'] == null){
            return 0;
        }
        return $total['total'];
    }

    public static function getAllTransactions()
    {
        $query = "SELECT * from transactions";
        $con = Connection::getConnection();
        $stmt = $con->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getTransactionstById(int $id){
        $query = "SELECT * from transactions where id=$id";
        $con = Connection::getConnection();
        $stmt = $con->prepare($query);
        $stmt->execute();
        $transArray = $stmt->fetchAll()[0];
        $date = new DateTime($transArray['date']);
        $trans = new Transactions($transArray['name'], $transArray['amount'],$transArray['categorie'], $date, $transArray['id']);
        return $trans;
    }

    public function addTransactions()
    {   
        $date = $this->date->format('Y-m-d');
        $query = "INSERT into transactions(name, amount, categorie, date)
                values('$this->name', $this->amount, '$this->categorie', '$date')";
            $con = Connection::getConnection();
            $con->exec($query);
    }

    public function updateTransactions(){
        $date = $this->date->format('Y-m-d');
        $query = "UPDATE transactions set name='$this->name', amount=$this->amount, categorie='$this->categorie', date='$date' where id=$this->id";
        $con = Connection::getConnection();
        $con->exec($query);
    }

    public function deleteTransactions(){
        $query="DELETE from transactions where id=$this->id";
        $con = Connection::getConnection();
        $con->exec($query);
    }



    public function getId():int{
        return $this->id;
    }
    public function getName():string{
        return $this->name;
    }
    public function getAmount():float{
        return $this->amount;
    }

    public function getCategorie():string{
        return $this->categorie;
    }

    public function getDate():string {
        $date = $this->date->format('Y-m-d');
        return $date;
    }


}
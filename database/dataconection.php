<?php
class dataconnect{
    private $db='Digital_Garden_OOP';
    private $Username='root';
    private $password='';
    private $pdo;
    private $host='localhost';
   public function __construct(){
    try{
            $dsn ='mysql:host=' . $this->host . ';dbname=' . $this->db;
           
            $this->pdo = new PDO($dsn, $this->Username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            echo "failed" . $e->getMessage();
    }
    
   }
   public function connection(){
    return $this->pdo;
   }
   
}

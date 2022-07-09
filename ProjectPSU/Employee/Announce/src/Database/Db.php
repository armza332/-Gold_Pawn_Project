<?php
namespace App\Database;

use PDO;

class Db{
   private $host = "localhost";
   private $user = "root";
   private $password = "";
   private $dbName = "registration_system"; //ชื่อ database

   protected $pdo;

   function __construct(){
       $this->pdo = $this->connect();
   }
   protected function connect(){
       $dsn = "mysql:host={$this->host};dbname={$this->dbName}";
       $pdo = new pdo($dsn, $this->user, $this->password);
       $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return $pdo;


   }
}

?>
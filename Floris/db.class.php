<?php 
class DB{
    private $host = 'localhost';
    private $username = 'root';
    private $password ='root';
    private $database = 'FlorisDB';
    private $db;
  
    public function __construct($host = null, $username = null, $password = null, $database = null){
        if($host != null){
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
        
        try{
            $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password,array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            ));
        
        }catch(PDOException $e){
            die('<h1>Impossible de se connecter</h1>');
        }
        
    }
//$data permet de sécuriser le $_GET afin que l'utilisateur ne puisse pas rentrer de faux id

    public function query($sql, $data=array()){
        $req =$this->db->prepare($sql);
       $req ->execute($data);
       $req ->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function requete($sql, $data=array()){
       $req =$this->db->prepare($sql);
       $req ->execute($data);
      
       
    }

    }?>
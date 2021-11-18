<?php

require_once(dirname(__FILE__).'/../utils/connection.php');


class Patient{
    
    private $_lastname;
    private $_firstname;
    private $_birthdate;
    private $_phone;
    private $_mail;
    private $_pdo;
    private $_id;
    
    

    public function __construct($lastname = '', $firstname = '', $birthdate = '', $phone = '', $mail = '',$id = '')
    {
        $this->_lastname = $lastname;
        $this->_firstname = $firstname;
        $this->_birthdate = $birthdate;
        $this->_phone = $phone;
        $this->_mail = $mail;
        $this->_id = intval($id);
        

        $this->_pdo = Database::connect();

        // plus besoin d'instancier
        // $database = new Database();
        // $this->_pdo = $database->connect();
        

    }
    public function create(){
        $sql = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) 
        VALUES (:lastname,:firstname,:birthdate,:phone,:mail)';
        
        try {
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':lastname', $this->_lastname, PDO::PARAM_STR);
            $sth->bindValue(':firstname', $this->_firstname, PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->_birthdate, PDO::PARAM_STR);
            $sth->bindValue(':phone', $this->_phone, PDO::PARAM_STR);
            $sth->bindValue(':mail', $this->_mail, PDO::PARAM_STR);
            if(!$sth->execute()){
                return 'Erreur';
            } else {
                return true;
            }
        } catch (\PDOException $ex) {
            return $ex;
        }
    }
    public static function read($search = '',$offset = '', $limit = ''){
        $pdo = Database::connect();
        // $sql2 = 'SELECT `lastname`, `firstname`, `phone`, `id` FROM `patients`';
        $sql = 'SELECT * FROM `patients` WHERE (`lastname` LIKE :search) OR (`firstname` LIKE :search) ORDER BY `lastname` ASC LIMIT :offset, :limit ';
        try {
            // $sth =  $pdo->query($sql);
            $sth = $pdo->prepare($sql);
            
            $sth->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
            $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
            $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
            $sth->execute();
            
            $patients = $sth->fetchAll();
            
            return $patients;
            
        } catch (\PDOException $ex) {
            return $ex;
        }
    }
    

    public static function view($id){
        
        $sql = 'SELECT * FROM `patients` WHERE `id` = :id ';
        try {
            $pdo = Database::connect();
            $sth =  $pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            
            if($sth->execute()){
               
                $patient = $sth->fetch();
                if($patient){
                    return $patient;
                } else {
                    throw new PDOException('Le patient n\'existe pas');
                    
                }
                
            } else{
                throw new PDOException('Erreur d\'exécution de la requête');
            }
            
        } catch (\PDOException $ex) {
            return $ex;
        }


    }

    public function update(){
        
        
        $sql = 'UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail WHERE `id` = :id ';
        try {
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':lastname', $this->_lastname, PDO::PARAM_STR);
            $sth->bindValue(':firstname', $this->_firstname, PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->_birthdate, PDO::PARAM_STR);
            $sth->bindValue(':phone', $this->_phone, PDO::PARAM_STR);
            $sth->bindValue(':mail', $this->_mail, PDO::PARAM_STR);
            $sth->bindValue(':id', $this->_id, PDO::PARAM_INT);
            if(!$sth->execute()){
                throw new PDOException('Erreur');
            } else {
                return true;
            }
            

        } catch (\PDOException $ex) {
            
            return $ex;
        }
    }

    public static function delete($id){
        $sql = 'DELETE FROM `patients` WHERE `id` = :id';
        try {
            $pdo = Database::connect();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            if(!$sth->execute()){
                throw new PDOException('Erreur');
            } else {
                $result = $sth->rowCount();
                return $result ;
            }
            

        } catch (\PDOException $ex) {
            
            return $ex;
        }
      

    }


    public static function getCount(){

        try{
            $pdo=Database::connect();
            $sql = 'SELECT COUNT(id) as nbPatients FROM patients;';

            $sth = $pdo->query($sql);
            $result = $sth->fetchColumn();
            return $result;
            if($result == false){
                throw new PDOException('Aucun patient dans la base de données');
            }
        }catch(PDOException $ex) {
            return $ex; 
        }

    }
    public static function getAll(){
        $pdo = Database::connect();
        $sql = 'SELECT `lastname`, `firstname`, `phone`, `id` FROM `patients` 
        ORDER BY `lastname` ASC';
        
        try {
            $sth =  $pdo->query($sql);
            $patients = $sth->fetchAll();
            
            return $patients;
            
        } catch (\PDOException $ex) {
            
           
            return $ex;
        }
    }
    



    
}











<?php

require_once(dirname(__FILE__).'/../utils/connection.php');


class Appointments {

        private $_dateHour;
        private $_idPatients;
        private $_id;
        private $_pdo;

        public function __construct($dateHour = '', $idPatients = 0, $id = 0)
    {
        try {
            $this->_dateHour = $dateHour;
            $this->_idPatients = $idPatients;
            $this->_id = $id;
            $this->_pdo = Database::connect();
        } catch (\PDOException $ex) {
            
            return $ex;
        }
        

    }

    public function create(){
        $sql = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES ( :dateHour,:idPatients)';
        try {
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':dateHour', $this->_dateHour, PDO::PARAM_STR);
            $sth->bindValue(':idPatients', $this->_idPatients, PDO::PARAM_INT);

            if(!$sth->execute()){
                throw new PDOException('Erreur');
            } else {
                return true;
            }
        } catch (\PDOException $ex) {
            return $ex ;
        }

    }

    public static function read($id = null){
        
        
        if(is_null($id)){
            $sql = 'SELECT `appointments`.`id`,`dateHour`, `lastname`, `firstname` 
        FROM `appointments` 
        INNER JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id`';
        } else {
            $sql = 'SELECT `appointments`.`id`,`dateHour` FROM `appointments` 
        INNER JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id` 
        WHERE `patients`.`id` = :id ';
        }
        

        try {
            $pdo = Database::connect();
            $sth =  $pdo->prepare($sql);
            if(!is_null($id)){
                $sth->bindValue(':id',$id,PDO::PARAM_INT);
            }
            $sth->execute();
            $appointments = $sth->fetchAll();
            return $appointments;
        } catch (\PDOException $ex) {
            return $ex;
        }
    }

    public static function view($id){
        $pdo = Database::connect();
        $sql = 'SELECT `appointments`.`id`,`dateHour`, `lastname`, `firstname`, `phone`, `mail` 
        FROM `appointments` 
        INNER JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id` 
        WHERE `appointments`.`id` = :id ';
        try {
            $sth =  $pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            
            if($sth->execute()){
                $appointment = $sth->fetch();
                if($appointment){
                    return $appointment;
                } else {
                    throw new PDOException('Le rdv n\'existe pas');
                    
                }
                
            } else {
                throw new PDOException('Erreur d\'exécution de la requête');
            }
            
        } catch (\PDOException $ex) {
            return $ex;
        }


    }

    public function update(){
        
        
        $sql = 'UPDATE `appointments` SET  `dateHour` = :dateHour WHERE `id` = :id ';
        try {
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':dateHour', $this->_dateHour, PDO::PARAM_STR);
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
    


    public static function all($id){
        $sql = 'SELECT `appointments`.`id`,`dateHour` FROM `appointments` 
        INNER JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id` 
        WHERE `patients`.`id` = :id ';
        // SELECT `appointments`.`id`,`dateHour`, `lastname`, `firstname` 
        // FROM `appointments` 
        // INNER JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id`'
        try {
            $pdo = Database::connect();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            if($sth->execute()){
                $appointment = $sth->fetchAll();
               
                if(!empty($appointment)){
                    return $appointment;
                } else {
                    throw new PDOException('Le rdv n\'existe pas');
                    
                }
                
            } else {
                throw new PDOException('Erreur d\'exécution de la requête');
            }
            
        } catch (\PDOException $ex) {
            return $ex;
        }
    }

    public static function delete($id){
        $sql = 'DELETE FROM `appointments` WHERE `id` = :id';
        try {
            $pdo = Database::connect();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            if(!$sth->execute()){
                throw new PDOException('Erreur');
            } else {
                return true;
            }
            

        } catch (\PDOException $ex) {
            
            return $ex;
        }
      

    }

}
<?php

require_once(dirname(__FILE__).'/../config/config.php');

class Database{
    // private $_dsn;
    // private $_username;
    // private $_password;
    private static $_pdoInstance;

    // Plus besoin d'instancier avec static
    public static function connect() {
        // initialisation des variables pour la connexion bdd
        // $this->_dsn = DSN;
        // $this->_username  = USERNAME;
        // $this->_password = PASSWORD;

        try {
            // connexion bdd
            if(is_null(self::$_pdoInstance)){
                self::$_pdoInstance = new PDO(DSN,USERNAME, PASSWORD);
                self::$_pdoInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
                self::$_pdoInstance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            
            return self::$_pdoInstance;
        } catch (\PDOException $ex) {
            return $ex;
    
        }
    }
    
}


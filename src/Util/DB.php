<?php

namespace Util;

/**
 * Description of DB
 *
 * @author beneppel
 */
class DB {
    
    protected static $dbInstance = null;

    /**
     *
     * @var \PDO
     */
    protected $pdo;

    protected function __construct($dsn, $username = null, $password = null) {
        $this->pdo = new \PDO($dsn, $username, $password);
        $this->pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
    }

    public function fetchAll($sql) {
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function query($sql, $parameters = array()) {
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute($parameters);
        
        return $stmt;
    }

    public function fetchOne($sql, $parameters = array()) {
        $stmt = $this->query($sql, $parameters);
        return $stmt->fetch();
    }
    
    public static function createInstance($dsn, $username = null, $password = null){
        
        if(is_null(self::$dbInstance)){
           self::$dbInstance = new self($dsn, $username, $password);          
        }
        return self::$dbInstance;
    }
    
    /**
     * 
     * @return \Util\DB
     * @throws \Exception
     */
    public static function getInstance(){
        if(self::$dbInstance instanceof self){
            return self::$dbInstance;
        }
        else{
            
            throw new \Exception('No database instance available');
        }
    }
    
    public function getLastInsertID()
    {
        return $this->pdo->lastInsertId();
    }
}

?>

<?php

namespace Services;

class Db{
    private $pdo;
    private static $instance;

    private function __construct(){
        $dbOptions = require('../src/settings.php');
        $this->pdo = new \PDO(
            'mysql:host='.$dbOptions['host'].';dbname='.$dbOptions['dbname'],
            $dbOptions['username'],
            $dbOptions['password'],
        );
        $this->pdo->exec('SET NAMES UTF8');
    }
    public static function getInstance() : self{
        if(!self::$instance){
        return self::$instance = new self;
        }
        return self::$instance;
        }
    
    public function query(string $sql, $params = [], string $className='stdClass'):?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (!$result) 
        {
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
}
<?php 
    class Database{ 
        public $conn;
        public function __construct($config){
            $dsn = "mysql:host={$config['host']};port={$config['port']}; 
            dbname={$config['database']}";

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            try {
                $this->conn = new PDO($dsn, $config['username'], 
                $config['password'], $options);
                echo 'connected';
            } catch (PDOException $e) {
               throw new Exception("Database connection failed: 
               {$e->getMessage()}"); 
            }
            
        }
    }
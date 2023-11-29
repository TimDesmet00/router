<?php

declare(strict_types=1);

namespace App\utils;

use PDO;
use PDOException;

class Database 
{
    private PdoInfo $pdoInfo;
    private ?PDO $pdo = null;

    public function __construct()
    {
        $this->pdoInfo = new PdoInfo();
    }

    public function connectDB()
    {
        try {
            $dsn = "{$this->pdoInfo->host};{$this->pdoInfo->db}";
            $this->pdo = new PDO($dsn, $this->pdoInfo->user, $this->pdoInfo->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'connection réussie';
        }
        catch(PDOException $e)
        {
            echo 'erreur de connection: ' . $e->getMessage();
        }
    }

    public function query($sql) {
        if ($this->pdo === null) {
            throw new \Exception('Must connect to DB before querying');
        }
        return $this->pdo->query($sql);
    }
}

// $pdo = new Database();
// $pdo->connectDB();
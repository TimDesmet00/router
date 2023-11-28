<?php

declare(strict_types=1);

namespace App\utils;

use PDO;
use PDOException;

class Database 
{
    private PdoInfo $pdoInfo;

    public function __construct()
    {
        $this->pdoInfo = new PdoInfo();
    }

    public function connectDB()
    {
        try {
            $dsn = "{$this->pdoInfo->host};{$this->pdoInfo->db}";
            $pdo = new PDO($dsn, $this->pdoInfo->user, $this->pdoInfo->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'connection réussie';
        }
        catch(PDOException $e)
        {
            echo 'erreur de connection: ' . $e->getMessage();
        }
    }
}

$pdo = new Database();
$pdo->connectDB();
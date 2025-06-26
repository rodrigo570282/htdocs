<?php

require_once __DIR__ . '/../database/Database.php';

class BaseModel {

    protected $pdo;
    protected $tabela;

    public function __construct()
    {
        $this->pdo = Database::conectar();
    }

}
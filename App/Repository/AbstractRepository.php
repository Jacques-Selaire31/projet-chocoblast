<?php

namespace App\Repository;

use App\Database\MySQL;
use App\Entity\EntityInterface;

abstract class AbstractRepository
{
    protected \PDO $connexion;

    protected function setConnexion():void
    {
        $this->connexion = (new MySQL())->connectBDD();
    }

    abstract public function find(int $id): ?EntityInterface;
    abstract public function findAll():array;
}

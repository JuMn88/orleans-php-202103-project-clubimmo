<?php

namespace App\Model;

class PropertyManager extends AbstractManager
{
    public const TABLE = 'property';

    public function insert(array $property): void
    {
        $query = "INSERT INTO " . self::TABLE . " (`reference`, `price`, `surface`)
                VALUES (:reference, :price, :surface)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('reference', $property['reference'], \PDO::PARAM_STR);
        $statement->bindValue('price', $property['price'], \PDO::PARAM_INT);
        $statement->bindValue('surface', $property['surface'], \PDO::PARAM_INT);

        $statement->execute();
    }
}

<?php

namespace App\Model;

class PropertyManager extends AbstractManager
{
    public const TABLE = 'property';

    public function insert(array $property): void
    {
        $query = "INSERT INTO " . self::TABLE . " (`reference`, `surface`, `price`)
                VALUES (:reference, :surface, :price)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('reference', $property['reference'], \PDO::PARAM_STR);
        $statement->bindValue('surface', $property['surface'], \PDO::PARAM_INT);
        $statement->bindValue('price', $property['price'], \PDO::PARAM_INT);

        $statement->execute();
    }

    public function selectHomeSliderInfo(int $id)
    {
        // Retrieve data to be displayed right below estate info card in home 3-fold slider
        $query =  'SELECT PR.*, S.name as city, P.name as property_type FROM ' . static::TABLE . ' PR  ';
        $query .= 'INNER JOIN sector S ON PR.sector_id = S.id ';
        $query .= 'INNER JOIN propertyType P on PR.property_type_id = P.id ';
        $query .= 'WHERE PR.id=:id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}

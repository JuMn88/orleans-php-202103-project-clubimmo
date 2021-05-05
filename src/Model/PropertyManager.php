<?php

namespace App\Model;

class PropertyManager extends AbstractManager
{
    public const TABLE = 'property';

    public function insert(array $property): int
    {
        $query = "INSERT INTO " . self::TABLE . " (`reference`, `transaction`, `address`, `price`,
        `energy_performance`, `greenhouse_gases`, `description`, `sector_id`, `property_type_id`)
                VALUES (:reference, :transaction, :address, :price,
                :energyPerformance, :greenhouseGases, :description, :sector, :propertyType)";

        $statement = $this->pdo->prepare($query);
        $statement->bindValue('reference', $property['reference'], \PDO::PARAM_STR);
        $statement->bindValue('transaction', $property['transaction'], \PDO::PARAM_STR);
        $statement->bindValue('address', $property['address'], \PDO::PARAM_STR);
        $statement->bindValue('price', $property['price'], \PDO::PARAM_INT);
        $statement->bindValue('energyPerformance', $property['energyPerformance'], \PDO::PARAM_STR);
        $statement->bindValue('greenhouseGases', $property['greenhouseGases'], \PDO::PARAM_STR);
        $statement->bindValue('description', $property['description'], \PDO::PARAM_STR);
        $statement->bindValue('sector', $property['sector'], \PDO::PARAM_INT);
        $statement->bindValue('propertyType', $property['propertyType'], \PDO::PARAM_INT);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function selectHomeSliderInfo(int $id)
    {
        // Retrieve data to be displayed right below estate info card in home 3-fold slider
        $query =  'SELECT PR.*, S.name as city, P.name as property_type FROM ' . static::TABLE . ' PR  ';
        $query .= 'INNER JOIN ' . SectorManager::TABLE . ' S ON PR.sector_id = S.id ';
        $query .= 'INNER JOIN ' . PropertyTypeManager::TABLE . '  P on PR.property_type_id = P.id ';
        $query .= 'WHERE PR.id=:id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}

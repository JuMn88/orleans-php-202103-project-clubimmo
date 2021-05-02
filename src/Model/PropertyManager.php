<?php

namespace App\Model;

class PropertyManager extends AbstractManager
{
    public const TABLE = 'property';

    public function insert(array $property): void
    {
        $query = "INSERT INTO " . self::TABLE . " (`reference`, `transaction`, `property_type`, `surface`, `price`,
        `city`, `sector`, `rooms`, `bedrooms`, `energy_performance`, `greenhouse_gases`, `photo`)
                VALUES (:reference, :transaction, :propertyType, :surface, :price, :city,
                :sector, :rooms, :bedrooms, :energyPerformance, :greenhouseGases, :photo)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('reference', $property['reference'], \PDO::PARAM_STR);
        $statement->bindValue('transaction', $property['transaction'], \PDO::PARAM_STR);
        $statement->bindValue('propertyType', $property['propertyType'], \PDO::PARAM_STR);
        $statement->bindValue('surface', $property['surface'], \PDO::PARAM_INT);
        $statement->bindValue('price', $property['price'], \PDO::PARAM_INT);
        $statement->bindValue('city', $property['city'], \PDO::PARAM_STR);
        $statement->bindValue('sector', $property['sector'], \PDO::PARAM_STR);
        $statement->bindValue('rooms', $property['rooms'], \PDO::PARAM_INT);
        $statement->bindValue('bedrooms', $property['bedrooms'], \PDO::PARAM_INT);
        $statement->bindValue('energyPerformance', $property['energyPerformance'], \PDO::PARAM_STR);
        $statement->bindValue('greenhouseGases', $property['greenhouseGases'], \PDO::PARAM_STR);
        $statement->bindValue('photo', $property['photo'], \PDO::PARAM_STR);

        $statement->execute();
    }
}

<?php

namespace App\Model;

class PropertyFeatureManager extends AbstractManager
{
    public const TABLE = 'property_feature';

    public function insert(array $property, int $propertyId): void
    {
        $query = "INSERT INTO " . self::TABLE . " (`surface`, `rooms`, `bedrooms`, `bathrooms`,
         toilets`, `parkingSpace`, `kitchen`, `lift`, `property_id`)
        VALUES (:surface, :rooms, :bedrooms, :bathrooms,
        :toilets, :parkingSpace, :kitchen, :lift, :propertyId)";

        $statement = $this->pdo->prepare($query);
        $statement->bindValue('surface', $property['surface'], \PDO::PARAM_STR);
        $statement->bindValue('rooms', $property['rooms'], \PDO::PARAM_STR);
        $statement->bindValue('bedrooms', $property['bedrooms'], \PDO::PARAM_STR);
        $statement->bindValue('bathrooms', $property['sector'], \PDO::PARAM_STR);
        $statement->bindValue('toilets', $property['toilets'], \PDO::PARAM_STR);
        $statement->bindValue('parkingSpace', $property['parkingSpace'], \PDO::PARAM_STR);
        $statement->bindValue('kitchen', $property['kitchen'], \PDO::PARAM_STR);
        $statement->bindValue('lift', $property['lift'], \PDO::PARAM_STR);
        $statement->bindValue('propertyId', $property[$propertyId], \PDO::PARAM_INT);

        $statement->execute();
    }

    public function selectFeaturesByPropertyId(int $id): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " INNER JOIN property ON "
        . self::TABLE . ".property_id=property.id INNER JOIN feature ON "
        . self::TABLE . ".feature_id=feature.id WHERE property_id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);

        $statement->execute();
        return $statement->fetchAll();
    }
}

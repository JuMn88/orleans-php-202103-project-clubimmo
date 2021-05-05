<?php

namespace App\Model;

class PropertyFeatureManager extends AbstractManager
{
    public const TABLE = 'property_feature';

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

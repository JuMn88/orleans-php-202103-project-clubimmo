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

    public function selectAll(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT p.*, pt.name AS property_type FROM ' . self::TABLE . ' p INNER JOIN ';
        $query .= PropertyTypeManager::TABLE . ' pt ON pt.id = p.propertyType_id';
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }
        return $this->pdo->query($query)->fetchAll();
    }

    public function selectAllByType(int $id)
    {
        // prepared request
        $query = 'SELECT p.*, pt.name AS property_type FROM ' . self::TABLE . ' p INNER JOIN ';
        $query .= PropertyTypeManager::TABLE . ' pt ON pt.id = p.propertyType_id WHERE p.propertyType_id =:id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}

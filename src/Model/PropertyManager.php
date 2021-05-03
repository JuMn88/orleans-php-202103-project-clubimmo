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

    public function selectProperties(?string $transaction, ?int $propertyTypeId, ?int $sectorId, ?int $budget)
    {
        // prepared request
        $query = 'SELECT p.*, pt.name AS property_type, s.name AS sector_name, min(photo.url)';
        $query .= ' AS property_photo FROM ' . self::TABLE . ' p JOIN ' . PropertyTypeManager::TABLE;
        $query .= ' pt ON pt.id = p.property_type_id JOIN '  . SectorManager::TABLE . ' s ON s.id = p.sector_id';
        $query .= ' JOIN '  . PhotoManager::TABLE . ' ON photo.property_id = p.id';
        $conditions = null;
        // Make the request that shows all the properties that correspond to the selected transaction type
        $conditions = $this->buildCondition($conditions, $transaction, 'transaction', 'transaction');
        // Make the request that shows all the properties that correspond to the selected property type
        $conditions = $this->buildCondition($conditions, strval($propertyTypeId), 'property_type_id', 'propertyTypeId');
         // Make the request that shows all the properties that correspond to the selected sector
        $conditions = $this->buildCondition($conditions, strval($sectorId), 'sector_id', 'sectorId');
         // Make the request that shows all the properties of which prices are less than or equal to the input price
        if ($budget) {
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "p.price <= :budget";
        }
        if (!empty($conditions)) {
            $query .= " WHERE " .  $conditions;
        }
        $query .= " group by p.id";
        $statement = $this->pdo->prepare($query);
        if ($transaction) {
            $statement->bindValue('transaction', $transaction, \PDO::PARAM_STR);
        }
        if ($propertyTypeId) {
            $statement->bindValue('propertyTypeId', $propertyTypeId, \PDO::PARAM_INT);
        }
        if ($sectorId) {
            $statement->bindValue('sectorId', $sectorId, \PDO::PARAM_INT);
        }
        if ($budget) {
            $statement->bindValue('budget', $budget, \PDO::PARAM_INT);
        }
        $statement->execute();
        return $statement->fetchAll();
    }
    // Created a method that add the conditions corresponding to the different search types into the origin request.
    public function buildCondition(?string $conditions, ?string $filter, ?string $tableColumn, ?string $paramId)
    {
        if ($filter) {
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "p." . $tableColumn . "=:" . $paramId;
        }
        return $conditions;
    }
}

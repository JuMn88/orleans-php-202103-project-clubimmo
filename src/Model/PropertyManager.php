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
        $queryParts = [];
        // Make the request that shows all the properties that correspond to the selected transaction type
        $queryParts = $this->buildCondition($queryParts, $transaction, 'transaction', 'transaction');
        // Make the request that shows all the properties that correspond to the selected property type
        $queryParts = $this->buildCondition($queryParts, strval($propertyTypeId), 'property_type_id', 'propertyTypeId');
         // Make the request that shows all the properties that correspond to the selected sector
        $queryParts = $this->buildCondition($queryParts, strval($sectorId), 'sector_id', 'sectorId');
         // Make the request that shows all the properties of which prices are less than or equal to the input price
        if ($budget) {
            $queryParts[] = "p.price <= :budget";
        }
        if (!empty($queryParts)) {
            $query .= " WHERE " . implode(" AND ", $queryParts);
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
    private function buildCondition(array $queryParts, ?string $filter, ?string $tableColumn, ?string $paramId): array
    {
        if ($filter) {
            $queryParts[] = "p." . $tableColumn . " =:" . $paramId;
        }
        return $queryParts;
    }
}

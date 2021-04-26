<?php

namespace App\Model;

class ContactManager extends AbstractManager
{
    public const TABLE = 'client';

    
    public function insert(array $client): void
    {
        $query1 = "(`firstname`, `lastname`, `phone`, `email`, `address`,";
        $query2 = "`propertyType`, `topic`, `city`, `postalcode`, `message`)";
        $query3 = " VALUES (:firstname, :lastname, :phone, :email, :address, ";
        $query4 = ":propertyType, :topic, :city, :postalcode,:message)";
        $query = "INSERT INTO " . self::TABLE . $query1 . $query2 . $query3 . $query4;
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('firstname', $client['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('lastname', $client['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('phone', $client['phone'], \PDO::PARAM_STR);
        $statement->bindValue('email', $client['email'], \PDO::PARAM_STR);
        $statement->bindValue('address', $client['address'], \PDO::PARAM_STR);
        $statement->bindValue('propertyType', $client['propertyType'], \PDO::PARAM_STR);
        $statement->bindValue('city', $client['city'], \PDO::PARAM_STR);
        $statement->bindValue('topic', $client['topic'], \PDO::PARAM_STR);
        $statement->bindValue('postalcode', $client['postalcode'], \PDO::PARAM_STR);
        $statement->bindValue('message', $client['message'], \PDO::PARAM_STR);
        $statement->execute();
    }

}

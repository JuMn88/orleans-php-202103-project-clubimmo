<?php

namespace App\Model;

class ContactManager extends AbstractManager
{
    public const TABLE = 'client';

    public function insert(array $client): void
    {
       // $query = "INSERT INTO " . self::TABLE . " (`firstname`, `lastname`, `phone`, `email`, `residence`,`propertyType`, `topic`, `city`, `postalcode`, `message_client`) 
       // VALUES (:firstname, :lastname, :phone, :email, :residence, :propertyType, :topic, :city, :postalcode,:message_client)";
        $query1 = "(`firstname`, `lastname`, `phone`, `email`, `residence`,`propertyType`, `topic`, `city`, `postalcode`, `message_client`)";
        $query2 = " VALUES (:firstname, :lastname, :phone, :email, :residence, :propertyType, :topic, :city, :postalcode,:message_client)";
        $query = "INSERT INTO " . self::TABLE . $query1 . $query2;
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('firstname', $client['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('lastname', $client['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('phone', $client['phone'], \PDO::PARAM_STR);
        $statement->bindValue('email', $client['email'], \PDO::PARAM_STR);
        $statement->bindValue('residence', $client['residence'], \PDO::PARAM_STR);
        $statement->bindValue('propertyType', $client['residence'], \PDO::PARAM_STR);
        $statement->bindValue('city', $client['city'], \PDO::PARAM_STR);
        $statement->bindValue('topic', $client['topic'], \PDO::PARAM_STR);
        $statement->bindValue('postalcode', $client['postalcode'], \PDO::PARAM_STR);
        $statement->bindValue('message_client', $client['message_client'], \PDO::PARAM_STR);
        $statement->execute();
    }
}

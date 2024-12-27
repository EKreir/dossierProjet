<?php

require '../vendor/autoload.php';

class MongoDBConnection {
    private $client;
    private $db;

    public function __construct() {
        // Connexion à MongoDB
        $this->client = new MongoDB\Client("mongodb://localhost:27017"); // Assurez-vous que le port et l'URL sont corrects
        $this->db = $this->client->zoo; // Base de données 'zoo'
    }

    public function getCollection($collectionName) {
        return $this->db->$collectionName;
    }
}
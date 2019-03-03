<?php
class Database {
    public $db;

    public function __construct() {
        $this->db = new PDO('mysql:dbname=blackjack;host=localhost', 'thomasdethorey', 'Thomas', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    }
}

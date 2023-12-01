<?php
require_once('db.php');

class Home {
    private $database;

    public function __construct() {
        $this->database = new Database();
        $this->createUsersTable();
    }

    private function createUsersTable() {
        $sql = "CREATE TABLE IF NOT EXISTS gebruikers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            voornaam VARCHAR(255) NOT NULL,
            achternaam VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL
        )";

        if ($this->database->verbinding->query($sql) === TRUE) {
            echo "Tabel 'gebruikers' succesvol aangemaakt!";
        } else {
            echo "Fout bij het aanmaken van de tabel: " . $this->database->verbinding->error;
        }
    }

    public function addUserData($voornaam, $achternaam, $email) {
        $sql = "INSERT INTO gebruikers (voornaam, achternaam, email) VALUES (?, ?, ?)";
        $stmt = $this->database->verbinding->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sss", $voornaam, $achternaam, $email);
            $stmt->execute();

            echo "Gebruikersgegevens succesvol toegevoegd!";
        } else {
            echo "Fout bij het laaden van de SQL: " . $this->database->verbinding->error;
        }

        $stmt->close();
    }
}
$home = new Home();
$home->addUserData("Omer", "Kilic", "omerk@gmail.com");
?>

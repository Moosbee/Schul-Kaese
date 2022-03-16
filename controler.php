<?php

class kaese
{
    public $CardID;
    public $Titel;
    public $imageLink;
    public $Text;
    function __construct($CardID, $Titel, $imageLink, $Text)
    {
        $this->CardID = $CardID;
        $this->Titel = $Titel;
        $this->imageLink = $imageLink;
        $this->Text = $Text;
    }
}

class DataCtrl
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "medkasprojekt";
    private $port = 3306;
    private $connection = null;


    function __construct()
    {
        $this->connect();
    }

    function __destruct()
    {
        $this->connection->close();
    }

    private function connect()
    {
        // Create connection
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbName, $this->port);
        // Check connection
        if ($this->connection->errno) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
    public function GetKas($index)
    {
        $SQL = "SELECT * FROM eintraege WHERE CardID=" . $index;
        $result = $this->connection->query($SQL);
        if ($result->num_rows == 1) {

            while ($row = $result->fetch_assoc()) {
                $kas = new kaese($row["CardID"], $row["Titel"], $row["imageLink"], $row["Text"]);
                return $kas;
            }
        } else {
            return null;
        }
    }

    public function GetAllKas()
    {
        $SQL = "SELECT * FROM eintraege";
        $result = $this->connection->query($SQL);
        $kaese = array();
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $kas = new kaese($row["CardID"], $row["Titel"], $row["imageLink"], $row["Text"]);
                array_push($kaese, $kas);
            }
        } else {
            return null;
        }

        return $kaese;
    }

    public function insertKas($Titel, $imageLink, $Text)
    {
        $Statement = $this->connection->prepare("INSERT INTO eintraege (Titel, imageLink, Text) VALUES (?,?,?); ");
        $Statement->bind_param("sss", $Titel, $imageLink, $Text);
        $Statement->execute();
        return $this->connection->insert_id;
    }

    public function deleteKas($index)
    {
        $sql = "DELETE FROM eintraege WHERE CardID=" . $index;

        if ($this->connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}

class snipets
{
    public function getCardView($Titel, $imageLink, $Text, $CardID)
    {
        $contentCardView = file_get_contents("./cardView.txt");

        $contentCardView = str_replace("{{Titel}}", $Titel, $contentCardView);
        $contentCardView = str_replace("{{imageLink}}", $imageLink, $contentCardView);
        $contentCardView = str_replace("{{Text}}", $Text, $contentCardView);
        $contentCardView = str_replace("{{CardID}}", $CardID, $contentCardView);

        return $contentCardView;
    }

    public function normalize($name, $replacement = '-')
    {
        $name = preg_replace("/[^a-zA-Z0-9.]_/", "", $name);

        return $name;
    }
}

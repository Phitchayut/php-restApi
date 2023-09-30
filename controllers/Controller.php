<?php
class Controller
{
    private $db;

    public function __construct()
    {
        $path = str_replace("controllers", "", __DIR__);
        require_once($path . "/vendor/autoload.php");

        $dotenv = Dotenv\Dotenv::createImmutable($path);
        $dotenv->load();

        require_once($path . "/config/Database.php");

        $database = new Database($_ENV["HOST"], $_ENV["DATABASENAME"], $_ENV["USERNAME"], $_ENV["PASSWORD"], $_ENV["PORT"]);

        $this->db = $database->connection();
    }

    public function connention()
    {
        return $this->db;
    }
}
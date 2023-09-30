<?php

$path_include = str_replace("\controllers\user", "", __DIR__);
require_once($path_include . "/controllers/Controller.php");
require_once($path_include . "/vendor/autoload.php");


class UserController extends Controller
{
    private $db;
    private $result;

    public function __construct()
    {
        parent::__construct();

        $this->db = $this->connention();

        $path = str_replace("\controllers\user", "", __DIR__);
        require_once($path . "/models/UserModel.php");
    }

    public function getUserAll()
    {

        $this->result = null;

            try {
                $userModel = new UserModel($this->db);
                $this->result = $userModel->getAll();
            } catch (PDOException $e) {
                $this->result = false;
            }


        return $this->result;
    }
}

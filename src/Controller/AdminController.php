<?php


namespace Src\Controller;

use Src\TableGateways\AdminGateway;

class AdminController
{
    private $adminGateway = null;
    private $db = null;

    private $login;
    private $password;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
        $this->adminGateway = new AdminGateway($dbConnection);
    }

    public function actionLogin()
    {
        $this->login = filter_input(0, "validationServerLogin");
        $this->password = filter_input(0, "validationServerPassword");
        if($this->isFormAuthorisation()) {
            $this->adminGateway->login = $this->login;
            $this->adminGateway->password = $this->password;

            if($this->adminGateway->checkAuth()) {
                //$cookie_name = "admin";
                //$cookie_value = $this->login;
                //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 1 day
                $_SESSION['admin'] = $this->login;
                return true;
            }
        }
        return false;
    }

    public function checkAdminCookie()
    {
        return (isset($_COOKIE["admin"]) && strlen($_COOKIE["admin"]) > 0);
    }

    public function checkAdminSession()
    {
        return !empty($_SESSION['admin']);
    }

    public function actionLogout()
    {
        //setcookie("admin", '', time() - 3600,'/');
        unset($_SESSION['admin']);
        header('Location: /');
        return true;
    }

    private function isFormAuthorisation()
    {
        if(filter_has_var(0, 'validationServerLogin') and
           filter_has_var(0, 'validationServerPassword')) {
            return true;
        } else {
            return false;
        }
    }
}
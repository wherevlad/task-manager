<?php
namespace Src\Controller;

use Src\Controller\AdminController;
use Src\TableGateways\TaskGateway;

class TaskController
{
    private $taskGateway = null;
    private $adminController = null;
    private $db;

    public function __construct($dbConnection)
    {
        $this->taskGateway = new TaskGateway($dbConnection);
        $this->adminController = new AdminController($dbConnection);
        $this->db = $dbConnection;
    }

    public function parseFormAddTask()
    {
        if($this->isFormAddTaskHasValue()) {
            $this->taskGateway->name = filter_input(0, "validationServerUsername");
            $this->taskGateway->email = filter_input(0, "validationServerEmail");
            $this->taskGateway->description = filter_input(0, "validationServerTaskDescription");
            $this->taskGateway->status = 0;
            $this->taskGateway->createTask();
            header('Location: /');
        }
    }

    public function parseFormUpdateTask($idTask)
    {
        if($this->isFormUpdateTaskHasValue() and $this->adminController->checkAdminSession()) {
            $this->taskGateway->name = filter_input(0, "validationFormUpdateTaskName");
            $this->taskGateway->email = filter_input(0, "validationFormUpdateTaskEmail");
            $this->taskGateway->description = filter_input(0, "validationFormUpdateTaskDescription");

            if (is_null(filter_input(0, "validationFormUpdateTaskStatus"))) {
                $this->taskGateway->status = 0;
            } else {
                $this->taskGateway->status = 1;
            }

            $this->taskGateway->updateTask($idTask);
            header('Location: /');
        }
    }

    public function getTaskList()
    {
        return $this->taskGateway->readAllTask();
    }

    public function getTaskOne($idTask)
    {
        return $this->taskGateway->readOneTask($idTask);
    }

    private function isFormAddTaskHasValue()
    {
        if(filter_has_var(0, 'validationServerUsername') and
            filter_has_var(0, 'validationServerEmail') and
            filter_has_var(0, 'validationServerTaskDescription')) {
            return true;
        } else {
            return false;
        }
    }

    private function isFormUpdateTaskHasValue()
    {
        if(filter_has_var(0, 'validationFormUpdateTaskName') and
            filter_has_var(0, 'validationFormUpdateTaskEmail') and
            filter_has_var(0, 'validationFormUpdateTaskDescription')) {
            return true;
        } else {
            return false;
        }
    }
}
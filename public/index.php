<?php

use Src\Controller\TaskController;
use Src\Controller\AdminController;

require "../bootstrap.php";

$page_title = "To Do List";
include_once "../template/header.php";

session_start();

$taskController = new TaskController($dbConnection);
$adminController = new AdminController($dbConnection);

$listTask = $taskController->getTaskList();

if (filter_has_var(0, 'validationServerAddTaskButton')) {
    $taskController->parseFormAddTask();
}
if (filter_has_var(0, 'validationFormUpdateTaskButton')) {
    $idTask = filter_input(0, "validationFormUpdateTaskButton");
    $taskController->parseFormUpdateTask($idTask);
}


if (filter_has_var(0, 'validationServerAuthorisationButton')) {
    $adminController->actionLogin();
    header('Location: /');
} elseif (filter_has_var(0, 'validationServerUnAuthorisationButton')){
    $adminController->actionLogout();
    header('Location: /');
}


include_once "../template/authorisation_form.php";

include_once "../template/add_task_form.php";
include_once "../template/print_task_table.php";

include_once "../template/footer.php";
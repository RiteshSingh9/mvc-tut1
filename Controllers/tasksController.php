<?php

class tasksController extends Controller
{
    public function index()
    {
        /**
         * 
         * it will get data from database
         * 
         */
        require(ROOT . 'Models/Task.php');
        $tasks = new Task();

        $d['title'] = "Tasks";
        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }
    public function create($params)
    {
        /**
         * 
         * it will show the task create page to user
         * 
         */
        $msg = '';
        if (isset($_POST["title"]) && isset($_POST["desc"])) {
            // to add data to database
            // check if title and discription are not empty
            if ($_POST['title'] == '') {
                $msg = "Title Not Given";
            }
            if ($_POST['desc'] == '') {
                $msg .= " Desc Not Given";
            }
            if ($_POST['title'] != '' && $_POST['desc'] != '') {
                require(ROOT . 'Models/Task.php');
                $tasks = new Task();

                if ($tasks->create($_POST["title"], $_POST["desc"])) {
                    header("Location: " . WEBROOT . "task");
                }
            }
        }
        $d['msg'] = $msg;
        $d['title'] = $params['title'];
        $this->set($d);
        $this->render("create");
    }
}

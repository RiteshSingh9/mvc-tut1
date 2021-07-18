<?php

class taskController extends Controller
{
    public $tasks;
    public function __construct()
    {
        require(ROOT . 'Models/Task.php');
        $this->tasks = new Task();
    }
    public function index()
    {
        /**
         * 
         * it will get data from database
         * 
         */
        // require(ROOT . 'Models/Task.php');
        // $tasks = new Task();

        $d['title'] = "Tasks";
        $d['tasks'] = $this->tasks->showAllTasks();
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
                // require(ROOT . 'Models/Task.php');
                // $tasks = new Task();

                if ($this->tasks->create($_POST["title"], $_POST["desc"])) {
                    header("Location: " . WEBROOT . "task");
                }
            }
        }
        $d['msg'] = $msg;
        $d['title'] = $params['title'];;
        $this->set($d);
        $this->render("create");
    }

    public function edit($params)
    {
        // require(ROOT . 'Models/Task.php');
        $msg = '';
        extract($params['key']);

        $d['title'] = $params['title'];

        // to update values
        if (isset($_POST["edit-title"]) && isset($_POST["edit-desc"])) {
            // to add data to database
            // check if title and discription are not empty
            if ($_POST['edit-title'] == '') {
                $msg = "Title Not Given";
            }
            if ($_POST['edit-desc'] == '') {
                $msg .= " Desc Not Given";
            }
            if ($_POST['edit-title'] != '' && $_POST['edit-desc'] != '') {

                if ($this->tasks->edit($id, $_POST["edit-title"], $_POST["edit-desc"])) {
                    header("Location: " . WEBROOT . "task");
                }
            }
        }

        $d['msg'] = $msg;
        $d['task'] = $this->tasks->showTask($id); // store the values in task
        $this->set($d);
        $this->render("edit");
    }
    public function delete($params)
    {
        $d['title'] = $params['title'];
        extract($params['key']);
        if ($this->tasks->delete($id)) {
            header("Location: " . WEBROOT . "task");
        }
    }
}

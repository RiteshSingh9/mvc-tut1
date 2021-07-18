<?php
require(ROOT . "Config/Config.php");
$baseurl=$config['dev']['baseURL'];
?>

<h1>Tasks</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            
            <a href="<?php echo $baseurl.'task/create'?>" class="btn btn-primary btn-xs pull-right w-25"><b>+</b> Add new task</a>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Description</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($tasks != NULL) {
            // print_r($tasks);
            $i=1;
            foreach ($tasks as $task) {
                // echo '<tr>';
                // echo "<td>" . $task['task_id'] . "</td>";
                // echo "<td>" . $task['task_title'] . "</td>";
                // echo "<td>" . $task['task_desc'] . "</td>";
                // echo "<td class='text-center'><a class='btn btn-info btn-xs' href=" . $task['task_id] . "><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/MVC_todo/tasks/delete/" . $task["id"] . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
                // echo "</tr>";
                echo '
                    <tr>
                        <td>' . $i++ . '</td>
                        <td>' . $task['task_title'] . '</td>
                        <td>' . $task['task_desc'] . '</td>
                        <td class="text-center">
                            <a class="btn btn-info" href="'.$baseurl.'task/edit/'. $task['task_id'] .'">Edit</a>
                            <a class="btn btn-danger" href="'.$baseurl.'task/delete/'. $task['task_id'] .'">Delete</a>
                        </td>
                    </tr>
                ';
                // echo $task."<br />";
                // print_r($task);
            }
        } else {
            echo '
                <div class="container bg-warning h-100">
                    <b>No Tasks to show</b>
                </div>
            ';
        }
        ?>
        </tbody>
    </table>
</div>
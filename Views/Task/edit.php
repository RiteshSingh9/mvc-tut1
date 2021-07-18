<h1>Edit Page</h1>
<form action="" method="post" class="form">
    <div class="mb-3 my-5">
        <input type="text" class="form-control" name="edit-title" id="edit-title" value="<?php echo $task['task_title'] ?>" placeholder="Edit Title">
    </div>
    <div class="mb-3 mt-5">
        <textarea class="form-control" name="edit-desc" id="edit-desc" rows="3" placeholder="Edit discription"><?php echo $task['task_desc'] ?></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-outline-primary w-25">Update</button>
    </div>
    <?php
        echo $msg;
        // print_r($task);
        // echo $task['task_desc'];
    ?>
</form>
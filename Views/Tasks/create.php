<h1>Create Page</h1>
<form action="#" method="post" class="form">
    <div class="mb-3 my-5">
        <!-- <label for="title" class="form-label">Title</label> -->
        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
    </div>
    <div class="mb-3 mt-5">
        <!-- <label for="desc" class="form-label">Discription</label> -->
        <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="Task discription"></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-outline-primary w-25">Add</button>
    </div>
    <?php
        // foreach ($msg as $key => $value) {
        //     echo $value;
        // }
        echo $msg;
    ?>
</form>
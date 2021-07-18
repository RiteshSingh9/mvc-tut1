<?php
class Task extends Model
{
    public function showAllTasks()
    {
        /**
         * list of all tasks
         */
        $sql = "SELECT * FROM `tasks`";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function showTask($id)
    {
        /**
         * shows task by id
         */
        $sql = "SELECT * FROM `tasks` WHERE `task_id`=" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function create($title, $desc)
    {
        // current_timestamp()
        /**
         * insert data in tasks table
         */
        $sql = "INSERT INTO `tasks` (`task_id`, `task_title`, `task_desc`, `task_created_at`, `task_updated_at`) VALUES (NULL, :title, :desc, :created_at, :updated_at);";

        $req = Database::getBdd()->prepare($sql);
        return $req->execute([
            'title' => $title,
            'desc' => $desc,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function edit($id, $title, $desc)
    {
        $sql = "UPDATE `tasks` SET `task_title` = :title, `task_desc` = :desc, `task_updated_at` = :updated_at WHERE `task_id`=:id";

        $req = Database::getBdd()->prepare($sql);
        return $req->execute([
            'id' => $id,
            'title' => $title,
            'desc' => $desc,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `tasks` WHERE `task_id`=?";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }
}

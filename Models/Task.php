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
    public function create($title, $desc)
    {
        // current_timestamp()
        /**
         * insert data in tasks table
         */
        $sql = "INSERT INTO `tasks` (`task_id`, `task_title`, `task_desc`, `task_created_at`, `task_updated_at`) VALUES (NULL, :title, :desc, :created_at, :updated_at);";

        $req = Database::getBdd()->prepare($sql);
        return $req->execute([
            'title'=> $title,
            'desc'=> $desc,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
<?php
class Task
{
    private $description;
    private $id;

    function __construct($task_description, $task_id = null)
    {
        $this->description = $task_description;
        $this->id = $task_id;
    }

    function SetDescription($new_description)
    {
        $this->description = (string) $new_description;
    }

    function GetDescription()
    {
        return $this->description;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO tasks (description) VALUES ('{$this->GetDescription()}')");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_tasks = $GLOBALS['DB']->query("SELECT * FROM tasks;");
        $tasks = array();
        foreach($returned_tasks as $task) {
            $description = $task['description'];
            $id = $task['id'];
            $new_task = new Task($description, $id);
            array_push($tasks, $new_task);
        }
        return $tasks;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM tasks;");
    }
}
?>

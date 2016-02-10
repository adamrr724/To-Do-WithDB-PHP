<?php
class Task
{
    private $description;

    function __construct($task_description)
    {
        $this->description = $task_description;
    }

    function SetDescription($new_description)
    {
        $this->description = (string) $new_description;
    }

    function GetDescription()
    {
        return $this->description;
    }

    function save()
    {
        array_push($_SESSION['list_of_tasks'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_tasks'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_tasks'] = array();
    }
}
?>

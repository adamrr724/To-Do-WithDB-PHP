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



?>

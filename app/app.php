<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Task.php";

    session_start();
    if (empty($_SESSION['list_of_tasks'])) {
        $_SESSION['list_of_tasks'] = array();
    }




    $app = new Silex\Application();

    $app->get("/", function() {

        $output = "";

        foreach (Task::getAll() as $task) {
            $output .= "<h2>" . $task->getDescription() . "</h2>";
        }

        $output .= "
        <form action='/tasks' method='post'>
            <label for='description'>Task Description</label>
            <input id='description' name='description' type='text'>

            <button type='submit'>Add Task</button>
        </form>
        ";

        return $output;
    });

    $app->post("/tasks", function () {
        $new_task = new Task($_POST['description']);
        $new_task->save();
        return "
            <h1>You created a task!</h1>
            <p>" . $new_task->getDescription() . "</p>
            <p><a href= '/'>View your list of things to do.</a></p>
            ";
    });

    return $app;
?>

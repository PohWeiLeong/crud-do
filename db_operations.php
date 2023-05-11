<?php
include('dbcon.php');

function addTask($title, $description) {
    global $con;

    $title = mysqli_real_escape_string($con, $title);
    $description = mysqli_real_escape_string($con, $description);

    $sql = "INSERT INTO todolist (title, description, completed) VALUES ('$title', '$description', 0)";
    mysqli_query($con, $sql);

    // You can include additional logic here, such as error handling or success messages
    header('Location: todolist.php');
    exit;
}

function toggleTaskCompletion($con, $id) {
    $sql = "SELECT completed FROM todolist WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $completed = $data['completed'];

    if ($completed == 1) {
        $sql = "UPDATE todolist SET completed = 0 WHERE id = $id";
    } else {
        $sql = "UPDATE todolist SET completed = 1 WHERE id = $id";
    }

    mysqli_query($con, $sql);
}

function removeTask($con, $id) {
    // Prepare the delete query
    $sql = "DELETE FROM todolist WHERE id = '$id'";
    
    // Execute the delete query
    mysqli_query($con, $sql);
}
function getAllTasks() {
    global $con;

    $sql = "SELECT * FROM todolist";
    $results = mysqli_query($con, $sql);

    // Fetch all rows from the result set into an associative array
    $tasks = mysqli_fetch_all($results, MYSQLI_ASSOC);

    // Free the result set
    mysqli_free_result($results);

    return $tasks;
}
?>
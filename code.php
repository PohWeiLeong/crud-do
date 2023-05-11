<?php
include('db_operations.php');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Check if the task already exists in the database
    $sql = "SELECT * FROM todolist WHERE title = '$title' AND description = '$description'";
    $result = mysqli_query($con, $sql);
    $existingTask = mysqli_fetch_assoc($result);

    if (!$existingTask) {
        // Task doesn't exist, proceed with insertion
        $sql = "INSERT INTO todolist (title, description) VALUES ('$title', '$description')";
        mysqli_query($con, $sql);
    }

    header('Location: todolist.php');
} elseif (isset($_POST['btn_change'])) {
    $id = $_POST['id'];

    // Toggle the completion status of the task
    toggleTaskCompletion($con, $id);

    header('Location: todolist.php');
} elseif (isset($_POST['btn_remove'])) {
    $id = $_POST['id'];

    // Remove the task
    removeTask($con, $id);

    header('Location: todolist.php');
}
?>

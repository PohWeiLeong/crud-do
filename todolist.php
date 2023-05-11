<?php
include('db_operations.php');

$results = getAllTasks();

?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
    
<script>
  
function change(id) {
    fetch('code.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'btn_change=true&id=' + id
    })
    .then(response => {
        if (response.ok) {
            location.reload(); // Reload the page after successful completion
        } else {
            console.log('Error: ' + response.status);
        }
    })
    .catch(error => {
        console.log('Error: ' + error);
    });
}


function cancel(id) {
  if (confirm('Are you sure you want to remove this task?')) {
    fetch('code.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'btn_remove=true&id=' + id
    })
    .then(response => {
      if (response.ok) {
        location.reload(); // Reload the page after successful completion
      } else {
        console.log('Error: ' + response.status);
      }
    })
    .catch(error => {
      console.log('Error: ' + error);
    });
  }
}

</script>
</head>
<body>
    <html>

    <head>
        <title>Create Task</title>
    </head>

    <body>
        <h1>Create Task</h1>

        <div id="header">

          <form action="code.php" method="POST">
              <label>Title:</label>
              <input type="text" name="title" required><br>
              <label>Description:</label>
              <input type="text" name="description" required><br>
              <button type="submit" name="submit" >Add</button>
          </form>
       </div>

       <div id="content">
        <table>
          
         <tr>
              <th> Title</th>
              <th> Description</th>
              <th> Complete</th>
              <th> Action</th>
             
        </tr>
            
          <?php 
              
              $sql = "SELECT * FROM todolist";
              $results = mysqli_query($con, $sql);
              while ($data = mysqli_fetch_assoc($results)) {
                ?>

            <tr>
              <td> <?=$data['title'];?></td>
              <td> <?=$data['description'];?></td>
              <td> <input type="checkbox" name="completed" onchange="change(<?=$data['id'];?>)" <?= ($data['completed']==1)? 'checked':'' ?> > </td>
              <td> <button name="cancel" id="btn_cancel" onclick="cancel(<?=$data['id'];?>)"> remove </button></td>
            </tr>

          <?php }; ?> 

        </table>
       </div>

    </body>

    </html>

</body>




</html>
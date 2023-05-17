<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- Header Section -->
    <div class="header1">
        <img src="/images/PTA_logo.jpeg" alt="logo">
    </div>
    <!-- Card Section for form -->
    <div class="card">
        <form method="post" action="/Update/create">
    <!-- Input to update task -->
            <div>
                <h2>Enter Task to Update</h2>
                <input type="hidden" name="Task_no" value="<?php echo $Task_no ?>">
                <input name="updateTask" type="text" value="<?php echo $Task?>" autocomplete="off" required>
            </div>
            <div>
                <input type="submit" value="Update">
            </div>
            <div>
                <a href="/Display/display">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
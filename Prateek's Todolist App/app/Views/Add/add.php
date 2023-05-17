<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- Header Section -->
    <div class="header1">
        <img src="/images/PTA_logo.jpeg" alt="logo">
    </div>
    <!-- Card section for form -->
    <div class="card">
        <form method="post" action="/Add/create">
            <div>
                <!-- Input Task to add -->
                <h2>Enter Task to Add</h2>
                <input name="addTask" type="text" placeholder="Enter Task" autocomplete="off" required>
            </div>
            <div>
                <input type="submit" value="Add">
            </div>
            <div>
                <a href="/Display/display">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
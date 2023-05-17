<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="/css/mainpage.css">
</head>
<body>
    <!-- Header Section -->
    <div class="flexbox1">
        <div class="header1">
            <img src="/images/PTA_logo.jpeg" alt="logo">
        </div>
        <div class="flexbox">
            <form method="post" action="/Add/index">
                <div>
                    <input type="submit" name="addTask" value="Add Task">
                </div>
            </form>

            <form method="post" action="/Home/index">
                <div>
                    <input type="submit" value="Log Out">
                </div>
            </form>
        </div>
    </div>
    <div>
        <h1>
            Welcome 
            <?php $n=''; 
            foreach($dis as $d)
            {
                $n=$d['Email'];
            } 
            echo $n; ?>
        </h1>
    <!-- Creating a table to display the added and updated tasks -->
        <table>
            <th>Task</th>
            <th>Delete</th>
            <th>Update</th>
            <th>Status</th>
            <?php foreach($dis as $d){ ?>
            <tr>
                <td><?php echo $d['Task'] ?></td>
                <td>
                    <form method="post" action="/Delete/create">
                        <div>
                            <input type="hidden" name="Task_no" value="<?php echo $d['Task_no'] ?>">
                            <input type="submit" name="deleteTask" value="Delete">
                        </div>
                    </form>
                </td>
                <td>
                    <form method="post" action="/Update/index">
                        <div>
                            <input type="hidden" name="Task_no" value="<?php echo $d['Task_no'] ?>">
                            <input type="hidden" name="Task" value="<?php echo $d['Task'] ?>">
                            <input type="submit" name="updateTask" value="Update">
                        </div>
                    </form>
                </td>
                <td>
                    <div class="flexbox">
                        <div>
                            <form method="post" action="/Status/create">
                                <input type="hidden" name="Task_no" value="<?php echo $d['Task_no'] ?>">
                                <input type="hidden" name="Status" value="<?php echo $d['Status'] ?>">
                                <input type="submit" value="<?php if($d['Status']=='Not Completed'){echo "Marks as Done"; } else{ echo "Unmark";} ?>" >
                            </form>
                        </div>
                        <div>
                            <?php echo $d['Status'] ?>
                        </div>
                    </div>
                    
                </td>
            </tr>
        
            <?php }
            ?>
        </table>
        
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="/js/new.js"></script>
    <script>
    function myFunction() {
    var x = document.getElementById("Password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
    function myFunction2() {
    var x = document.getElementById("Confirm_Password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
    </script>
</head>
<body>
    <!-- Header Section -->
    <div class="header1">
        <img src="/images/PTA_logo.jpeg" alt="logo">
    </div>
    <!-- Creating a form for login -->
    <div class="card">
        <form method="post" action="/Signup/create">
            <div>
                <div>
                    <div>
                        <!-- Input for username -->
                        <h2>Name</h2>
                        <input name="Name" id="Name" type="text" placeholder="Name" autocomplete="off" required>
                    </div>
                </div>
                <div>
                    <div>
                        <!-- Input for Email -->
                        <h2>Email</h2>
                        <input name="Email" id="Email" type="email" placeholder="Email" autocomplete="off" required>
                    </div>
                </div>
                <div>
                    <div>
                        <!-- Input for password -->
                        <h2>Password</h2>
                        <input name="Password" id="Password" type="password" placeholder="Password" required>
                    </div>
                    <input type="checkbox" onclick="myFunction()" >Show Password
                </div>
                <div>
                    <div>
                        <!-- Input for password -->
                        <h2>Confirm Password</h2>
                        <input name="Confirm_Password" id="Confirm_Password" type="password" placeholder="Confirm Password" required>
                    </div>
                    <input type="checkbox" onclick="myFunction2()" >Show Password
                </div>
                <div>
                    <!-- Signup submit type -->
                    <input type="submit" name="Signup" value="Signup">
                </div>
                <div>
                    Already Registered ? <a href="/Home/index">Login</a>
                </div>
            </div>
        </form> 
    </div>
</body>
</html>

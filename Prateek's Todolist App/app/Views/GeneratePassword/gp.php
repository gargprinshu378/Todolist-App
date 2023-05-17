<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Password</title>
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
    <!-- Card Section for form -->
    <div class="card">
        <form method="post" action="/FP/reset">
            <div>
                <h2>Password</h2>
                <input name="Password" id="Password" type="password" placeholder="Enter Password" required>
                <!-- Show Password -->
                <input type="checkbox" onclick="myFunction()" >Show Password
            </div>
            <div>
                <h2>Confirm Password</h2>
                <input name="Password" id="Confirm_Password" type="password" placeholder="Re-enter Password" required>
                <input type="checkbox" onclick="myFunction2()" >Show Password
            </div>
            <div>
            <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
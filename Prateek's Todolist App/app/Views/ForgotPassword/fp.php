<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- Header Section -->
    <div class="header1">
        <img src="/images/PTA_logo.jpeg" alt="logo">
    </div>
    <!-- Card Section for form -->
    <div class="card">
        <form method="post" action="/FP/sendotp">
            <div>
                <!-- Input Email -->
                <h2>Email</h2>
                <input name="Email" id="Email" type="email" placeholder="Email" autocomplete="off" required>
            </div>
            <div>
                <input type="submit" name="SendOTP" value="Send OTP">
            </div>
            <div>
                <a href="/Home/index">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
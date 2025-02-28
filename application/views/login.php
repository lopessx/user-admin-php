<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(17, 34, 55, 1) 35%, rgba(10, 84, 133, 1) 100%);
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .card {
            width: 350px;
            padding: 20px;
            color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            margin: 10px;
            background-color: #00008b;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #030347;
        }

        .inputForm:focus {
            background: #d1d1d1;
        }

        #imgLogoWrap {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        #imgLogo {
            opacity: 0.1;
        }
    </style>
    <script>
        function redirectToRegister() {
            window.location.href = '/register'
        }
    </script>
</head>

<body>
    <div class="card">
        <div id="imgLogoWrap" class="form-group">
            <img id="imgLogo" src="/assets/logo-mm.png" alt="logo" />
        </div>
        <h3>Login</h3>
        <form action="login/auth" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="inputForm" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="inputForm" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <button type="button" class="btn" onclick="redirectToRegister()">Register</button>
        </form>
    </div>
</body>

</html>
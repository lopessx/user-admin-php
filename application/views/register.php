<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            width: 400px;
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
            background-color: #00008b;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
        }

        .btn.btn-back {
            background-color:rgb(255, 255, 255);
            color: black;
            margin: 10px 0px;
        }

        .btn.btn-back:hover {
            background-color:rgb(202, 202, 202);
            color: black;
            margin: 10px 0px;
        }

        .btn:hover {
            background-color: #030347;
        }

        #address {
            display: none;
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
            height: 70px;
        }
    </style>
    <script>
        function formatZipcode(input) {
            let value = input.value.replace(/\D/g, '');
            if (value.length > 5) {
                value = value.substring(0, 5) + '-' + value.substring(5, 8);
            }
            input.value = value;
        }

        function validatePasswords(event) {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm_password").value;
            if (password !== confirmPassword) {
                event.preventDefault();
                alert("Passwords do not match!");
            }
        }

        function showNextStep() {
            document.getElementById('mainRegister').style = 'display: none;'
            document.getElementById('address').style = 'display: block;'
        }

        function stepBack() {
            document.getElementById('mainRegister').style = 'display: block;'
            document.getElementById('address').style = 'display: none;'
        }
    </script>
</head>

<body>
    <div class="card">
        <h3>Register</h3>
        <form id="registerForm" action="register/new" method="post" onsubmit="validatePasswords(event)">
            <div id="mainRegister">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="inputForm" type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="inputForm" type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="inputForm" type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input class="inputForm" type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="button" class="btn" onclick="showNextStep()">Continue ></button>
            </div>
            <div id="address">
                <div class="form-group">
                    <label for="zipcode">Zipcode</label>
                    <input class="inputForm" type="text" id="zipcode" name="zipcode" required maxlength="9" oninput="formatZipcode(this)">
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input class="inputForm" type="text" id="state" name="state" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input class="inputForm" type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="street">Street</label>
                    <input class="inputForm" type="text" id="street" name="street" required>
                </div>
                <div class="form-group">
                    <label for="number">Number</label>
                    <input class="inputForm" type="text" id="number" name="number" required>
                </div>
                <button type="submit" class="btn">Register ></button>
                <button type="button" class="btn btn-back" onclick="stepBack()">< Back</button>

            </div>
        </form>

        <div id="imgLogoWrap" class="form-group">
            <img id="imgLogo" src="/assets/logo-mm.png" alt="logo" />
        </div>
    </div>
</body>

</html>
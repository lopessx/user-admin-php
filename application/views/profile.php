<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(17, 34, 55, 1) 35%, rgba(10, 84, 133, 1) 100%);
        }

        .container {
            width: 400px;
            padding: 20px;
            color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 0.9em;
            display: none;
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

        .btn:hover {
            background-color: #030347;
        }

        .inputForm:focus {
            background: #d1d1d1;
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

        function validatePassword() {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm_password").value;
            let errorMessage = document.getElementById("password_error");

            if (password !== confirmPassword) {
                errorMessage.style.display = "block";
                return false;
            } else {
                errorMessage.style.display = "none";
                return true;
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("editProfileForm").addEventListener("submit", function(event) {
                if (!validatePassword()) {
                    event.preventDefault();
                }
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Edit Profile</h3>
        <form id="editProfileForm" action="/profile/edit/" method="post">
        <input type="hidden" name="address_id" value="<?php echo $address_id; ?>" />
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
        <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">New Password (leave blank to keep current)</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" oninput="validatePassword()">
                <p id="password_error" class="error">Passwords do not match!</p>
            </div>
            <div class="form-group">
                <label for="zipcode">Zipcode</label>
                <input type="text" id="zipcode" name="zipcode" value="<?php echo $zipcode; ?>" required maxlength="9" oninput="formatZipcode(this)">
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" name="state" value="<?php echo $state; ?>" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" value="<?php echo $city; ?>" required>
            </div>
            <div class="form-group">
                <label for="street">Street</label>
                <input type="text" id="street" name="street" value="<?php echo $street; ?>" required>
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="text" id="number" name="number" value="<?php echo $number; ?>" required>
            </div>
            <button type="submit" class="btn">Save Changes</button>
        </form>

        <!-- Logout Button -->
        <form action="/login/logout" method="post" style="margin-top: 20px;">
            <button type="submit" class="btn" style="background-color: #dc3545;">Logout</button>
        </form>
    </div>
</body>

</html>
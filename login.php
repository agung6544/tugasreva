<?php
session_start();
$loginStatus = isset($_SESSION['login_status']) ? $_SESSION['login_status'] : null;
unset($_SESSION['login_status']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>KopiKisah - Login</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #222;
        }
        form {
            width: 300px;
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            background-color: #444;
            color: white;
            border: none;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            width: 100%;
            background-color: #555;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #666;
        }
        .message {
            text-align: center;
            margin-top: 10px;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Login Form -->
    <div>
        <h2 style="text-align:center; color: white;">Login</h2>
        <form action="login_process.php" method="post">
            <label style="color: #fff;">Username: </label><br>
            <input type="text" name="username" required><br>
    
            <label style="color: #fff;">Password:</label><br>
            <input type="password" name="password" required><br>

            <button type="submit">Login</button>
        </form>

        <div class="login-box">
        <!-- Form login -->
        <div class="message" id="loginMessage"></div>

        <!-- Tombol kembali -->
        <div class="mt-4">
        <a href="index.html" class="btn btn-secondary">Kembali ke Menu</a> 
        </div>
    </div>



    <script>
        const loginStatus = <?= json_encode($loginStatus) ?>;
        const msg = document.getElementById("loginMessage");

        if (loginStatus === "success") {
            msg.style.color = "green";
            msg.textContent = "Login Berhasil, mengalihkan...";
            setTimeout(() => {
                window.location.href = "about.html";
            }, 1000);
        } else if (loginStatus === "failed") {
            msg.style.color = "red";
            msg.textContent = "Login Gagal, Silakan coba lagi.";
        }
    </script>
</body>
</html>
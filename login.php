username=admin
password=admin123
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Gaya dasar untuk halaman login */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f3e7; /* Warna krem */
            color: #333; /* Warna teks gelap agar kontras */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Kontainer form login */
        .login-container {
            background-color: #fff; /* Warna latar belakang putih untuk form */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Memberikan bayangan halus */
            width: 100%;
            max-width: 400px; /* Maksimal lebar form */
            text-align: center;
        }

        /* Judul halaman */
        h2 {
            color: #4e4e4e;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Label untuk input */
        label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
            text-align: left;
            color: #555;
        }

        /* Input fields */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        /* Button submit */
        button {
            background-color: #f8b400; /* Warna krem keemasan */
            color: #fff;
            border: none;
            padding: 12px;
            width: 100%;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #f79c42; /* Warna berubah saat hover */
        }

        /* Padding dan margin untuk spasi yang lebih rapi */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Form</h2>
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>


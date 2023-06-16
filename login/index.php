<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h1>Selamat Datang</h1>
        <form id="login-form">
            <input type="text" placeholder="Username" id="username">
            <input type="password" placeholder="Password" id="password">
            <button type="submit">Login</button>
            <p class="signup-link">Belum punya akun? <a href="../registrasi">Daftar</a></p>

        </form>
    </div>

    <script>
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault(); // Menghentikan submit form

            // Validasi username dan password
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if (username === 'admin' && password === 'admin') {
                alert('Login berhasil!');
                // Lakukan tindakan setelah login berhasil
            } else {
                var errorElement = document.createElement('p');
                errorElement.className = 'error';
                errorElement.innerText = 'Username atau password salah.';
                document.getElementById('login-form').appendChild(errorElement);
            }
        });
    </script>
</body>

</html>
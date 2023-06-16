<!DOCTYPE html>
<html>

<head>
    <title>Halaman Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Daftar Akun</h1>
        <form id="register-form">
            <input type="text" placeholder="Username" id="username">
            <div class="password-field">
                <input type="password" placeholder="Password" id="password">
                <i class="toggle-password fas fa-eye-slash"></i>
            </div>
            <button type="submit">Daftar</button>
            <p class="login-link">Sudah punya akun? <a href="login.html">Login</a></p>
        </form>
    </div>

    <script>
        document.getElementById('register-form').addEventListener('submit', function(e) {
            e.preventDefault(); // Menghentikan submit form

            // Validasi field tidak boleh kosong
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if (username.trim() === '' || password.trim() === '') {
                var errorElement = document.createElement('p');
                errorElement.className = 'error';
                errorElement.innerText = 'Username dan password tidak boleh kosong.';
                document.getElementById('register-form').appendChild(errorElement);
                return;
            }

            alert('Registrasi berhasil!');
            // Lakukan tindakan setelah registrasi berhasil
        });

        document.querySelector('.toggle-password').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            }
        });
    </script>
</body>

</html>
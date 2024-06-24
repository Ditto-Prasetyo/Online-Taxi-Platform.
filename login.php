<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('img/123.jpg');
            /* Gambar latar belakang awal */
            background-size: cover;
            /* Menutupi seluruh layar */
            background-position: center;
            /* Pusatkan gambar */
            background-repeat: no-repeat;
            /* Tidak mengulang */
            background-attachment: fixed;
            /* Tetap saat menggulir */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #f8f9fa;
            /* Warna teks putih terang */
            transition: background-image 1s ease-in-out;
            /* Transisi halus saat mengganti background */
        }

        .login-container {
            text-align: center;
            color: #f8f9fa;
            /* Warna teks untuk konten form */
        }

        .card {
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            /* Bayangan */
            border: none;
            /* Hilangkan border default */
            background-color: rgba(0, 0, 0, 0.7);
            /* Warna gelap dengan transparansi */
        }

        .header-text {
            font-size: 48px;
            font-weight: bold;
            color: #ffcc00;
            /* Warna kuning yang mencocokkan dengan taksi */
        }

        .welcome-text {
            margin: 20px 0;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
        }

        .description-text {
            font-size: 14px;
            color: #ccc;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 5px;
            background-color: #444;
            /* Warna latar belakang input yang lebih gelap */
            border: 1px solid #666;
            /* Warna border yang kontras */
            color: #fff;
            /* Warna teks putih */
        }

        .form-control::placeholder {
            color: #bbb;
            /* Warna placeholder yang lebih terang */
        }

        .btn-primary {
            background-color: #ffcc00;
            /* Warna kuning yang mencocokkan dengan taksi */
            border-color: #ffcc00;
        }

        .btn-primary:hover {
            background-color: #d4a300;
            /* Warna kuning yang lebih gelap untuk efek hover */
            border-color: #d4a300;
        }

        .btn-link {
            font-size: 14px;
            color: #ffcc00;
            /* Warna kuning untuk link */
            text-decoration: none;
            /* Hilangkan garis bawah default */
        }

        .btn-link:hover {
            text-decoration: underline;
            /* Tambahkan garis bawah pada hover */
        }

        .footer-text {
            font-weight: 20px;
            margin-top: 20px;
            font-size: 12px;
            color: #ccc;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="card">
            <div class="header-text">HELLO USER!</div>
            <div class="welcome-text">WELCOME TO ONLINE TAXI PLATFORM (OTP)!</div>
            <div class="description-text">
                Aplikasi khusus bagi para masyarakat yang ingin menggunakan taksi dimanapun dan kapanpun<br>
                Masuk dulu yah untuk melihat dashboard.....
            </div>
            <form action="aksi_login.php?op=in" method="POST">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </form>
            <div class="mt-3">
                Doesn't have an account? <a href="form_register.php" class="btn-link">Register</a>
            </div>
        </div>
        <div class="footer-text">ONLINE TAXI PLATFORM (OTP) © 2010-2024</div>
    </div>

    <script>
        // Array gambar latar belakang
        const backgrounds = [
            'img/123.jpg',
            'img/Tax6.png',
            'img/Tax7.png',
            'img/Tax5.png'
        ];

        let currentIndex = 0;

        function changeBackground() {
            // Increment index
            currentIndex = (currentIndex + 1) % backgrounds.length;

            // Update background image
            document.body.style.backgroundImage = `url('${backgrounds[currentIndex]}')`;
        }

        // Ganti background setiap 5 detik (5000 ms)
        setInterval(changeBackground, 5000);
    </script>
</body>

</html>

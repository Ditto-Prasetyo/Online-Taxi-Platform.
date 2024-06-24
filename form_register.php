<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Register Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('img/123.jpg'); /* Gambar latar belakang */
            background-size: cover; /* Menutupi seluruh layar */
            background-position: center; /* Pusatkan gambar */
            background-repeat: no-repeat; /* Tidak mengulang */
            background-attachment: fixed; /* Tetap saat menggulir */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #f8f9fa; /* Warna teks putih terang */
            transition: background-image 1s ease-in-out;
        }

        .welcome-text {
            margin: 20px 0;
            font-size: 18px;
            font-weight: bold;
            color: #ffcc00;
        
        }
        .register-container {
            text-align: center;
            color: #f8f9fa; /* Warna teks untuk konten form */
        }

        .card {
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1); /* Bayangan */
            border: none; /* Hilangkan border default */
            background-color: rgba(0, 0, 0, 0.7); /* Warna gelap dengan transparansi */
            max-width: 500px; /* Ukuran maksimum form */
            width: 100%;
        }

        .header-text {
            font-size: 48px;
            font-weight: bold;
            color: rgba(275, 300, 0, 0.4); /* Warna kuning terang dengan transparansi */
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            background-color: #444; /* Warna latar belakang input yang lebih gelap */
            border: 1px solid #666; /* Warna border yang kontras */
            color: #fff; /* Warna teks putih */
        }

        .form-control::placeholder {
            color: #bbb; /* Warna placeholder yang lebih terang */
        }

        .btn-primary {
            background-color: #ffcc00; /* Warna kuning yang mencocokkan dengan taksi */
            border-color: #ffcc00;
        }

        .btn-primary:hover {
            background-color: #d4a300; /* Warna kuning yang lebih gelap untuk efek hover */
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
    <div class="register-container">
        
        <div class="welcome-text">
            Daftar dulu ke ONLINE TAXI PLATFORM<br>
            Buat akun disini....
        </div>
        <div class="card">
            <form action="aksi_register.php" method="POST">
                <div class="form-group">
                    <label for="name">Nama Kalian</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="phone">Nomor HP</label>
                    <input type="text" name="number" class="form-control" id="number" placeholder="Nomor HP" required>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Alamat" required>
                </div>
                <div class="form-group">
                    <label for="city">Asal Kota</label>
                    <input type="text" name="asalkota" class="form-control" id="asalkota" placeholder="Asal Kota" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="terms" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">Setuju pada <a href="termsandpolicy.php" class="btn-link">terms and policy</a></label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" >Register</button>
                <div class="mt-3">
                Have an account already? <a href="Login.php" class="btn-link">Login</a>
            </div>
            </form>
        </div>
        <div class="footer-text">
        ONLINE TAXI PLATFORM (OTP) © 2010-2024
        </div>
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

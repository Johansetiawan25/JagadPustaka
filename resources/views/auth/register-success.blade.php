{{-- resources/views/auth/register-success.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Berhasil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #e7f8ff, #ffffff);
            padding: 20px;
        }
        .decor-left, .decor-right {
            position: absolute;
            top: 50px;
            width: 120px;
            height: 200px;
            background: url('https://img.icons8.com/ios/100/0d6efd/book.png') no-repeat center center;
            background-size: contain;
            opacity: 0.1;
        }
        .decor-left { left: 30px; transform: rotate(-15deg); }
        .decor-right { right: 30px; transform: rotate(15deg); }
        .message-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .message-box h2 {
            color: #28a745;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .message-box p {
            font-size: 16px;
            color: #555;
        }
        .btn-go-home {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-go-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="decor-left d-none d-lg-block"></div>
    <div class="decor-right d-none d-lg-block"></div>

    <div class="message-box">
        <h2>Registrasi Berhasil!</h2>
        <p>Akun Anda telah berhasil dibuat. Sekarang Anda bisa langsung login dan mulai berbelanja buku favorit Anda di JagadPustaka.</p>
        <a href="{{ route('login') }}" class="btn-go-home">Masuk Sekarang</a>
    </div>
</body>
</html>

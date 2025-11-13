<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(to right, #191C24, #EB1616);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            display: flex;
            width: 850px;
            max-width: 95%;
            height: 520px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-image {
            flex: 4;
            background: url('https://www.klampok.id/wp-content/uploads/2020/05/bantuan-sosial.png') no-repeat center center;
            background-size: cover;
        }

        .login-form {
            flex: 2;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            background-color: #f6f5f7;
        }

        h1 {
            font-weight: 800;
            color: #FF4B2B;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            color: #555;
            margin-bottom: 30px;
        }

        label {
            font-size: 13px;
            color: #333;
            display: block;
            text-align: left;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            background-color: #eee;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus {
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 5px rgba(255, 75, 43, 0.4);
        }

        button {
            border-radius: 25px;
            border: none;
            background-color: #FF4B2B;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(255, 75, 43, 0.3);
        }

        .alert {
            background-color: #ffcccc;
            color: #b30000;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: left;
            font-size: 13px;
        }

        footer {
            position: fixed;
            bottom: 0;
            background-color: #222;
            color: #fff;
            width: 100%;
            text-align: center;
            font-size: 14px;
            padding: 10px 0;
        }

        footer a {
            color: #FF4B2B;
            text-decoration: none;
        }

        footer i {
            color: red;
        }
    </style>
</head>

<body>

    @if ($errors->any())
        <div class="alert">
            <strong>Terjadi Kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="login-container">
        <div class="login-image"></div>

        <div class="login-form">
            <h1>Selamat Datang</h1>
            <p>Silakan masuk ke akun Anda</p>

            <form method="GET" action="{{ route('dashboard') }}">
                @csrf

                <label for="username">Nama Admin</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required>

                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Masuk</button>
            </form>
        </div>
    </div>

    <footer>
        <p>© 2025 <a href="#">Bantuan Sosial</a> — Dibuat dengan <i>❤</i> oleh Tim Penguasa Dunia</p>
    </footer>

</body>
</html>
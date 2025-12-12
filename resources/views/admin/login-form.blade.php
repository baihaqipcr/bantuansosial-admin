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
            background: url(https://img.antarafoto.com/cache/1200x799/2023/09/26/gerakan-pasar-murah-dan-bantuan-sosial-di-semarang-18azo-dom.jpg) no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            margin: 0;
            position: relative;
            overflow: hidden;
        }

        /* OVERLAY GRADIENT GELAP → TERANG */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to right,
                    rgba(0, 0, 0, 0.65),
                    rgba(0, 0, 0, 0.25),
                    rgba(255, 255, 255, 0.1));
            backdrop-filter: blur(4px);
        }


        /* Agar konten tetap muncul di atas */
        * {
            position: relative;
            z-index: 2;
        }


        .login-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

            width: 700px;
            max-width: 95%;
            height: auto;
            padding: 50px 30px;

            border-radius: 20px;

            /* GLASS EFFECT */
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(15px);

            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);

            overflow: hidden;
            animation: fadeUp 1s ease-out;
        }

        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            width: 100%;
            padding: 40px;
        }

        /* Box gambar kanan */
        .login-side-image {
            width: 450px;
            height: 600px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
            animation: fadeUp 1.2s ease-out;
        }

        .login-side-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .login-container::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 3px;

            background: linear-gradient(135deg,
                    rgba(0, 153, 255, 0.5),
                    rgba(255, 0, 153, 0.5),
                    rgba(0, 255, 153, 0.5));

            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);

            -webkit-mask-composite: xor;
            mask-composite: exclude;

            animation: borderGlow 5s linear infinite;
            pointer-events: none;
        }

        /* Konten supaya rapi */
        .login-content {
            z-index: 2;
            width: 80%;
            /* lebih ideal */
            max-width: 500px;
            /* supaya tidak melebar */
            margin: 0 auto;
            text-align: center;
        }

        /* Judul besar */
        .login-title {
            font-size: 32px;
            font-weight: 700;
            color: #ff512f;
            line-height: 1.3;
            margin-bottom: 10px;

            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        /* Subjudul */
        .login-subtitle {
            font-size: 14px;
            color: #eee;
            margin-bottom: 30px;
        }

        /* Label input */
        .login-label {
            display: block;
            text-align: left;
            color: #f2f2f2;
            font-weight: 500;
            margin-bottom: 5px;
            margin-top: 15px;
        }

        /* Input box */
        .login-input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: none;
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            font-size: 15px;
            margin-bottom: 10px;
        }

        /* Tombol */
        .login-btn {
            margin-top: 20px;
            background: #ff542e;
            border: none;
            padding: 12px 35px;
            border-radius: 25px;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .login-btn:hover {
            background: #ff693b;
            box-shadow: 0 0 15px rgba(255, 80, 50, 0.6);
        }





        /* Fade up animation */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Animated gradient border */
        @keyframes borderGlow {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .register-btn {
            margin-top: 20px;
            background: #ff542e;
            border: none;
            padding: 12px 35px;
            border-radius: 25px;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .register-btn:hover {
            background: #ff693b;
            box-shadow: 0 0 15px rgba(255, 80, 50, 0.6);
        }



        h1 {
            font-weight: 800;
            color: #FF4B2B;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            color: #ffffff;
            margin-bottom: 30px;
        }

        label {
            font-size: 13px;
            color: #ffffff;
            display: block;
            text-align: left;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus {
            background-color: rgba(255, 255, 255, 0.322);
            outline: none;
            box-shadow: 0 0 5px rgba(255, 75, 43, 0.4);
        }

        .btn-full {
            display: inline-block;
            width: 100%;
            text-align: center;
            padding: 12px 45px;
            background-color: #FF4B2B;
            color: #fff;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 15px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-full:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(255, 75, 43, 0.3);
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

    <div class="login-wrapper">

        <!-- KIRI: LOGIN BOX -->
        <div class="login-container">
            <div class="login-content">
                <h2 class="login-title">Selamat Datang di Bantuan Sosial dan Pemanfaatan</h2>
                <p class="login-subtitle">Silakan masuk ke akun Anda</p>
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <label for="username">Nama Admin</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required>

                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" required>

                    @error('login_error')
                    <p style="color:red">{{ $message }}</p>
                    @enderror

                    <button type="submit">Masuk</button>
                    <p class="login-subtitle"> Belum punya akun? Silakan Daftar </p>

                    <a href="{{ route('register') }}" class="register-btn">Daftar Akun</a>

                </form>
            </div>
        </div>
        <div class="login-side-image">
            <img src="https://tribratanews.polri.go.id/web/image/blog.post/50926/image">
        </div>

    </div>


</body>

</html>
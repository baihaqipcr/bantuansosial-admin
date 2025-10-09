<!DOCTYPE html>
<style>
    body {
    font-family: "Poppins", sans-serif;
    background: linear-gradient(135deg, #5b86e5, #36d1dc);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* ====== LOGIN CONTAINER ====== */
form {
    background: #ffffff;
    padding: 40px 50px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    width: 350px;
    text-align: left;
}

/* ====== TITLE ====== */
h1 {
    text-align: center;
    color: #333;
    font-size: 24px;
    margin-bottom: 25px;
}

/* ====== LABEL & INPUT ====== */
label {
    display: block;
    color: #444;
    font-weight: 600;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    outline: none;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #5b86e5;
    box-shadow: 0 0 6px rgba(91, 134, 229, 0.4);
}

/* ====== BUTTON ====== */
button {
    width: 100%;
    background: #5b86e5;
    color: white;
    border: none;
    padding: 10px 0;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    margin-top: 15px;
    transition: background 0.3s ease;
}

button:hover {
    background: #4a74c9;
}

/* ====== ALERTS ====== */
.alert {
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 6px;
    font-size: 14px;
}

.alert-error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* ====== RESPONSIVE ====== */
@media (max-width: 480px) {
    form {
        width: 90%;
        padding: 25px;
    }

    h1 {
        font-size: 20px;
    }
}
</style>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Login Aplikasi</title>
    <style>
        body { font-family: sans-serif; margin: 50px; }
        .alert { padding: 10px; margin-bottom: 20px; border-radius: 5px; }
        .alert-error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <h1>Masuk ke Akun Anda</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            <strong>Terjadi Kesalahan: </strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <form method="post" action="/bansos">
        {{-- Token CSRF wajib untuk form POST di Laravel --}}
        @csrf 

        <div>
            <label for="username">Nama Pengguna (Username):</label><br>
            {{-- old('username') digunakan untuk mempertahankan input jika validasi gagal --}}
            <input type="text" id="username" name="username" value="{{ old('username') }}" required>
        </div>
        <br>
        <div>
            <label for="password">Kata Sandi (Password):</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
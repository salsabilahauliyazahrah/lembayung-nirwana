<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">
</head>
<body>

    <div class="login-box">
        <h2>Login</h2>

        {{-- Alert Error --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.proses') }}" method="POST">
            @csrf

            {{-- Username --}}
            <input
                type="text"
                name="username"
                placeholder="Username"
                value="{{ old('username') }}"
                required
            >

            {{-- Password --}}
            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >

            {{-- Remember --}}
            <div class="form-check mb-3">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="remember"
                    name="remember"
                >

                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

            <input type="submit" value="Login">

            <div class="text-center mt-3">
                <a href="{{ route('home') }}" class="text-dark">
                    Kembali ke Beranda
                </a>
            </div>
        </form>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Museum Otomotif Indonesia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #0b2447);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 390px;
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 20px 40px rgba(0,0,0,.25);
        }
    </style>
</head>
<body>

<div class="login-card">
    <h3 class="text-center mb-2">Login Admin</h3>
    <p class="text-center text-muted mb-4">Museum Otomotif Indonesia</p>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username">
            @error('username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary w-100 mt-2">
            Login
        </button>

        <a href="{{ route('home') }}" class="btn btn-light w-100 mt-2">
            Kembali ke Home
        </a>
    </form>
</div>

</body>
</html>
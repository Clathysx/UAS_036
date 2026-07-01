<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Museum Otomotif Indonesia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">

    <style>
        body{
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            min-height:100vh;
            background:#0d6efd;
            color:white;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:12px;
            border-radius:8px;
            margin-bottom:5px;
        }

        .sidebar a:hover{
            background:white;
            color:#0d6efd;
        }

        .content{
            flex:1;
            padding:30px;
        }
    </style>
</head>
<body>

<div class="d-flex">

    <div class="sidebar p-3">
        <div class="text-center mb-4">
            <h3>🚗</h3>
            <h5 class="fw-bold">Museum Otomotif</h5>
            <small>Admin Panel</small>
        </div>

        <hr class="text-white">

        <a href="{{ route('dashboard') }}">📊 Dashboard</a>
        <a href="{{ route('koleksi.index') }}">🚘 Data Koleksi</a>
        <a href="{{ route('home') }}">🌐 Website</a>

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button class="btn btn-danger w-100">
                Logout
            </button>
        </form>
    </div>

    <div class="content">
        @yield('content')

        <hr>

        <div class="text-center text-muted">
            © 2026 Museum Otomotif Indonesia | UAS Rekayasa Web
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>

@yield('scripts')

</body>
</html>
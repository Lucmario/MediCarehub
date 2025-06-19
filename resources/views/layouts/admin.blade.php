<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MediConnectHub Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f8ff; }
        .sidebar { background-color: #0b2e4a; min-height: 100vh; }
        .sidebar a { color: white; display: block; padding: 10px; }
        .sidebar a:hover { background-color: #12486b; }
        .card { border-radius: 12px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h4 class="text-white text-center mt-3">MediConnectHub</h4>
                <a href="#">Dashboard</a>
                <a href="#">Users</a>
                <a href="#">Appointments</a>
                <a href="#">Consultations</a>
                <a href="#">Payments</a>
            </div>
            <div class="col-md-10">
                <div class="p-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>

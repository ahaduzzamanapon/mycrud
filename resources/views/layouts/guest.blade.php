<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turning Point - Job Preparation Platform</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f4f7f6;
            color: #333;
        }
        .header {
            /* ... existing header styles ... */
        }
        .footer {
            /* ... existing footer styles ... */
        }
        .auth-section {
            background-color: #f4f7f6;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 20px;
            min-height: calc(100vh - 160px);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .auth-container {
            display: flex;
            max-width: 900px;
            width: 100%;
            background: #fff;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            border-radius: 20px;
            overflow: hidden;
            animation: fadeIn 0.5s ease-out;
        }
        .auth-image {
            flex: 1;
            background: url('https://source.unsplash.com/random/800x600?student,learning') no-repeat center center;
            background-size: cover;
        }
        .auth-form-container {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-control:focus {
            border-color: #e53935;
            box-shadow: 0 0 0 0.2rem rgba(229, 57, 53, 0.25);
        }
        .btn-primary {
            background-color: #e53935;
            border-color: #e53935;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #c62828;
            border-color: #c62828;
        }
    </style>
</head>
<body>

    <header class="header">
        <!-- ... existing header ... -->
    </header>

    <main class="auth-section">
        <div class="auth-container">
            <div class="auth-image"></div>
            <div class="auth-form-container">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="footer">
        <!-- ... existing footer ... -->
    </footer>

    <!-- ... existing scripts ... -->
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - RPL 1</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="universal_container login-minimal">
        <div class="login-minimal-card">
            <div class="card-header">
                <h1>Admin Login</h1>
                <div class="header-underline"></div>
            </div>
            
            <form action="/login" method="POST" class="minimal-form">
                @csrf
                <div class="form_group">
                    <label for="name">Username</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your username">
                    <span class="input-line"></span>
                </div>
                
                <div class="form_group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                    <span class="input-line"></span>
                </div>
                
                <button type="submit" class="btn-minimal">Sign In</button>
            </form>
            
            <div class="card-footer">
                <p>Contact admin for access</p>
            </div>
        </div>
    </div>
</body>
</html>
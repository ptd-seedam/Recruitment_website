<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Nhập</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/f59bcd8580.css">
  <style>
    html, body {
      height: 100%;
      width: 100%;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f0f2f5;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .auth-container {
      width: 100%;
      max-width: 400px;
      padding: 30px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .btn-facebook {
      background-color: #1877f2;
      color: white;
      border: none;
    }
    .btn-facebook:hover {
      background-color: #166fe5;
    }
    .form-footer {
      text-align: center;
      margin-top: 20px;
    }
    .form-footer a {
      color: #1877f2;
    }
    .toggle-link {
      text-align: center;
      margin-top: 15px;
    }
    .toggle-link a {
      color: #1877f2;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="auth-container">
      <div class="auth-header">
        <h1>Đăng nhập</h1>
      </div>
      <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form action="{{ url('auth-login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn btn-dark w-100">Đăng nhập</button>
    </form>
</body>
</html>

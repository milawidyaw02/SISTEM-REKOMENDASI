<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">FORM REGISTER USER</h3>
            <hr>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{route('aksiRegistrasi')}}" method="post">
            @csrf
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Nama Lengkap</label>
                    <input type="text" name="namaLengkap" class="form-control" placeholder="Nama Lengkap" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-address-book"></i> Role</label>
                    <input type="text" name="role" class="form-control" value="User" readonly>
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Registrasi</button>
                <hr>
                <p class="text-center">Sudah punya akun silahkan <a href="{{ route('login') }}">Login Disini!</a></p>
            </form>
        </div>
    </div>
</body>
</html>


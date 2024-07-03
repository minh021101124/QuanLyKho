
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập hệ thống</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://serviceproxy.net/Templates/bot247/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://serviceproxy.net/Templates/bot247/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://serviceproxy.net/Templates/bot247/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1"><b>T-Mobile</b></a>
    </div>
    <div class="card-body">
	<p class="login-box-msg">Đăng Nhập Hệ Thống</p>
	{{-- <form action="{{ route('login') }}" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email"  placeholder="Email">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password"  placeholder="Mật khẩu">       
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
        </div>
      </form> --}}

	  <form action="{{ route('login') }}" method="POST">
		@csrf
		<div class="mb-3">
		 
			<div class="input-group mb-3">
			<input type="email" name="email" class="form-control" id="email" placeholder="Email" required >
		</div>

		</div>
		<div class="mb-3">
			<div class="input-group mb-3">
			<input type="password" name="password" class="form-control"  id="password" placeholder="Mật khẩu" required >
		</div>
		</div>
		<div class="row">
            <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
        </div>
	</form>
    </div>
  </div>
</div>


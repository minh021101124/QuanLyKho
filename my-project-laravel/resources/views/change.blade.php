<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Mật Khẩu</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Thêm bất kỳ CSS tùy chỉnh nào ở đây */
    </style>
</head>
<body>
    <main class="main">
        <div class="container login-container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="heading mb-1">
                                <h2 class="title">Đổi Mật Khẩu</h2>
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <form action="{{ route('change-password') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="current-password">Mật khẩu hiện tại:</label>
                                    <input type="password" id="current-password" name="current_password" required class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="new-password">Mật khẩu mới:</label>
                                    <input type="password" id="new-password" name="new_password" required class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="new_password_confirmation">Xác nhận mật khẩu mới:</label>
                                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" required class="form-control">
                                </div>

                                <button type="submit" class="btn btn-dark btn-block btn-md mb-3">Thay đổi mật khẩu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

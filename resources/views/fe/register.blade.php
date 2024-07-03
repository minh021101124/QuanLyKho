@extends('fe.index')

@section('main')
    
		<main class="main">
			<div class="page-header">
				<div class="container d-flex flex-column align-items-center">
					<nav aria-label="breadcrumb" class="breadcrumb-nav">
						<div class="container">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="demo4.html">Trang chủ</a></li>
								<li class="breadcrumb-item"><a href="category.html">Sản Phẩm</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									Tài Khoản
								</li>
							</ol>
						</div>
					</nav>

					<h1>Tài Khoản</h1>
				</div>
			</div>

			<div class="container login-container">
				<div class="row">
					<div class="col-lg-10 m-auto">
						<div class="row justify-content-center">
							<div class="col-md-6">
								<div class="heading mb-1">
									<h2 class="title">Đăng Ký</h2>
								</div>

								<form action="" method="POST">
									@csrf
									<label for="login-email">
										 Địa chỉ email
										<span class="required">*</span>
									</label>
									<input type="email" class="form-input form-wide" id="login-email" name="email" required />
									<label for="login-email">
										Họ tên 
									   <span class="required">*</span>
								   </label>
								   <input type="text" class="form-input form-wide" id="login-email" name="name" required />


									<label for="login-password">
										Mật khẩu
										<span class="required">*</span>
									</label>
									<input type="password" class="form-input form-wide" id="login-password" name="password" required />

									<label for="login-password">
										Nhập lại mật khẩu
										<span class="required">*</span>
									</label>
									<input type="password" class="form-input form-wide" id="login-password" required />

									<div class="form-footer">


										<a href="forgot-password.html"
											class="forget-password text-dark form-footer-right">Đã có tài khoản</a>
									</div>
                                    
									<button type="submit" class="btn btn-dark btn-md w-100 mb-3">
										Đăng ký
									</button>
                                   
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</main><!-- End .main -->
@endsection
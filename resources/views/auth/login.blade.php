<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Log In Page</title>
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!-- loader-->
	<link href="{{ asset('backend/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{ asset('backend/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&amp;family=Roboto&amp;display=swap" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/icons.css')}}" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/app.css') }}" />
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
                                    <form action="{{ route('staff.login') }}" method="post">
                                        @csrf
									<div class="text-center">
										<img src="assets/images/logo-icon.png" width="80" alt="">
										<h3 class="mt-4 font-weight-bold">Welcome Back</h3>
									</div>
									<div class="form-group mt-4">
										<label for="email">Email Address</label>
										<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address" />
										@error('email') <b class="text-danger">{{ $message }}</b>@enderror
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" />
										@error('password')<b class="text-danger">{{ $message }}</b> @enderror
									</div>
									<div class="form-row">
										<div class="form-group col">
											<div class="custom-control custom-switch">
												<input id="remember_me" name="remember" type="checkbox" class="custom-control-input">
												<label for="remember_me" class="custom-control-label">Remember Me</label>
											</div>
										</div>
										<div class="form-group col text-right"> <a href="authentication-forgot-password.html"><i class='bx bxs-key mr-2'></i>Forget Password?</a>
										</div>
									</div>
									<div class="btn-group mt-3 w-100">
										<button type="submit" class="btn btn-primary btn-block">Log In</button>
										<button type="submit" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
										</button>
									</div>
                                </form>
									<hr>
									<div class="text-center">
										<p class="mb-0">Don't have an account? <a href="authentication-register.html">Sign up</a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<img src="{{ asset('backend/assets/images/login-images/login-frent-img.jpg')}}" class="card-img login-img h-100" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>
</html>

@extends('layouts.app')
@section('content')
	<main class="login-container" style="margin-top:-70px">
		<div class="container">
			<div class="row page-login d-flex align-items-center" style="margin-top:60px">
				<div class="section-left col-12 col-md-6">
					<h1>
						We Explore the new <br> life much better
					</h1>
					<!-- <img src="assets/frontend/images/logo.png" class="w-75 d-none d-sm-flex" alt=""> -->
				</div>
				<div class="section-right col-12 col-md-4">
					<div class="card">
						<div class="card-body">
							<div class="text-center">
								<img src="assets/frontend/images/logo.png" class="w-50 mb-4" alt="">
							</div>
							<form method="POST" action="{{ route('login') }}">
								@csrf
								<div class="form-group">
									<label for="">Email Addres</label>
									<input type="email" name="email" class="form-control" >
                                             @error('email')
                                                  <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $message }}</strong>
                                                  </span>
                                             @enderror
                                        </div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" >
                                             @error('password')
                                                  <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $message }}</strong>
                                                  </span>
                                             @enderror
                                        </div>
								<div class="form-group form-check">
									<input type="checkbox" name="remember" id="remember" class="form-check-input" id="">
									<label for="">Remember Me</label>
								</div>	
								<button type="submit" class="btn btn-login btn-block">
									Sign In
                                        </button>
                                        
                                        @if (Route::has('password.request'))
								<p class="text-center mt-4">
                                             <a href="{{ route('password.request') }}">
                                                  {{ __('Forgot Your Password?') }}
                                             </a>
                                        </p>
                                        @endif
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection
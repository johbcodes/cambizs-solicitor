@extends('layouts.guest')
@section('content')
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div
                        class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('user/img/cambiz-icon.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Login</h2>
                        <h4 class="fs-13 fw-bold mb-2">Login to your account</h4>
                        <p class="fs-12 fw-medium text-muted">Thank you for getting back to <strong>Cambiz</strong>
                            solicitor
                            Listing. Let's access our best recommendations for you.</p>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}" class="w-100 mt-4 pt-2">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-4">
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Email or Username" value="{{ old('email') }}" required autofocus
                                    autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password" required autocomplete="current-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me and Forgot Password -->
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="remember_me" class="custom-control-input"
                                            name="remember">
                                        <label class="custom-control-label c-pointer" for="remember_me">Remember Me</label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                    <div>
                                        <a href="{{ route('password.request') }}" class="fs-11 text-primary">Forgot your
                                            password?</a>
                                    </div>
                                @endif
                            </div>

                            <!-- Login Button -->
                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Login</button>
                            </div>
                        </form>

                        <!-- Social Login Options -->
                        <div class="w-100 mt-5 text-center mx-auto">
                            <div class="mb-4 border-bottom position-relative">
                                <span
                                    class="small py-1 px-3 text-uppercase text-muted bg-white position-absolute translate-middle">or</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <button onclick="alert('Coming Soon!')" class="btn btn-light-brand flex-fill"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" title="Sign up with Google">
                                    <i class="feather-google"></i> Sign In with Google
                                </button>
                            </div>
                        </div>

                        <!-- Register Link -->
                        <div class="mt-5 text-muted text-center">
                            <span> Don't have an account?</span>
                            <a href="{{ route('register') }}" class="fw-bold">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

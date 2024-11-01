@extends('layouts.guest')
@section('title', 'Register')
@section('content')
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div
                        class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('user/img/cambiz-icon.png') }}" alt="Logo" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Register</h2>
                        <p class="fs-12 fw-medium text-muted">
                            Let's get you all setup, so you can verify your personal account and begin setting up your
                            profile.
                        </p>

                        <form method="POST" action="{{ route('register') }}" class="w-100 mt-4 pt-2">
                            @csrf

                            <!-- Name -->
                            <div class="mb-4">
                                <x-input-label for="name" :value="__('Full Name')" />
                                <x-text-input id="name" class="form-control mt-1" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mb-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="form-control mt-1" type="email" name="email"
                                    :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mb-4 generate-pass">
                                <x-input-label for="password" :value="__('Password')" />
                                <div class="input-group">
                                    <x-text-input id="password" class="form-control password" type="password"
                                        name="password" required autocomplete="new-password" placeholder="Password" />
                                    <div class="input-group-text c-pointer gen-pass" data-bs-toggle="tooltip"
                                        title="Generate Password">
                                        <i class="feather-hash"></i>
                                    </div>
                                    <div class="input-group-text border-start bg-gray-2 c-pointer show-pass"
                                        data-bs-toggle="tooltip" title="Show/Hide Password">
                                        <i class="feather-eye"></i>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                {{-- <div class="progress-bar mt-2">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div> --}}
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" class="form-control mt-1" type="password"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="mt-4">
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="receiveMail" required>
                                    <label class="form-check-label text-muted" for="receiveMail">Yes, I want to receive
                                        {{ env('APP_NAME') }} emails</label>

                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="termsCondition" required>
                                    <label class="form-check-label text-muted" for="termsCondition">
                                        I agree to all the <a href="#">Terms & Conditions</a> and <a
                                            href="#">Fees</a>.
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Create Account</button>
                            </div>
                        </form>

                        <!-- Already Registered Link -->
                        <div class="mt-5 text-muted">
                            <span>Already have an account?</span>
                            <a href="{{ route('login') }}" class="fw-bold">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

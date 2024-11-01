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
                        <h2 class="fs-20 fw-bolder mb-4">Verify</h2>
                        <h4 class="fs-13 fw-bold mb-2">Please enter the code generated one time password to verify your
                            account.</h4>
                        <p class="fs-12 fw-medium text-muted"><span>A code has been sent to</span>
                            <strong>*******{{ substr(Auth::user()->email, -4) }}</strong>
                        </p>
                        <form action="{{ route('otp.verify.submit') }}" method="POST" class="w-100 mt-4 pt-2">
                            @csrf
                            <div>
                                @foreach ($errors as $error)
                                    <div class="alert alert-danger">
                                        {{ $error->message }}
                                    </div>
                                @endforeach
                            </div>
                            <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                <input class="m-2 text-center form-control rounded" type="text" name="otp[]"
                                    maxlength="1" required>
                                <input class="m-2 text-center form-control rounded" type="text" name="otp[]"
                                    maxlength="1" required>
                                <input class="m-2 text-center form-control rounded" type="text" name="otp[]"
                                    maxlength="1" required>
                                <input class="m-2 text-center form-control rounded" type="text" name="otp[]"
                                    maxlength="1" required>
                                <input class="m-2 text-center form-control rounded" type="text" name="otp[]"
                                    maxlength="1" required>
                                <input class="m-2 text-center form-control rounded" type="text" name="otp[]"
                                    maxlength="1" required>
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Validate</button>
                            </div>
                            <div class="mt-5 text-muted">
                                <span>Didn't get the code?</span>
                                <a href="{{ route('otp.resend') }}">Resend</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@extends('layouts.app')
@section('content')
    <div class="page-header flex-sm-wrap">
        <div class="page-header-left d-flex align-items-center d-sm-block d-md-flex">
            <div class="page-header-title d-none d-md-inline-block">
                <h5 class="m-b-10">Practice Areas</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Practice Areas</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            {{-- <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                <a href="{{ route('solicitor.practice_areas.index') }}" class="text-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="feather-save me-2"></i>
                    <span>Save Changes</span>
                </button>
            </div> --}}
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card stretch stretch-full">
                    <div class="card-header p-0">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab"
                            role="tablist">
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profileTab" role="tab">Profile Information</a>
                            </li>
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#solicitorTab" role="tab">Solicitor Profile</a>
                            </li>
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#passwordTab" role="tab">Password</a>
                            </li>
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#notificationsTab" role="tab">Notifications</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                            <div class="card-body personal-info">
                                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')

                                    <!-- Avatar Upload Section -->
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label class="fw-semibold">Avatar: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="mb-4 mb-md-0 d-flex gap-4 your-brand">
                                                <div
                                                    class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                                    <!-- Image preview -->
                                                    <img id="avatarPreview"
                                                        src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('assets/images/avatar/1.png') }}"
                                                        class="upload-pic img-fluid rounded h-100 w-100" alt="">

                                                    <!-- Overlay for camera icon -->
                                                    <div
                                                        class="position-absolute start-0 top-0 end-0 bottom-0 h-100 w-100 hstack align-items-center justify-content-center c-pointer upload-button avatar-upload-button">
                                                        <i class="feather feather-camera" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- File input -->
                                                    <input class="file-upload" type="file" accept="image/*"
                                                        name="avatar" id="avatarInput" style="display: none;">
                                                </div>
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fs-11 text-gray-500 mt-2"># Upload your profile picture
                                                    </div>
                                                    {{-- <div class="fs-11 text-gray-500"># Avatar size 150x150</div> --}}
                                                    <div class="fs-11 text-gray-500"># Max upload size 2MB</div>
                                                    <div class="fs-11 text-gray-500"># Allowed file types: png, jpg, jpeg
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Name Field -->
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="fullnameInput" class="fw-semibold">Name: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-user"></i></div>
                                                <input type="text" class="form-control" id="fullnameInput" name="name"
                                                    value="{{ old('name', Auth::user()->name) }}" required>
                                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="mailInput" class="fw-semibold">Email: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-mail"></i></div>
                                                <input type="email" class="form-control" id="mailInput" name="email"
                                                    value="{{ old('email', Auth::user()->email) }}" required>
                                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Save Button & Success Message -->
                                    <div class="row">
                                        <div class="col-lg-4">
                                        </div>
                                        <div class="col-lg-8">
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                            @if (session('status') === 'profile-updated')
                                                <p x-data="{ show: true }" x-show="show" x-transition
                                                    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                                                    {{ __('Saved.') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="solicitorTab" role="tabpanel">
                            <div class="card-body personal-info">
                                <form method="POST" action="{{ route('solicitor.update_profile') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')

                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label class="fw-semibold">Background Image: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="mb-4 mb-md-0 d-flex gap-4 your-brand">
                                                <div
                                                    class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                                    <img id="bgPreview"
                                                        src="{{ optional(Auth::user()->profile)->background_image ? asset('storage/' . optional(Auth::user()->profile)->background_image) : asset('assets/images/avatar/1.png') }}"
                                                        class="upload-pic img-fluid rounded h-100 w-100" alt="">
                                                    <div
                                                        class="position-absolute start-0 top-0 end-0 bottom-0 h-100 w-100 hstack align-items-center justify-content-center c-pointer upload-button upload-bg-button">
                                                        <i class="feather feather-camera" aria-hidden="true"></i>
                                                    </div>

                                                    <input class="file-upload" type="file" accept="image/*"
                                                        name="background_image" id="bgInput" style="display: none;">
                                                </div>
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fs-11 text-gray-500 mt-2"># Upload your profile background
                                                        image</div>
                                                    <div class="fs-11 text-gray-500"># Max upload size 2MB</div>
                                                    <div class="fs-11 text-gray-500"># Allowed file types: png, jpg, jpeg
                                                    </div>
                                                </div>
                                            </div>
                                            <x-input-error class="mt-2" :messages="$errors->get('background_image')" />
                                        </div>
                                    </div>

                                    <!-- Video Link Field -->
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="videoLinkInput" class="fw-semibold">Video Link: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-video"></i></div>
                                                <input type="url" class="form-control" id="videoLinkInput"
                                                    name="video_link" placeholder="ex. https://vimeo.com/24fhuciwebctiwe"
                                                    value="{{ old('video_link', optional(Auth::user()->profile)->video_link) }}"
                                                    required>
                                            </div>
                                            <x-input-error class="mt-2" :messages="$errors->get('video_link')" />
                                        </div>
                                    </div>

                                    <!-- Location/Address Field -->
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="addressInput" class="fw-semibold">Location/Address: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                <input type="text" class="form-control" id="addressInput"
                                                    placeholder="Your Location" name="location"
                                                    value="{{ old('location', optional(Auth::user()->profile)->location) }}"
                                                    required>
                                            </div>
                                            <x-input-error class="mt-2" :messages="$errors->get('location')" />
                                        </div>
                                    </div>

                                    <!-- Location/Address Field -->
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="bioInput" class="fw-semibold">Your Bio: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i
                                                        class="feather-align-justify justify"></i></div>
                                                <textarea type="text" class="form-control" id="bioInput" placeholder="Your bio" name="bio" required>{{ old('bio', optional(Auth::user()->profile)->bio) }}</textarea>
                                            </div>
                                            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                                        </div>
                                    </div>

                                    <!-- Save Button -->
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-8">
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                            @if (session('success'))
                                                <p class="text-success mt-2">{{ session('success') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="passwordTab" role="tabpanel">
                            <div class="card-body personal-info">
                                <form method="POST" action="{{ route('password.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0 me-4">
                                            <span class="d-block mb-2">Password Information:</span>
                                            <span class="fs-12 fw-normal text-muted text-truncate-1-line">You can only
                                                change your password twice within 24 hours!</span>
                                        </h5>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Reset</a>
                                    </div>

                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="currentPassword" class="fw-semibold">Current Password: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-lock"></i></div>
                                                <input type="password" class="form-control" id="currentPassword"
                                                    name="current_password" placeholder="Current Password" required>
                                            </div>
                                            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="newPassword" class="fw-semibold">New Password: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-key"></i></div>
                                                <input type="password" class="form-control" id="newPassword"
                                                    name="password" placeholder="New Password" required>

                                            </div>
                                            <div id="password-strength" class="mt-2">
                                                <div class="progress">
                                                    <div class="progress-bar" id="strength-bar" role="progressbar"
                                                        style="width: 0%;"></div>
                                                </div>
                                                <small id="strength-text" class="text-muted"></small>
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="passwordConfirmation" class="fw-semibold">Confirm Password:
                                            </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-key"></i></div>
                                                <input type="password" class="form-control" id="passwordConfirmation"
                                                    name="password_confirmation" placeholder="Confirm Password" required>
                                                <div class="input-group-text border-start bg-gray-2 c-pointer show-pass">
                                                    <i></i>
                                                </div>
                                            </div>
                                            <div>
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pass-hint">
                                        <p class="fw-bold">Password Requirements:</p>
                                        <ul class="fs-12 ps-1 ms-2 text-muted">
                                            <li class="mb-1">At least one lowercase character</li>
                                            <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                            <li>At least one number, symbol, or whitespace character</li>
                                        </ul>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-8">
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                            @if (session('status') === 'password-updated')
                                                <p class="text-success mt-2">{{ __('Password updated successfully.') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="notificationsTab" role="tabpanel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const avatarInput = document.getElementById('avatarInput');
                const avatarPreview = document.getElementById('avatarPreview');
                const avatarUploadButton = document.querySelector('.avatar-upload-button');

                avatarUploadButton.addEventListener('click', function() {
                    avatarInput.click();
                });

                avatarInput.addEventListener('change', function() {
                    const file = avatarInput.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            avatarPreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });

                const bgInput = document.getElementById('bgInput');
                const bgPreview = document.getElementById('bgPreview');
                const bgUploadButton = document.querySelector('.bg-upload-button');

                bgUploadButton.addEventListener('click', function() {
                    bgInput.click();
                });

                bgInput.addEventListener('change', function() {
                    const file = bgInput.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            bgPreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Password Strength Indicator
                const newPasswordInput = document.getElementById('newPassword');
                const strengthBar = document.getElementById('strength-bar');
                const strengthText = document.getElementById('strength-text');

                newPasswordInput.addEventListener('input', function() {
                    const strength = getPasswordStrength(newPasswordInput.value);
                    updateStrengthMeter(strength);
                });

                function getPasswordStrength(password) {
                    let strength = 0;
                    if (password.length >= 8) strength += 1;
                    if (/[a-z]/.test(password)) strength += 1;
                    if (/[A-Z]/.test(password)) strength += 1;
                    if (/[0-9]/.test(password)) strength += 1;
                    if (/[^a-zA-Z0-9]/.test(password)) strength += 1;
                    return strength;
                }

                function updateStrengthMeter(strength) {
                    const colors = ['#d9534f', '#f0ad4e', '#5bc0de', '#5cb85c', '#428bca'];
                    const messages = ['Very Weak', 'Weak', 'Moderate', 'Strong', 'Very Strong'];
                    const widths = ['20%', '40%', '60%', '80%', '100%'];

                    strengthBar.style.width = widths[strength - 1];
                    strengthBar.style.backgroundColor = colors[strength - 1];
                    strengthText.textContent = messages[strength - 1];
                }

                // Toggle Password Visibility
                const togglePasswordButton = document.querySelector('.toggle-password');
                togglePasswordButton.addEventListener('click', function() {
                    const type = newPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    newPasswordInput.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('feather-eye');
                    this.querySelector('i').classList.toggle('feather-eye-off');
                });

                // Password Match Validation
                const passwordConfirmationInput = document.getElementById('passwordConfirmation');
                const passwordMismatch = document.getElementById('password-mismatch');

                function checkPasswordsMatch() {
                    if (newPasswordInput.value !== passwordConfirmationInput.value) {
                        passwordMismatch.style.display = 'block';
                    } else {
                        passwordMismatch.style.display = 'none';
                    }
                }

                newPasswordInput.addEventListener('input', checkPasswordsMatch);
                passwordConfirmationInput.addEventListener('input', checkPasswordsMatch);
            });
        </script>
        <script src="{{ asset('assets/js/customers-create-init.min.js') }}"></script>
    @endpush

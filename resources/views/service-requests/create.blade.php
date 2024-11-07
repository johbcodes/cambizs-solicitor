@extends('layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tagify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tagify-data.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/quill.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2-theme.min.css') }}">
@endpush

@section('content')
    <!-- [ page-header ] start -->
    <form action="{{ route('client.serviceRequests.store') }}" method="POST">
        @csrf
        <div class="page-header flex-sm-wrap">
            <div class="page-header-left d-flex align-items-center d-sm-block d-md-flex">
                <div class="page-header-title d-none d-md-inline-block">
                    <h5 class="m-b-10">Request Service</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item">Service Request</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                    <a href="{{ url()->previous() }}" class="text-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="feather-save me-2"></i>
                        <span>Submit Request</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-12 col-md-8 col-xl-7 mx-auto">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="row">
                                <!-- Practice Area Selection -->
                                <div class="mb-4">
                                    <label class="form-label">Practice Area
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select select2" name="practice_area_id" required>
                                        <option value="" disabled selected>Choose Practice Area</option>
                                        @foreach ($practiceAreas as $area)
                                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Service Cost Input -->
                                <div class="mb-4">
                                    <label class="form-label">Cost of Service <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-dollar-sign"></i></div>
                                        <input type="number" class="form-control" name="cost"
                                            placeholder="Cost of service" required>
                                    </div>
                                </div>

                                <!-- Details Text Area -->
                                <div class="mb-4">
                                    <label class="form-label">Service Details <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="details" rows="6" placeholder="Describe the service details" required></textarea>
                                </div>

                                <!-- Solicitor Selection -->
                                <div class="mb-4">
                                    <label class="form-label">Solicitor <span class="text-danger">*</span></label>
                                    <select class="form-select select2" name="solicitor_id" required>
                                        <option value="" disabled selected>Select Solicitor</option>
                                        @foreach ($solicitors as $solicitor)
                                            <option value="{{ $solicitor->id }}">{{ $solicitor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Status Input (Default Pending) -->
                                <input type="hidden" name="status" value="pending">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script src="{{ asset('assets/vendors/js/tagify.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tagify-data.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/select2-active.min.js') }}"></script>
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap-5'
            });
        });
    </script>
@endpush

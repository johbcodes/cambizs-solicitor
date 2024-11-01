@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="row">
            <!-- [Mini Card] start -->
            <div class="col-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xxl-3 col-lg-4 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-envelope fs-3 text-primary"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">0</div>
                                        <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Total
                                            Requests</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-envelope-plus fs-3 text-warning"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">25</div>
                                        <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                            Pending
                                            Requests</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-envelope-check fs-3 text-success"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">20</div>
                                        <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                            Completed Contracts</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-envelope-open fs-3 text-indigo"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">12</div>
                                        <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                            Cancelled Contracts</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Mini Card] end -->
        </div>
    </div>
@endsection

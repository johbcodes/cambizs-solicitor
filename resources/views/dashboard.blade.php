@extends('layouts.app')
@section('content')
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Overview</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Overview</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                        <span class="reportrange-picker-field"></span>
                    </div>
                    <div class="dropdown filter-dropdown">
                        <a class="btn btn-md btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                            data-bs-auto-close="outside">
                            <i class="feather-filter me-2"></i>
                            <span>Filter</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="dropdown-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Role" checked="checked" />
                                    <label class="custom-control-label c-pointer" for="Role">Role</label>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Team" checked="checked" />
                                    <label class="custom-control-label c-pointer" for="Team">Team</label>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Email" checked="checked" />
                                    <label class="custom-control-label c-pointer" for="Email">Email</label>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Member" checked="checked" />
                                    <label class="custom-control-label c-pointer" for="Member">Member</label>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Recommendation"
                                        checked="checked" />
                                    <label class="custom-control-label c-pointer"
                                        for="Recommendation">Recommendation</label>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-plus me-3"></i>
                                <span>Create New</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-filter me-3"></i>
                                <span>Manage Filter</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->

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

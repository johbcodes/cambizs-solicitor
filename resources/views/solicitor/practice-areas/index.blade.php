@extends('layouts.app')
@section('content')
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Practice Areas</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Practice Areas</li>
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
                <div class="d-flex align-items-center gap-2">
                    <a class="btn btn-md btn-primary" href="{{ route('solicitor.practiceArea.create') }}">
                        <i class="feather-plus me-2"></i>
                        <span>Add Practice Area</span>
                    </a>
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
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="proposalList">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Cost</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="single-item">
                                        <td><a href="javascript:void(0);" class="fw-bold">#321456</a></td>
                                        <td>
                                            <a href="javascript:void(0)" class="hstack gap-3">
                                                Family issue
                                            </a>
                                        </td>
                                        <td>A business proposal for a new product or service...</td>
                                        <td class="fw-bold text-dark">$249.99 USD</td>
                                        <td>2023-04-25, 03:42PM</td>
                                        <td>
                                            <div class="badge bg-soft-success text-success">Pending</div>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    title="Message solicitor">
                                                    <i class="feather feather-send"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

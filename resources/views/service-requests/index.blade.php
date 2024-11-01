@extends('layouts.app')
@section('content')
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

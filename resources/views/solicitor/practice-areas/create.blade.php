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
    <form action="{{ route('solicitor.practice_areas.store') }}" method="POST">
        @csrf
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
                <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                    <a href="{{ route('solicitor.practice_areas.index') }}" class="text-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="feather-save me-2"></i>
                        <span>Save Changes</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Practice Areas
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" name="practice_area_id" required>
                                    <option value="">Choose Practice Area</option>
                                    @foreach ($practiceAreas as $area)
                                        <option value="{{ $area->id }}"
                                            data-city="{{ ['bg-primary', 'bg-secondary', 'bg-success', 'bg-warning', 'bg-info', 'bg-danger', 'bg-dark', 'bg-muted', 'bg-teal', 'bg-cyan', 'bg-indigo', 'bg-green', 'bg-red', 'bg-orange', 'bg-darken', 'bg-black'][array_rand(['bg-primary', 'bg-secondary', 'bg-success', 'bg-warning', 'bg-info', 'bg-danger', 'bg-dark', 'bg-muted', 'bg-teal', 'bg-cyan', 'bg-indigo', 'bg-green', 'bg-red', 'bg-orange', 'bg-darken', 'bg-black'])] }}">
                                            {{ $area->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-dollar-sign"></i></div>
                                    <input type="text" class="form-control" id="VATInput" name="cost"
                                        placeholder="Cost of service" required>
                                </div>
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
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>
    <!--! END: Theme Customizer !-->
    <script>
        $(document).ready(function() {
            var i = 1;
            $("#add_row").click(function() {
                b = i - 1;
                $("#addr" + i)
                    .html($("#addr" + b).html())
                    .find("td:first-child")
                    .html(i + 1);
                $("#tab_logic").append('<tr id="addr' + (i + 1) + '"></tr>');
                i++;
            });
            $("#delete_row").click(function() {
                if (i > 1) {
                    $("#addr" + (i - 1)).html("");
                    i--;
                }
                calc();
            });
            $("#tab_logic tbody").on("keyup change", function() {
                calc();
            });
            $("#tax").on("keyup change", function() {
                calc_total();
            });
        });

        function calc() {
            $("#tab_logic tbody tr").each(function(i, element) {
                var html = $(this).html();
                if (html != "") {
                    var qty = $(this).find(".qty").val();
                    var price = $(this).find(".price").val();
                    $(this)
                        .find(".total")
                        .val(qty * price);
                    calc_total();
                }
            });
        }

        function calc_total() {
            total = 0;
            $(".total").each(function() {
                total += parseInt($(this).val());
            });
            $("#sub_total").val(total.toFixed(2));
            tax_sum = (total / 100) * $("#tax").val();
            $("#tax_amount").val(tax_sum.toFixed(2));
            $("#total_amount").val((tax_sum + total).toFixed(2));
        }
    </script>
@endpush

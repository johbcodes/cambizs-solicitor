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
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a class="btn btn-md btn-primary" href="{{ route('solicitor.practice_areas.create') }}"
                        data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
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
    <div class="main-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label">Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Related <span class="text-danger">*</span></label>
                            <select class="form-control" data-select2-selector="icon">
                                <option value="lead" data-icon="feather-at-sign">Lead</option>
                                <option value="coustomer" data-icon="feather-users">Coustomer</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Lead <span class="text-danger">*</span></label>
                            <select class="form-select" data-select2-selector="user">
                                <option value="1" data-user="1">Alexandra Della - Website design and development
                                </option>
                                <option value="2" data-user="2">Curtis Green - User experience (UX) and user
                                    interface (UI) design</option>
                                <option value="3" data-user="3">Marianne Audrey - Responsive and mobile design
                                </option>
                                <option value="4" data-user="4">Holland Scott - E-commerce website design and
                                    development</option>
                                <option value="5" data-user="5">Olive Delarosa - Custom graphics and icon design
                                </option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Discount </label>
                            <select class="form-select" data-select2-selector="default">
                                <option value="">No Discount</option>
                                <option value="">Before Tax</option>
                                <option value="">After Tax</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Visibility:</label>
                            <select class="form-select form-control" data-select2-selector="visibility">
                                <option value="public" data-icon="feather-globe">Public</option>
                                <option value="private" data-icon="feather-lock">Private</option>
                                <option value="private" data-icon="feather-user">Personal</option>
                                <option value="customs" data-icon="feather-settings">Customs</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Start <span class="text-danger">*</span></label>
                                <input class="form-control" id="startDate" placeholder="Pick start date ">
                            </div>
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Due <span class="text-danger">*</span></label>
                                <input class="form-control" id="dueDate" placeholder="Pick due date">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Tags:</label>
                            <select class="form-select form-control" data-select2-selector="tag" multiple>
                                <option value="primary" data-bg="bg-primary">Team</option>
                                <option value="teal" data-bg="bg-teal">Primary</option>
                                <option value="success" data-bg="bg-success">Updates</option>
                                <option value="warning" data-bg="bg-warning">Personal</option>
                                <option value="danger" data-bg="bg-danger">Promotions</option>
                                <option value="indigo" data-bg="bg-indigo">Customs</option>
                            </select>
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Assignee:</label>
                            <select class="form-select form-control" data-select2-selector="user" multiple>
                                <option value="alex@outlook.com" data-user="1">alex@outlook.com</option>
                                <option value="john.deo@outlook.com" data-user="2">john.deo@outlook.com</option>
                                <option value="green.cutte@outlook.com" data-user="3">green.cutte@outlook.com
                                </option>
                                <option value="nancy.elliot@outlook.com" data-user="4">nancy.elliot@outlook.com
                                </option>
                                <option value="mar.audrey@gmail.com" data-user="5">mar.audrey@gmail.com</option>
                                <option value="erna.serpa@outlook.com" data-user="6">erna.serpa@outlook.com</option>
                                <option value="green.cutte@outlook.com" data-user="7">green.cutte@outlook.com
                                </option>
                                <option value="nancy.elliot@outlook.com" data-user="8">nancy.elliot@outlook.com
                                </option>
                                <option value="mar.audrey@gmail.com" data-user="9">mar.audrey@gmail.com</option>
                                <option value="erna.serpa@outlook.com" data-user="10">erna.serpa@outlook.com</option>
                                <option value="mar.audrey@gmail.com" data-user="11">mar.audrey@gmail.com</option>
                                <option value="erna.serpa@outlook.com" data-user="12">erna.serpa@outlook.com</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="{{ asset('assets/vendors/js/tagify.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tagify-data.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/select2-active.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/datepicker.min.js') }}"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/proposal-create-init.min.js') }}"></script>
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

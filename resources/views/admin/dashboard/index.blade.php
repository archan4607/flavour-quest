@extends('admin.layout.master')
@section('title', 'Home Page')

@push("styles")
@endpush

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Dashboards</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Secondary button-->
                    <a href="#" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a>
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add Target</a>
                    <!--end::Primary button-->
                </div> --}}
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('ingredients.index') }}" class="card bg-primary hoverable mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="symbol symbol-50px me-2">
                                            <span class="text-white fw-bold fs-2 me-2">Total Ingredints</span>
                                        </div>
                                        <div class="d-flex flex-column text-end">
                                            <div class="text-white fw-bold fs-2" data-kt-countup="true"
                                                data-kt-countup-value="{{ $ing->count() }}" data-kt-countup-prefix="">0
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('categories.index') }}" class="card bg-success hoverable mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="symbol symbol-50px me-2">
                                            <span class="text-white fw-bold fs-2 me-2">Total Categories</span>
                                        </div>
                                        <div class="d-flex flex-column text-end">
                                            <div class="text-white fw-bold fs-2" data-kt-countup="true"
                                                data-kt-countup-value="{{ $cat->count() }}"
                                                data-kt-countup-prefix="">0</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('recipes.index') }}" class="card bg-danger hoverable  mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="symbol symbol-50px me-2">
                                            <span class="text-white fw-bold fs-2 me-2">Total Recipes</span>
                                        </div>
                                        <div class="d-flex flex-column text-end">
                                            <div class="text-white fw-bold fs-2" data-kt-countup="true"
                                                data-kt-countup-value="{{ $recipes_count     }}"
                                                data-kt-countup-prefix="">0</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection

@push("scripts")
@endpush
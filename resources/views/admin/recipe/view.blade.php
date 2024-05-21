@extends('admin.layout.master')

@section('title', 'View Recipe')



@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Recipe
                        Detail</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ $moduleView }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('recipes.index') }}"
                                class="text-muted text-hover-primary">{{ $module_name }}</a>
                        </li>
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <li class="breadcrumb-item text-muted">View Recipe</li>

                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Navbar-->
                <div class="card mb-5 mb-xl-10">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap ">
                            <div
                                class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                                @if ($recipe->image == null)
                                    <span class="svg-icon svg-icon-muted svg-icon-5x"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z"
                                                fill="currentColor" />
                                            <path
                                                d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                @else
                                    <a href="{{ Storage::url(config('filesystems.path.url.recipe') . $recipe->image) }}"
                                        target="_blank">
                                        <img class="mw-50px mw-lg-125px"
                                            src="{{ Storage::url(config('filesystems.path.url.recipe') . $recipe->image) }}"
                                            alt="image">
                                    </a>
                                @endif
                            </div>
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center ">
                                            <span
                                                class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $recipe->name }}</span>
                                            @if ($recipe->status == 0)
                                                <span
                                                    class="badge badge-light-success fw-bold ms-2 fs-8 py-1 px-3">Published</span>
                                            @elseif ($recipe->status == 1)
                                                <span
                                                    class="badge badge-light-danger fw-bold ms-2 fs-8 py-1 px-3">Un-Published</span>
                                            @else
                                                <span
                                                    class="badge badge-light-danger fw-bold ms-2 fs-8 py-1 px-3">ERROR</span>
                                            @endif
                                            <span
                                                class="badge badge-light-danger fw-bold ms-2 fs-8 py-1 px-3 changeStatusMsg d-none"></span>
                                        </div>
                                        <!--end::Name-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Actions-->

                                    <div class="d-flex">
                                        {{-- 
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input h-30px w-50px mx-auto outOfStockAll_OLD"
                                                data-checkStockAll=" {{ $overall_out_of_stock }}"
                                                {{ $overall_out_of_stock == 1 ? 'checked' : '' }} data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Out Of Stock All Variants" type="checkbox"
                                                value="{{ $recipe->id }}" />
                                        </div>&ensp;&ensp; --}}
                                        <!--begin::Menu-->
                                        <div class="me-0">
                                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="bi bi-three-dots fs-3"></i>
                                            </button>
                                            <!--begin::Menu 3-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="javascript:void(0)"
                                                        class="menu-link px-3 modal_addMultipleImages">Add Images</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="javascript:void(0)" class="menu-link px-3 changeRecipeStatus"
                                                        data-recipeStatus="{{ $recipe->status }}">Change
                                                        Status</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="javascript:void(0)" class="menu-link px-3 deleteRecord">Delete
                                                        Recipe</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 3-->
                                        </div>
                                        <!--end::Menu-->
                                        {{-- <button
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-danger "
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.5"
                                                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.5"
                                                        d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                        fill="currentColor" />
                                                </svg></span>
                                        </button> --}}
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Title-->
                                <!--begin::Add Product Image Modal-->
                                <div class="modal fade show" tabindex="-1" id="modal_addMultipleImages"aria-modal="true"
                                    role="dialog">
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <div class="modal-content blockui" id="kt_block_ui_unit_target" style="">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Recipe Images</h4>
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/arrows/arr011.svg-->
                                                    <span class="svg-icon svg-icon-muted svg-icon-2qx"><svg width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M6 19.7C5.7 19.7 5.5 19.6 5.3 19.4C4.9 19 4.9 18.4 5.3 18L18 5.3C18.4 4.9 19 4.9 19.4 5.3C19.8 5.7 19.8 6.29999 19.4 6.69999L6.7 19.4C6.5 19.6 6.3 19.7 6 19.7Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M18.8 19.7C18.5 19.7 18.3 19.6 18.1 19.4L5.40001 6.69999C5.00001 6.29999 5.00001 5.7 5.40001 5.3C5.80001 4.9 6.40001 4.9 6.80001 5.3L19.5 18C19.9 18.4 19.9 19 19.5 19.4C19.3 19.6 19 19.7 18.8 19.7Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Close-->
                                            </div>

                                            <div class="modal-body py-lg-10 px-lg-20">
                                                <!--begin:Form-->
                                                <form id="add_recipe" class="form" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('POST')

                                                    <!--begin::Input group-->
                                                    <div class="fv-row">
                                                        <!--begin::Dropzone-->
                                                        <div class="dropzone" id="kt_dropzonejs_example_1">
                                                            <!--begin::Message-->
                                                            <div class="dz-message needsclick">
                                                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/files/fil022.svg-->
                                                                <span class="svg-icon svg-icon-muted svg-icon-3x"><svg
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.3"
                                                                            d="M5 16C3.3 16 2 14.7 2 13C2 11.3 3.3 10 5 10H5.1C5 9.7 5 9.3 5 9C5 6.2 7.2 4 10 4C11.9 4 13.5 5 14.3 6.5C14.8 6.2 15.4 6 16 6C17.7 6 19 7.3 19 9C19 9.4 18.9 9.7 18.8 10C18.9 10 18.9 10 19 10C20.7 10 22 11.3 22 13C22 14.7 20.7 16 19 16H5ZM8 13.6H16L12.7 10.3C12.3 9.89999 11.7 9.89999 11.3 10.3L8 13.6Z"
                                                                            fill="currentColor" />
                                                                        <path
                                                                            d="M11 13.6V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19V13.6H11Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <!--begin::Info-->
                                                                <div class="ms-4">
                                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files
                                                                        here or click to upload.</h3>
                                                                    <span class="fs-7 fw-semibold text-gray-500">Upload up
                                                                        to 10 files</span>
                                                                </div>
                                                                <!--end::Info-->
                                                            </div>
                                                        </div>
                                                        <!--end::Dropzone-->
                                                    </div>
                                                    <div class="row mt-3">
                                                        <!--begin::Label-->
                                                        <label class="col-form-label fw-semibold fs-6">Note:- Image
                                                            resoultion should be 1024x1024 and its size should be 1.5
                                                            MB</label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Actions-->
                                                    {{-- <div class="text-center mt-10">
                                                        <button type="reset"
                                                            class="btn btn-light btn-active-light-primary me-2"
                                                            data-bs-dismiss="modal">Discard</button>
                                                        <button type="button" class="btn btn-primary" id="submitBtn">Add
                                                            Images</button>
                                                    </div> --}}
                                                    <!--end::Actions-->
                                                </form>

                                                <!--end:Form-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Add Product Image Modal-->
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Stat-->
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bold">
                                                        {{ \Carbon\Carbon::parse($recipe->created_at)->format('d M, Y') }}
                                                    </div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">Recipe Created </div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                            <!--begin::Stat-->
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bold">
                                                        {{ \Carbon\Carbon::parse($recipe->updated_at)->format('d M, Y') }}
                                                    </div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">Recipe Updated</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Navs-->
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <!--begin::Nav item-->
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab"
                                    href="#tab_1" aria-selected="true" role="tab">Recipe</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item mt-2 recipe_tab">
                            </li>
                            <!--end::Nav item-->
                        </ul>
                        <!--begin::Navs-->
                    </div>
                </div>
                <!--end::Navbar-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade show active tab_1_default" id="tab_1" role="tab-panel">
                        <!--begin::details section-->
                        <div class="card mb-5 mb-xl-6">
                            <!--begin::Card header-->
                            <div class="card-header cursor-pointer">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Recipe</h3>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Action-->
                                <a href="{{ route('recipes.edit', ['recipe' => $recipe->id]) }}"
                                    class="btn btn-sm btn-primary align-self-center">Edit Recipe</a>
                                <!--end::Action-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body p-9">

                                <!--begin::Row-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Recipe Name</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ $recipe->name }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Categories</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ $recipe->category_id }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Ingredients</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ $recipe->ingredients_id }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Contain Egg</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <span
                                            class="fw-semibold text-gray-800 fs-6">{{ $recipe->contain_egg == 0 ? 'Yes' : 'No' }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Type</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span
                                            class="fw-bold fs-6 text-gray-800 me-2">{{ $recipe->type == 0 ? 'Veg' : 'Non-veg' }}</span>

                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Description</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="fw-bold fs-6 text-gray-800 me-2">{!! $recipe->description !!}</span>

                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Instruction</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="fw-bold fs-6 text-gray-800 me-2">{!! $recipe->instruction !!}</span>

                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Direction</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="fw-bold fs-6 text-gray-800 me-2">{!! $recipe->direction !!}</span>

                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Serve</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="fw-bold fs-6 text-gray-800 me-2">{{ $recipe->serve }}</span>

                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Preparation Time</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span
                                            class="fw-bold fs-6 text-gray-800 me-2">{{ $recipe->preparation_time }}</span>

                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Cooking Time</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="fw-bold fs-6 text-gray-800 me-2">{{ $recipe->cooking_time }}</span>

                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Updated At</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ $recipe->updated_at }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->

                        </div>
                        <!--end::details section-->
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="tab_4" role="tab-panel">
                        <!--begin::details section-->
                        <div class="card mb-5 mb-xl-6">
                            <!--begin::Card header-->
                            <div class="card-header cursor-pointer">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Recipe Images</h3>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Action-->
                                <a href="javascript:void(0)"
                                    class="btn btn-sm btn-primary align-self-center modal_addMultipleImages">Add
                                    Images</a>
                                <!--end::Action-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body multipleImage">
                                <div class="row">
                                    {{-- @foreach ($pro_images as $key => $value)
                                            <div class="col-lg-4 mt-3 mb-3">
                                                <!--begin::Card-->
                                                <div class="card  overlay overflow-hidden">
                                                    <div class="card-body p-0">
                                                        <div class="overlay-wrapper">
                                                            <img src="{{ Storage::url(config('filesystems.path.url.recipe') . $value->image) }}"
                                                                alt="" class="w-100 rounded" />
                                                        </div>
                                                        <div class="overlay-layer bg-dark bg-opacity-25">
                                                            <a href="{{ Storage::url(config('filesystems.path.url.recipe') . $value->image) }}"
                                                                target="_blank"
                                                                class="btn btn-primary btn-shadow">View</a>
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-light-danger btn-shadow ms-2 deleteImage"
                                                                data-image_id="{{ $value->id }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                        @endforeach --}}
                                </div>
                            </div>
                            <!--end::Card body-->

                        </div>
                        <!--end::details section-->
                    </div>
                    <!--end::Tab pane-->
                </div>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            imageFetch('{{ $recipe->id }}');

            function imageFetch(id) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('imageFetch') }}",
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.data.length > 0) {
                            var data1 = '';
                            var data2 = '';
                            data1 +=
                                '<a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#tab_4" aria-selected="true" role="tab">Gallery</a>';
                            data2 += '<div class="row">';
                            response.data.forEach(function(image) {
                                data2 += '<div class="col-lg-4 mt-3 mb-3">';
                                data2 += '<div class="card overlay overflow-hidden">';
                                data2 += '<div class="card-body p-0">';
                                data2 += '<div class="overlay-wrapper">';
                                data2 += '<img src="' +
                                    '{{ Storage::url(config('filesystems.path.url.recipe')) }}' +
                                    image.image + '" alt="" class="w-100 rounded" />';
                                data2 += '</div>';
                                data2 += '<div class="overlay-layer bg-dark bg-opacity-25">';
                                data2 += '<a href="' +
                                    '{{ Storage::url(config('filesystems.path.url.recipe')) }}' +
                                    image.image +
                                    '" target="_blank" class="btn btn-primary btn-shadow">View</a>';
                                data2 +=
                                    '<a href="javascript:void(0)" class="btn btn-light-danger btn-shadow ms-2 deleteImage" data-image_id="' +
                                    image.id + '">Delete</a>';
                                data2 += '</div></div></div></div>';
                            });
                            data2 += '</div>';
                            $('.recipe_tab').html(data1);
                            $('.multipleImage').html(data2);
                        } else {
                            $('#tab_1').addClass('show active').removeClass('fade');
                            $('.nav-link[href="#tab_1"]').addClass('active');
                            $('.tab-pane').not('#tab_1').removeClass('show').addClass('fade');
                            $('.recipe_tab').html('');
                            $('.multipleImage').html('');
                        }
                    }

                });
            }
            var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
                url: "{{ route('imageUpload') }}", // Set the route to your image upload controller method
                paramName: "file", // The name that will be used to transfer the file
                maxFiles: 10,
                maxFilesize: 1.5, // MB
                addRemoveLinks: false,
                maxFileDimensions: {
                    width: 1024,
                    height: 1024
                },
                accept: function(file, done) {
                    if (file.name == "wow.jpg") {
                        done("Naha, you don't.");
                    } else {
                        done();
                    }
                },
                init: function() {
                    this.on("sending", function(file, xhr, formData) {
                        var csrfToken = $('meta[name="csrf-token"]').attr(
                            'content');
                        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                        formData.append('productId', '{{ $recipe->id }}');
                    });
                    this.on("success", function(file, response) {
                        imageFetch('{{ $recipe->id }}');
                        toastcall('success', response.message);
                    });
                    this.on("error", function(file, errorMessage) {
                        console.error(errorMessage);
                    });
                }
            });
            $('.modal_addMultipleImages').click(function(e) {
                // e.preventDefault();
                $('#modal_addMultipleImages').modal('show');
            });
            $('#modal_addMultipleImages').on('hidden.bs.modal', function(e) {
                imageFetch('{{ $recipe->id }}');
                myDropzone.removeAllFiles(true);
            });

            $('.reloadDatatable').click(function(e) {
                oTable.draw();
            });

            $(document).on('click', '.changeRecipeStatus', function(e) {
                e.preventDefault();

                var modalTitle, ajaxUrl;
                var id = '{{ $recipe->id }}';
                // var status = '{{ $recipe->status }}';
                var status = $(this).attr("data-recipeStatus");
                if (status == 0) {
                    modalTitle = "Are you sure you want to change the status to Un-Published ?";
                    ajaxUrl = "{{ route('products_publisToUnpublish') }}";
                    status = 1;
                } else {
                    modalTitle = "Are you sure you want to change the status to Published ?";
                    ajaxUrl = "{{ route('products_unpublishToPublish') }}";
                    status = 0;
                }
                // console.log(id);
                Swal.fire({
                    html: modalTitle, // Display the ID in the SweetAlert message
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Sure!",
                    cancelButtonText: 'No, Cancel!',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "get",
                            url: ajaxUrl,
                            data: {
                                id: id,
                                status: status
                            },
                            success: function(response) {
                                if (response.status == 'success') {
                                    // $(this).attr("data-recipeStatus", status);
                                    // var msg =
                                    //     '<span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">' +
                                    //     (status == 0 ? 'Published' : 'Un-Published') +
                                    //     '</span>';
                                    // $('.changeStatusMsg').removeClass('d-none');
                                    // $('.changeStatusMsg').html(msg);
                                    toastcall('success', response.message);
                                    location.reload();
                                } else {
                                    toastcall('error', response.message);
                                }
                            }
                        });

                    } else {
                        // console.log("Deletion cancelled");
                    }
                });
            });
            $(document).on('click', '.deleteRecord', function(e) {
                e.preventDefault();

                // Get the ID from the clicked delete button
                var id = '{{ $recipe->id }}';
                // console.log(id);
                Swal.fire({
                    html: "Are you sure you want to delete ?", // Display the ID in the SweetAlert message
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: 'No, Cancel!',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('recipes.destroy', '+id+') }}",
                            data: {
                                id: id,
                                status: '0'
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.status == 'success') {
                                    toastcall('success', response.message);
                                    window.location = href =
                                        "{{ route('recipes.index') }}";
                                } else {
                                    toastcall('error', response.message);
                                }
                            }
                        });

                    } else {
                        // console.log("Deletion cancelled");
                    }
                });
            });
            $(document).on('click', '.deleteImage', function(e) {
                e.preventDefault();

                // var id = '{{ $recipe->id }}';
                var id = $(this).attr('data-image_id');
                // console.log(id);
                Swal.fire({
                    html: "Are you sure you want to delete ?", // Display the ID in the SweetAlert message
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: 'No, Cancel!',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('imageDelete') }}",
                            data: {
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.status == 'success') {
                                    imageFetch('{{ $recipe->id }}');
                                    toastcall('success', response.message);
                                } else {
                                    toastcall('error', response.message);
                                }
                            }
                        });

                    } else {
                        // console.log("Deletion cancelled");
                    }
                });
            });
            @if (session('status') && session('message'))
                toastcall('{{ session('status') }}', '{{ session('message') }}');
            @endif
        });
    </script>
@endpush

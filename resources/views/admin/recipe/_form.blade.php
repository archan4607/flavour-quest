@extends('admin.layout.master')

@section('title', $module_title)

@section('css')
@endsection

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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        {{ $module_name }}</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ $moduleView }}" class="text-muted text-hover-primary">Home </a>
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
                <!--begin::Form-->
                <form id="kt_add_product_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                    @isset($recipesDetail)
                        @method('PUT')
                    @else
                        @method('POST')
                    @endisset

                    @csrf
                    <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Thumbnail</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <!--begin::Image input placeholder-->
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('{{ asset('assets/media/svg/files/blank-image.svg') }}');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('{{ asset('assets/media/svg/files/blank-image-dark.svg') }}');
                                    }
                                </style>
                                <!--end::Image input placeholder-->
                                <div class="image-input image image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-150px h-150px" id="image"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="recipe_thumbnail" id="recipe_thumbnail" class="imagesrc"
                                            accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the recipe thumbnail image. Only *.png, *.jpg and *.jpeg
                                    image files are accepted</div>
                                <!--end::Description-->
                                <div id="error_images"></div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Thumbnail settings-->
                        <!--begin::Status-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Status</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle w-15px h-15px" id="kt_recipe_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" id="status" name="status">
                                    <option></option>
                                    <option value="0"
                                        <?= isset($recipesDetail) ? ($recipesDetail->status == 0 ? 'selected' : '') : 'selected' ?>>
                                        Published</option>
                                    <option value="1"
                                        <?= isset($recipesDetail) ? ($recipesDetail->status == 1 ? 'selected' : '') : '' ?>>
                                        Un-Published</option>
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the recipe status.</div>
                                <!--end::Description-->
                                <!--begin::Datepicker-->
                                <div class="d-none mt-10">
                                    <label for="kt_recipe_status_datepicker" class="form-label">Select publishing date and
                                        time</label>
                                    <input class="form-control" id="kt_recipe_status_datepicker"
                                        placeholder="Pick date & time" />
                                </div>
                                <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Status-->
                        <!--begin::Category & tags-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Categories</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <!--begin::Label-->
                                {{-- <label class="form-label">Categories</label> --}}
                                <!--end::Label-->
                                <!--begin::Select2-->
                                <select class="form-select mb-2" data-control="select2" data-placeholder="Select an option"
                                    name="categories[]" id="categories" data-allow-clear="true" multiple="multiple">
                                    <option></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ isset($recipesDetail) ? (in_array($category->id, explode(',', $recipesDetail->category_id)) ? 'selected' : '') : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7 mb-2">Add recipe category.</div>
                                <!--end::Description-->
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Ingredients</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <!--begin::Label-->
                                {{-- <label class="form-label">Categories</label> --}}
                                <!--end::Label-->
                                <!--begin::Select2-->
                                <select class="form-select mb-2" data-control="select2" data-placeholder="Select an option"
                                    name="ingredients[]" id="ingredients" data-allow-clear="true" multiple="multiple">
                                    <option></option>
                                    @foreach ($ingredients as $ingredient)
                                        <option value="{{ $ingredient->id }}"
                                            {{ isset($recipesDetail) ? (in_array($ingredient->id, explode(',', $recipesDetail->ingredients_id)) ? 'selected' : '') : '' }}>
                                            {{ $ingredient->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7 mb-2">Add recipe ingredient.</div>
                                <!--end::Description-->
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Category & tags-->
                    </div>
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>General</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Row Input-->
                                            <div class="mb-10 d-flex flex-wrap gap-5">
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Recipe Name</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="recipe_name" class="form-control mb-2"
                                                        placeholder="Recipe name"
                                                        value="{{ isset($recipesDetail) ? $recipesDetail->name : old('recipe_name') }}"
                                                        id="recipe_name" />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">A Recipe name is required and recommended
                                                        to
                                                        be unique.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end:Row Input-->
                                            <!--begin::Row Input-->
                                            <div class="mb-10 d-flex flex-wrap gap-5">
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Contain Egg</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select2-->
                                                    <select class="form-select mb-2" name="contain_egg" id="contain_egg"
                                                        data-control="select2" data-hide-search="true"
                                                        data-placeholder="Select an option">
                                                        <option></option>
                                                        <option value="0"
                                                            {{ isset($recipesDetail) ? ($recipesDetail->contain_egg == 0 ? 'selected' : '') : '' }}>
                                                            Yes
                                                        </option>
                                                        <option value="1"
                                                            {{ isset($recipesDetail) ? ($recipesDetail->contain_egg == 1 ? 'selected' : '') : '' }}>
                                                            No
                                                        </option>
                                                    </select>
                                                    <!--end::Select2-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="form-label required">Type</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select2-->
                                                    <select class="form-select mb-2" name="type_select" id="type_select"
                                                        data-control="select2" data-hide-search="true"
                                                        data-placeholder="Select an option">
                                                        <option></option>
                                                        <option value="0"
                                                            {{ isset($recipesDetail) ? ($recipesDetail->type == 0 ? 'selected' : '') : '' }}>
                                                            Veg
                                                        </option>
                                                        <option value="1"
                                                            {{ isset($recipesDetail) ? ($recipesDetail->type == 1 ? 'selected' : '') : '' }}>
                                                            Non-Veg
                                                        </option>
                                                    </select>
                                                    <!--end::Select2-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end:Row Input-->
                                            <!--begin::Input group-->
                                            <div class="py-5">
                                                <!--begin::Label-->
                                                <label class="form-label required">Short Description</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea name="short_description" id="short_description">
                                                    {{ isset($recipesDetail) ? $recipesDetail->description : '' }}
                                                </textarea>
                                                <!--end::Editor-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label required">Instruction</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea name="instruction" id="instruction">
                                                    {{ isset($recipesDetail) ? $recipesDetail->instruction : '' }}
                                                </textarea>
                                                <!--end::Editor-->
                                                <!--begin::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label required">Direction</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea name="direction" id="direction">
                                                    {{ isset($recipesDetail) ? $recipesDetail->direction : '' }}
                                                </textarea>
                                                <!--end::Editor-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                    <!--begin::Dimensions-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Other Details</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Row Input-->
                                            <div class="mb-10 d-flex flex-wrap gap-5">
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Serve</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control mb-2"
                                                        value="{{ isset($recipesDetail) ? $recipesDetail->serve : old('serve') }}"
                                                        id="serve" name="serve" placeholder="Serve" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="form-label required">Preparation Time</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control mb-2"
                                                        value="{{ isset($recipesDetail) ? $recipesDetail->preparation_time : old('preparation_time') }}"
                                                        id="preparation_time" name="preparation_time"
                                                        placeholder="Preparation Time" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="mb-10 d-flex flex-wrap gap-5">
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Level</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select mb-2" name="level" id="level"
                                                        data-control="select2" data-hide-search="true"
                                                        data-placeholder="Select an option">
                                                        <option></option>
                                                        <option value="Easy"
                                                            {{ isset($recipesDetail) ? ($recipesDetail->level == 'Easy' ? 'selected' : '') : '' }}>
                                                            Easy
                                                        </option>
                                                        <option value="Normal"
                                                            {{ isset($recipesDetail) ? ($recipesDetail->level == 'Normal' ? 'selected' : '') : '' }}>
                                                            Normal
                                                        </option>
                                                        <option value="Difficult"
                                                            {{ isset($recipesDetail) ? ($recipesDetail->level == 'Difficult' ? 'selected' : '') : '' }}>
                                                            Difficult
                                                        </option>
                                                        <option value="Complex"
                                                            {{ isset($recipesDetail) ? ($recipesDetail->level == 'Complex' ? 'selected' : '') : '' }}>
                                                            Complex
                                                        </option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 d-flex flex-wrap gap-5">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row w-100 flex-md-root">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Cooking Time</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control mb-2"
                                                            value="{{ isset($recipesDetail) ? $recipesDetail->cooking_time : old('cooking_time') }}"
                                                            id="cooking_time" name="cooking_time"
                                                            placeholder="Package Height" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end:Row Input-->
                                            <!--begin::Row Input-->
                                            
                                            <!--end:Row Input-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Dimensions-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <a href="{{ route('recipes.index') }}" class="btn btn-light me-5">Cancel</a>
                                        <!--end::Button-->
                                        @isset($recipesDetail)
                                            <!--begin::Button-->
                                            <button type="submit" id="kt_product_submit_edit" class="btn btn-primary">
                                                <span class="indicator-label">Update Changes</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        @else
                                            <!--begin::Button-->
                                            <button type="submit" id="kt_product_submit" class="btn btn-primary">
                                                <span class="indicator-label">Save Changes</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Main column-->
                </form>
                <!--end::Form-->
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

            var recipesDetail = {!! isset($recipesDetail) ? 'true' : 'false' !!};
            if (recipesDetail) {
                var product_id = {!! isset($recipesDetail) ? $recipesDetail->id : 'null' !!};
                $('#image').css("background-image",
                    "url('{{ isset($recipesDetail) ? Storage::url(config('filesystems.path.url.recipe')) . $recipesDetail->image : '' }}')"
                );
                $('.image').removeClass('image-input-empty').addClass('image-input-outline');
                $(".imagesrc").attr("src",
                    "{{ isset($recipesDetail) ? Storage::url(config('filesystems.path.url.recipe')) . $recipesDetail->image : '' }}"
                );
            }


            var short_description_editor;
            ClassicEditor
                .create(document.querySelector('#short_description'))
                .then(instance => {
                    // console.log(editor);
                    short_description_editor = instance;
                })
                .catch(error => {
                    console.error(error);
                });
            var instruction_editor;
            ClassicEditor
                .create(document.querySelector('#instruction'))
                .then(instance => {
                    // console.log(editor);
                    instruction_editor = instance;
                })
                .catch(error => {
                    console.error(error);
                });
            var direction_editor;
            ClassicEditor
                .create(document.querySelector('#direction'))
                .then(instance => {
                    // console.log(editor);
                    direction_editor = instance;
                })
                .catch(error => {
                    console.error(error);
                });

            // function fetch_repeater_form(transformedData) {
            //     var addHTML = '';

            //     for (var i = 0; i < transformedData.length; i++) {
            //         addHTML += '<div class="form-group mb-4">';
            //         addHTML += '<div class="form-group row">';
            //         var hidden_id = transformedData[i].id.split('.');
            //         var labels = transformedData[i].label.split('.');
            //         var options = transformedData[i].product_option_value.split('.');
            //         addHTML += '<input type="hidden" class="form-control mb-2 mb-md-0" readonly value="' +
            //             hidden_id + '" name="hidden_id[]"/>';
            //         addHTML += '<input type="hidden" class="form-control mb-2 mb-md-0" readonly value="' + options +
            //             '" name="options[]"/>';


            //         for (var j = 0; j < hidden_id.length; j++) {
            //             addHTML += '<div class="col-md-2">';
            //             addHTML += '<label class="form-label">' + labels[j].trim() + '</label>';
            //             addHTML +=
            //                 '<input type="text" class="bg-light form-control mb-2 mb-md-0" readonly value="' +
            //                 options[j].trim() + '" />';
            //             addHTML += '</div>';
            //         }

            //         //sku
            //         addHTML += '<div class="col-md-2">';
            //         addHTML += '<label class="form-label">SKU</label>';
            //         addHTML += '<input type="text" class="form-control mb-2 mb-md-0"  name="sku[]"/>';
            //         addHTML += '</div>';

            //         //original price
            //         addHTML += '<div class="col-md-2">';
            //         addHTML += '<label class="form-label">Original Price</label>';
            //         addHTML += '<input type="text" class="form-control mb-2 mb-md-0"  name="org_price[]"/>';
            //         addHTML += '</div>';

            //         //discount price
            //         addHTML += '<div class="col-md-2">';
            //         addHTML += '<label class="form-label">Discounted Price</label>';
            //         addHTML += '<input type="text" class="form-control mb-2 mb-md-0"  name="dis_price[]"/>';
            //         addHTML += '</div>';

            //         addHTML += '<div class="col-md-2">';
            //         addHTML += '<label class="form-label">Out of Stock</label>';
            //         addHTML +=
            //             '<div class="form-check form-switch form-check-custom form-check-solid col-6 mt-3"><input class="form-check-input h-20px w-30px mx-auto outOfStockCheck" type="checkbox" value="0" name="out_of_stock[]" /></div>';
            //         addHTML += '</div>';

            //         addHTML += '<!--begin::Separator--><div class="separator mt-5"></div><!--end::Separator-->'

            //         addHTML += '</div></div>';
            //         // console.log(addHTML);
            //     }
            //     $('#variation_data').html(addHTML);
            //     $('#variant_spinner').html('');
            //     $('#variant_spinner').removeClass('overlay-layer card-rounded bg-dark bg-opacity-5');
            //     $('#kt_variation_list').removeClass("overlay-block");
            // }

            // $("#gotoStep2").click(function(e) {
            //     e.preventDefault();
            //     $('.product_variation').removeClass('d-none');
            //     var data = [];

            //     var isVariationAdded = false;

            //     $("[data-repeater-item='type_product']").each(function(i) {
            //         // Check if the select option is selected
            //         var productOption_hidden = $(this).find("[name='kt_product_variant_list[" + i +
            //             "][product_option]']").val();

            //         if (productOption_hidden) {
            //             var productOption = $(this).find("[name='kt_product_variant_list[" + i +
            //                 "][product_option]'] option:selected").text();

            //             var productOptionValue = $(this).find("[name='kt_product_variant_list[" +
            //                 i + "][product_option_value]']").val();
            //             if (productOptionValue && productOptionValue.trim() !== '') {
            //                 isVariationAdded = true;

            //                 var productOptionValueArray = productOptionValue.split(',').map(
            //                     function(item) {
            //                         return item.trim();
            //                     });

            //                 var formDataObject = {
            //                     id: productOption_hidden,
            //                     product_option: productOption,
            //                     product_option_value: productOptionValueArray
            //                 };

            //                 data.push(formDataObject);
            //             }
            //         }
            //     });

            //     if (!isVariationAdded) {
            //         alert("Please add at least one variation.");
            //     } else {
            //         var currentTab = $(".nav-tabs .nav-link.active");
            //         var nextTab = currentTab.parent().next().find("a");

            //         if (nextTab.length > 0) {
            //             nextTab.tab("show");
            //         }
            //     }

            //     // console.log(data);
            //     var transformedData = [];

            //     for (var i = 0; i < data.length; i++) {
            //         var id = data[i].id;
            //         var productOption = data[i].product_option;
            //         var productOptionValues = data[i].product_option_value;

            //         if (transformedData.length === 0) {
            //             for (var j = 0; j < productOptionValues.length; j++) {
            //                 var entry = {
            //                     "id": id,
            //                     "label": productOption,
            //                     "product_option_value": productOptionValues[j]
            //                 };
            //                 transformedData.push(entry);
            //             }
            //         } else {
            //             var tempData = [];
            //             for (var k = 0; k < transformedData.length; k++) {
            //                 for (var l = 0; l < productOptionValues.length; l++) {
            //                     var newEntry = {
            //                         "id": transformedData[k].id + "." + id,
            //                         "label": transformedData[k].label + "." + productOption,
            //                         "product_option_value": transformedData[k].product_option_value +
            //                             "." + productOptionValues[l]
            //                     };
            //                     tempData.push(newEntry);
            //                 }
            //             }
            //             transformedData = tempData;
            //         }
            //     }

            //     // console.log(transformedData);
            //     if (transformedData != null) {
            //         fetch_repeater_form(transformedData);
            //     }

            // });

            // $("#goBack").on("click", function(e) {
            //     e.preventDefault();
            //     // Switch to the previous tab
            //     var currentTab = $(".nav-tabs .nav-link.active");
            //     var prevTab = currentTab.parent().prev().find("a");

            //     if (prevTab.length > 0) {
            //         prevTab.tab("show");
            //     }
            // });
            // $('#kt_product_variant').repeater({
            //     initEmpty: false,
            //     defaultValues: {
            //         'text-input': 'foo'
            //     },
            //     show: function() {
            //         $(this).slideDown();

            //         // Initialize select2 for the newly added element
            //         initSelect2($(this).find(
            //             '[data-kt-ecommerce-catalog-add-product="product_option"]'));
            //     },
            //     hide: function(deleteElement) {
            //         $(this).slideUp(deleteElement);
            //     }
            // });

            // // Initialize select2 for the initial element
            // initSelect2($('[data-kt-ecommerce-catalog-add-product="product_option"]'));

            // // Function to initialize select2
            // function initSelect2(element) {
            //     element.select2({
            //         // Add any select2 options as needed
            //     });
            // }

            $('#status').change(function(e) {
                // e.preventDefault();
                if ($('#status').val() == 0) {
                    $('#kt_recipe_status').removeClass('bg-danger').addClass('bg-success');
                } else {
                    $('#kt_recipe_status').removeClass('bg-success').addClass('bg-danger');
                }
            });
            if ($('#status').val() == 0) {
                $('#kt_recipe_status').removeClass('bg-danger').addClass('bg-success');
            } else {
                $('#kt_recipe_status').removeClass('bg-success').addClass('bg-danger');
            }

            function send_data(id) {
                var data_url;
                if (id) {
                    data_url = "{!! $module_route . '/recipes' !!}/" + id;
                } else {
                    data_url = "{{ route('recipes.store') }}";
                }

                var short_description = short_description_editor.getData();
                var instruction = instruction_editor.getData();
                var direction = direction_editor.getData();
                var formData = new FormData($('#kt_add_product_form')[0]);

                // Manually add checkbox values to the formData
                $('.outOfStockCheck').each(function() {
                    formData.append('out_of_stock[]', $(this).prop('checked') ? 1 : 0);
                });
                var img_detail = $('#recipe_thumbnail')[0].files[0];
                formData.append('recipe_thumbnail', img_detail);
                formData.append('short_description', short_description);
                formData.append('instruction', instruction);
                formData.append('direction', direction);
                // console.log(formData);

                $.ajax({
                    type: "POST",
                    url: data_url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 'success') {
                            // console.log('Settings Updated');
                            toastcall(response.status, response.message);
                            window.location.href = "{{ route('recipes.index') }}";
                        } else {
                            console.log('Failed');
                            toastcall(response.status, response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status == 422) {
                            var errors = xhr.responseJSON.errors;
                            $('.text-danger').remove();

                            $.each(errors, function(field, fieldErrors) {
                                var errorMessage = fieldErrors.join(", ");

                                if (field == 'recipe_thumbnail') {
                                    $('#error_images').text(errorMessage).addClass(
                                        "mt-3 text-danger"); // Update the ID here
                                } else {
                                    $('#' + field).after(
                                        '<li class="mt-2 text-danger">' +
                                        errorMessage + '</li>');
                                }
                            });
                        } else {
                            console.log("Error: " + status + " - " + error);
                        }
                    }
                });
            }
            $("#kt_product_submit").click(function(e) {
                e.preventDefault();
                send_data();
            });
            $("#kt_product_submit_edit").click(function(e) {
                e.preventDefault();
                send_data(product_id);
            });

        });
    </script>
@endpush

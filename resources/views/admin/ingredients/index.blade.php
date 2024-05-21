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
                            <a href="{{ $moduleView }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{ $module_name }}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->
                    <div class="m-0">
                        <!--begin::Menu toggle-->
                        {{-- <a href="#"
                            class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-6 svg-icon-muted me-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Filter</a> --}}
                        <!--end::Menu toggle-->
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_63de8ad9d5bf8">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->
                            <!--begin::Form-->
                            <form action="" method="post">
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div>
                                            <select class="form-select form-select-solid" data-kt-select2="true"
                                                id='status' data-placeholder="Select option"
                                                data-dropdown-parent="#kt_menu_63de8ad9d5bf8" data-allow-clear="true">
                                                <option value='' disabled selected>Select Option</option>
                                                <option value="0">Published</option>
                                                <option value="1">Un-Published</option>
                                            </select>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Created At</label>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <div
                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <input class="form-control form-control-solid dateRangePicker"
                                                placeholder="Pick date rage" id="created_at" name="created_at"
                                                value="" readonly />
                                        </div>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset"
                                            class="btn btn-sm btn-light btn-active-light-primary me-2 filter-btn"
                                            data-kt-menu-dismiss="true">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-primary filter-btn"
                                            data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                    </div>
                    <!--end::Filter menu-->
                    <!--begin::Secondary button-->
                    {{-- <div class="card-toolbar">
                        <a class="btn btn-sm fw-bold btn-secondary" href="{{ url('admin/export-category-count') }}"
                            title="Export">Export</a>
                    </div> --}}
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-sm fw-bold btn-primary" id="modal_show_categories">Add Ingredient</a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div class="app-container container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    {{-- <div class="card-header border-0">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Ingredient wise counting</h2>
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <a class="btn btn-sm fw-bold btn-secondary" href="{{ url('admin/export-category-count') }}" title="Export">Export</a>                            
                        </div>
                        <!--end::Card toolbar-->
                    </div> --}}
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5  mb-0 data-listing">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-150px ">Ingredient ID</th>
                                    <th class="min-w-175px">Name</th>
                                    {{-- <th class="min-w-150px">Category</th> --}}
                                    {{-- <th class="min-w-100px text-center">Diaplay In Home</th>
                                    <th class="min-w-100px text-center">Diaplay In Category</th> --}}
                                    <th class="min-w-100px text-center">Un-Published / Published</th>
                                    <th class="min-w-125px">Created Date</th>
                                    <th class="min-w-125px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

    <!--begin::Add Ingredient Modal-->
    <div class="modal fade show" tabindex="-1" id="kt_modal_form"aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content blockui" id="kt_block_ui_form_target" style="">
                <div class="modal-header">
                    <h4 class="modal-title">Add Ingredient</h4>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/arrows/arr011.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2qx"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    <form id="add_form_details" class="form">
                        @csrf
                        @method('PUT')
                        @method('POST')

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Status</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Options-->
                                <div class="d-flex align-items-center mt-3">
                                    <!--begin::Option-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="0" id="status"
                                            name='status' checked />
                                        <label class="form-check-label" for="status">
                                            Published &ensp;&ensp;&ensp;
                                        </label>
                                    </div>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="1" id="status2"
                                            name='status' />
                                        <label class="form-check-label" for="status2">
                                            Un-Published &ensp;&ensp;&ensp;
                                        </label>
                                    </div>
                                    <!--end::Option-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="name" id="name"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Ingredient name" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        {{-- <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6" id="category_label">Select
                                Category</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row" id="category_dropdown">
                                        <select class="form-select form-select-solid" data-kt-select2="true"
                                            id='category_select' name='category_select' data-placeholder="Select option">
                                            <option value='' disabled selected>Select Option</option>
                                            @foreach ($category as $category => $values)
                                                <option value="{{ $values->id }}">{{ $values->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div> --}}
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center mt-10">
                            {{-- <button class="btn btn-light me-3" data-bs-dismiss="modal">
                                Cancel
                            </button>

                            <button id="kt_block_ui_4_button" class="btn btn-primary">
                                Update Password
                            </button> --}}
                            <button type="reset" class="btn btn-light  btn-active-light-primary me-2"
                                data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-primary" id="kt_block_ui_form_button">Add
                                Ingredient</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Add Ingredient Modal-->
@endsection

@push('scripts')
    <script>
        $('.dateRangePicker').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            },
            maxDate: moment()
        });

        $('.dateRangePicker').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
        });

        $('.dateRangePicker').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            $(this).data('daterangepicker').setStartDate(moment());
            $(this).data('daterangepicker').setEndDate(moment());
        });
        $(document).ready(function() {

            var oTable = $('.data-listing').DataTable({
                //"dom": '<"row" <"col-sm-4"l> <"col-sm-4"r> <"col-sm-4"f>> <"row"  <"col-sm-12"t>> <"row" <"col-sm-5"i> <"col-sm-7"p>>',
                // "dom": " <'row'<'col-sm-4'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-2'l><'col-sm-6'i><'col-sm-4'p>>",
                "dom": "<'row'<'col-sm-4'f><'col-sm-8 text-end'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-2'l><'col-sm-6'i><'col-sm-4'p>>",
                buttons: [{
                    className: 'btn btn-light-primary mt-4',
                    text: '<span class="ps-2 svg-icon svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.5 20.7259C14.6 21.2259 14.2 21.826 13.7 21.926C13.2 22.026 12.6 22.0259 12.1 22.0259C9.5 22.0259 6.9 21.0259 5 19.1259C1.4 15.5259 1.09998 9.72592 4.29998 5.82592L5.70001 7.22595C3.30001 10.3259 3.59999 14.8259 6.39999 17.7259C8.19999 19.5259 10.8 20.426 13.4 19.926C13.9 19.826 14.4 20.2259 14.5 20.7259ZM18.4 16.8259L19.8 18.2259C22.9 14.3259 22.7 8.52593 19 4.92593C16.7 2.62593 13.5 1.62594 10.3 2.12594C9.79998 2.22594 9.4 2.72595 9.5 3.22595C9.6 3.72595 10.1 4.12594 10.6 4.02594C13.1 3.62594 15.7 4.42595 17.6 6.22595C20.5 9.22595 20.7 13.7259 18.4 16.8259Z" fill="currentColor"/><path opacity="0.3" d="M2 3.62592H7C7.6 3.62592 8 4.02592 8 4.62592V9.62589L2 3.62592ZM16 14.4259V19.4259C16 20.0259 16.4 20.4259 17 20.4259H22L16 14.4259Z" fill="currentColor"/></svg></span>',
                    action: function(e, dt, node, config) {
                        dt.ajax.reload();
                    }
                }],
                initComplete: function() {
                    // Remove btn-secondary class from DataTables buttons
                    $('.dt-buttons').find('.btn').removeClass('btn-secondary');
                },
                info: true,
                //autoWidth: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                bPaginate: true,
                ordering: true,
                searching: true,
                //responsive: true,
                scrollX: true,
                //pagingType: "full_numbers",
                "ajax": {
                    "url": "{!! $module_route . '/get-ingredients-details' !!}",
                    "data": function(d) {
                        d.status = $('#status').val();
                        d.created_at = $('#created_at').val();
                    }
                },
                columns: [{
                        data: null,
                        // name: 'id',
                        className: "ingredients-id text-center",
                        render: function(o) {
                            var data;
                            var id = o.id.toString();
                            var paddedId = id.padStart(3, '0');
                            data = '<a  href="javascript:void(0)">' +
                                paddedId + '</a>';
                            return data;

                        }
                    },
                    {
                        data: 'ing_name',
                        name: 'ing_name',
                    },
                    // {
                    //     data: 'cat_name',
                    //     name: 'cat_name',
                    // },
                    {
                        data: null,
                        render: function(s) {
                            var isChecked = s.status == 0 ? 'checked' : '';
                            return '<div class="form-check form-switch form-check-custom form-check-solid text-center">' +
                                '<input class="form-check-input h-20px w-30px mx-auto toggleStatus" type="checkbox" data-id="' +
                                s.id + '" ' + isChecked + ' />';
                        },
                    },
                    // {
                    //     data: null,
                    //     name: 'status',
                    //     className: 'categories-status',
                    //     render: function(s) {
                    //         if (s.status == 0) {
                    //             return '<div class="form-check form-switch form-check-custom form-check-solid text-center"><input class="form-check-input h-20px w-30px mx-auto publisToUnpublish" type="checkbox" checked value="' +
                    //                 s.id + '" />';
                    //         } else if (s.status == 1) {
                    //             return '<div class="form-check form-switch form-check-custom form-check-solid text-center"><input class="form-check-input h-20px w-30px mx-auto unpublishToPublish" type="checkbox"  value="' +
                    //                 s.id + '" />';
                    //         } else {
                    //             return '';
                    //         }
                    //     }
                    // },
                    {
                        data: 'formatted_created_at',
                        name: 'formatted_created_at',
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        responsivePriority: 1,
                        targets: 0,
                        className: "text-center",
                        render: function(o) {
                            var btnStr = "";
                            btnStr += '<div id="kt_docs_sweetalert_html">';
                            btnStr +=
                                '<a href="javascript:void(0);" class="btn btn-icon btn-active-color-primary w-30px h-30px  editRecord" data-bs-toggle="tooltip" data-bs-custom-class title="Edit" val="' +
                                o.id +
                                '"><span class="svg-icon svg-icon-muted svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/><path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/><path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/></svg></span></a>';
                            btnStr +=
                                '<a href="javascript:void(0);" class="btn btn-icon btn-active-color-primary w-30px h-30px me-3 deleteRecord" data-bs-toggle="tooltip" data-bs-custom-class title="Delete" val="' +
                                o.id +
                                '"><span class="svg-icon svg-icon-3" ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" /><path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" /><path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" /></svg></span></a>';
                            btnStr += '</div>'; // Close the container

                            return btnStr;
                        }
                    },

                ],
                // order: [[1, "DESC"]]
            });
            // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
            oTable.on('draw', function() {
                KTMenu.createInstances();
            });
            $('.filter-btn').on('click', function(e) {
                e.preventDefault();
                // console.log("btn value is " + $("#status").val());
                var formType = $(this).attr('type');
                if (formType == 'reset') {
                    $("#status").val('').trigger("change");
                    $("#created_at").val("");
                    $(this).closest('form')[0].reset();
                }
                oTable.draw();
            });

            $(document).on('click', '.toggleStatus', function() {
                var id = $(this).data('id');
                var status = $(this).prop('checked') ? '0' : '1';
                $.ajax({
                    type: "get",
                    url: "{{ route('ingredients_changeStatus') }}",
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            toastcall('success', response.message);
                            oTable.draw();
                        } else {
                            toastcall('error', response.message);
                        }
                    }
                });
            });

            $(document).on('click', '.deleteRecord', function(e) {
                e.preventDefault();

                // Get the ID from the clicked delete button
                var id = $(this).attr('val');

                Swal.fire({
                    html: "Are you sure you want to delete ?", // Display the ID in the SweetAlert message
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: 'No, cancel!',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('ingredients.destroy', '+id+') }}",
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
                                    oTable.draw();
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

            $('#modal_show_categories').click(function(e) {
                e.preventDefault();
                // Assuming you are using Bootstrap's modal, you can trigger it like this
                $('#kt_modal_form').modal('show');
            });

            $(document).on('click', '.editRecord', function(e) {
                e.preventDefault();
                var id = $(this).attr('val');

                $.ajax({
                    type: "get",
                    url: "{!! $module_route . '/ingredients' !!}/" + id + "/edit",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 'success') {
                            $('.modal-title').html("Edit Ingredient");
                            $('#kt_block_ui_form_button').html(
                                "Update Ingredient"); // Change button text

                            $('#name').val(response.data.name);

                            if (response.data.status == 0) {
                                $('#status[value="0"]').prop('checked', true);
                                $('#status2[value="1"]').prop('checked', false);
                            } else {
                                $('#status[value="0"]').prop('checked', false);
                                $('#status2[value="1"]').prop('checked', true);
                            }
                            $('#category_select').val(response.data.category_id).trigger(
                                'change');
                            $('#kt_modal_form').data('update_id', response.data.id);

                            $('#kt_modal_form').modal('show');
                        } else {
                            toastcall('error', response.message);
                        }
                    }
                });
            });


            var button = document.querySelector("#kt_block_ui_form_button");
            var target = document.querySelector("#kt_block_ui_form_target");
            var blockUI = new KTBlockUI(target);

            button.addEventListener("click", function(e) {
                e.preventDefault();
                blockUI.block();

                // Check if the form has a data-update_id attribute, indicating an edit operation
                var updateId = $('#kt_modal_form').data('update_id');
                var formAction;
                var formData = new FormData();

                if (updateId) {
                    formAction = "{!! $module_route . '/ingredients' !!}/" + updateId;
                    formData.append('_method', $('input[name="_method"]').val());
                } else {
                    formAction =
                        "{{ route('ingredients.store') }}";
                }
                formData.append('status', $('input[name="status"]:checked').val());
                formData.append('name', $('#name').val());
                formData.append('category_select', $('#category_select').val());

                console.log([...formData.entries()]);
                $.ajax({
                    type: "POST",
                    url: formAction,
                    data: formData,
                    // data: $('#add_form_details').serialize(),
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $("#kt_modal_form").modal('hide');
                            toastcall('success', response.message);
                            $('#add_form_details')[0].reset();
                            oTable.draw();
                        } else {
                            toastcall('error', response.message);
                        }
                    },
                    complete: function() {
                        blockUI.release();
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status == 422) {
                            var errors = xhr.responseJSON.errors;
                            $('.text-danger').remove();
                            $.each(errors, function(field, fieldErrors) {
                                var errorMessage = fieldErrors.join(", ");
                                $('#' + field).after('<li class="mt-2 text-danger">' +
                                    errorMessage + '</li>');
                            });
                        } else {
                            console.log("Error: " + status + " - " + error);
                        }
                    }
                });
            });

            // If you want to reset the form when closing the modal
            $('#kt_modal_form').on('hidden.bs.modal', function() {
                $('.modal-title').html("Add Ingredient");
                $('#kt_block_ui_form_button').html("Add Ingredient");
                $('#kt_modal_form').removeData('update_id'); // Clear update_id data attribute

                // Reset form fields
                $('#name').val("");
                $('#category_select').val("");
                // $('#status').prop('checked', false);
                $('.text-danger').remove();
            });

        });
    </script>
@endpush

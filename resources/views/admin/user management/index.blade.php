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
                    <!--begin::Secondary button-->
                    {{-- <div class="card-toolbar">
                        <a class="btn btn-sm fw-bold btn-secondary" href="{{ url('admin/export-category-count') }}"
                            title="Export">Export</a>
                    </div> --}}
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-sm fw-bold btn-primary" id="modal_show">Add User</a>
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
                            <h2>Category wise counting</h2>
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
                                    <th class="min-w-125px">ID</th>
                                    <th class="min-w-200px">User</th>
                                    <th class="min-w-150px">Email</th>
                                    <th class="min-w-150px">Created Date</th>
                                    {{-- <th class="min-w-10px text-center">Un-Published / Published</th> --}}
                                    <th class="min-w-100px">Actions</th>
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

    <!--begin::Add Modal-->
    <div class="modal fade show" tabindex="-1" id="kt_modal"aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content blockui" id="kt_block_ui_target" style="">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
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
                    <form id="add_details" class="form">
                        @csrf
                        @method('PUT')
                        @method('POST')

                        <!--begin::Input group-->
                        {{-- <div class="row mb-6">
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
                                        <label class="form-check-label" for="published">
                                            Published &ensp;&ensp;&ensp;
                                        </label>
                                    </div>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="1" id="status"
                                            name='status' />
                                        <label class="form-check-label" for="Published">
                                            Un-Published &ensp;&ensp;&ensp;
                                        </label>
                                    </div>
                                    <!--end::Option-->
                                </div>
                                <span class="error_msg_status"></span>
                                <!--end::Options-->
                            </div>
                            <!--end::Col-->
                        </div> --}}
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Image (500x500)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Image input placeholder-->
                                <style>
                                    .image-input-placeholder {
                                        background-image: url("{{ asset('assets/media/svg/files/blank-image.svg') }}");
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url("{{ asset('assets/media/svg/files/blank-image-dark.svg') }}");
                                    }
                                </style>
                                <!--end::Image input placeholder-->
                                <!--begin::Image input-->
                                <div class="image-input image image-input-empty image-input-outline image-input-placeholder mb-3 "
                                    data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-150px h-150px" id="image"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow change_image"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change icon">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3"
                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                    fill="currentColor" />
                                            </svg></span>
                                        <!--end::Icon-->
                                        <!--begin::Inputs-->
                                        {{-- {{ Form::file('logo', ['id' => 'logo', 'accept' => '.png, .jpg, .jpeg']) }} --}}
                                        <input type="file" class="imagesrc" name="user_image" id="user_image" />
                                        <input type="hidden" name="avatar_remove" />


                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel icon">
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                    rx="5" fill="currentColor" />
                                                <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                    transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                                <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                    transform="rotate(45 8.41422 7)" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow remove_image"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove icon">
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                    rx="5" fill="currentColor" />
                                                <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                    transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                                <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                    transform="rotate(45 8.41422 7)" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <span class="error_msg_image"></span>
                                <!--end::Image input-->
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
                                        <input type="text" name="user_name" id="user_name"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Full Name" />
                                    </div>
                                    <span class="error_msg_name"></span>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="user_email" id="user_email"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Email" />
                                    </div>
                                    <span class="error_msg_email"></span>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
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
                            <button type="submit" class="btn btn-primary" id="kt_block_ui_button">Add User</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Add Modal-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var oTable = $('.data-listing').DataTable({
                //"dom": '<"row" <"col-sm-4"l> <"col-sm-4"r> <"col-sm-4"f>> <"row"  <"col-sm-12"t>> <"row" <"col-sm-5"i> <"col-sm-7"p>>',
                // "dom": " <'row'<'col-sm-4'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-2'l><'col-sm-6'i><'col-sm-4'p>>",
                "dom": "<'row'<'col-sm-3'f><'col-sm-9 text-end'B>>" +
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
                autoWidth: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                bPaginate: true,
                ordering: true,
                searching: true,
                //responsive: true,
                //scrollX: true,
                //pagingType: "full_numbers",
                "ajax": {
                    "url": "{{ route('get_user') }}",
                    "data": function(d) {
                        // d.status = $('#status').val();
                        d.created_at = $('#created_at').val();
                    }
                },
                columns: [{
                        data: null,
                        // name: 'id',
                        className: "text-center",
                        render: function(o) {
                            var data;
                            var id = o.id.toString();
                            var paddedId = id.padStart(3, '0');
                            data =
                                // '<a target="_blank" href="javascript:void(0)">' +
                                paddedId
                            // + '</a>';
                            return data;

                        }
                    },
                    {
                        data: null,
                        name: 'name',
                        render: function(s) {
                            return '<div class="d-flex align-items-center"><div class="symbol symbol-50px overflow-hidden me-3">' +
                                (s.image !== null ?
                                    '<a href="' +
                                    "{{ Storage::url(config('filesystems.path.url.user')) }}" + s
                                    .image +
                                    '" target="_blank""><div class="symbol-label"><img src="' +
                                    "{{ Storage::url(config('filesystems.path.url.user')) }}" + s
                                    .image + '" alt="" class="w-100 h-100"></div></a>' :
                                    '<div class="symbol-label fs-2 fw-semibold text-primary">' + s
                                    .name.charAt(0) + '</div>'
                                ) +
                                '</div><div class="ms-5">' + s.name + '</div></div>';
                        },
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
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
                            btnStr += '<div id="kt_docs_sweetalert_html">'; // Add the id here
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

            $(document).on('click', '.deleteRecord', function(e) {
                e.preventDefault();
                var id = $(this).attr('val');

                Swal.fire({
                    html: "Are you sure you want to delete ?", // status the ID in the SweetAlert message
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
                            url: "{{ route('user.destroy', ':id') }}".replace(':id', id),
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

            $('#modal_show').click(function(e) {
                e.preventDefault();
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }

                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" :
                        "light";
                }
                $('html').attr("data-bs-theme", themeMode);

                // Set image based on theme mode
                if (themeMode === "dark") {
                    $('#image').css("background-image",
                        "url('{{ asset('assets/media/svg/files/blank-image-dark.svg') }}')");
                    $(".imagesrc").attr("src",
                        "{{ asset('assets/media/svg/files/blank-image-dark.svg') }}");
                } else {
                    $('#image').css("background-image",
                        "url('{{ asset('assets/media/svg/files/blank-image.svg') }}')");
                    $(".imagesrc").attr("src", "{{ asset('assets/media/svg/files/blank-image.svg') }}");
                }
                $('#kt_modal').modal('show');
            });

            $(document).on('click', '.editRecord', function(e) {
                e.preventDefault();
                var id = $(this).attr('val');

                $.ajax({
                    type: "get",
                    url: "{{ route('user.edit', ':id') }}".replace(':id', id),
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 'success') {
                            $('.modal-title').html("Edit User");
                            $('#kt_block_ui_button').html(
                                "Update User"); // Change button text

                            $('#user_name').val(response.data.name);
                            $('#user_email').val(response.data.email);

                            $('#image').css("background-image",
                                "url('{{ Storage::url(config('filesystems.path.url.user')) }}/" +
                                response.data.image + "')");
                            $('.image').removeClass('image-input-empty').addClass(
                                'image-input-outline');
                            $(".imagesrc").attr("src",
                                "{{ Storage::url(config('filesystems.path.url.user')) }}/" +
                                response.data.image);
                            $('#kt_modal').data('update_id', response.data.id);

                            $('#kt_modal').modal('show');
                        } else {
                            toastcall('error', response.message);
                        }
                    }
                });
            });

            var button = document.querySelector("#kt_block_ui_button");
            var target = document.querySelector("#kt_block_ui_target");
            var blockUI = new KTBlockUI(target);

            button.addEventListener("click", function(e) {
                e.preventDefault();
                blockUI.block();
                var updateId = $('#kt_modal').data('update_id');
                var formData = new FormData();

                if (updateId) {
                    var formAction = "{{ route('user.update', ':id') }}".replace(':id', updateId);
                    formData.append('_method', $('input[name="_method"]').val());
                    formData.append('id', updateId);
                } else {
                    var formAction = "{{ route('user.store') }}";
                }
                formData.append('user_image', $('#user_image')[0].files[0]);
                formData.append('user_name', $('input[name="user_name"]').val());
                formData.append('user_email', $('input[name="user_email"]').val());
                formData.append('status', $('input[name="status"]:checked').val());

                // Add other form fields here
                // console.log($('input[name="_method"]').val());
                // console.log([...formData.entries()]);
                $.ajax({
                    type: "POST",
                    url: formAction,
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $("#kt_modal").modal('hide');
                            $('.modal-title').html("Add User");
                            $('#kt_block_ui_button').html("Add User");
                            $('#kt_modal').removeData('update_id');
                            $('.error_msg_status').html('');
                            $('.error_msg_image').html('');
                            $('.error_msg_name').html('');
                            $('.error_msg_email').html('');

                            $('#add_details')[0].reset();
                            $('html').attr("data-bs-theme", themeMode);

                            // Set image based on theme mode
                            if (themeMode === "dark") {
                                $('#image').css("background-image",
                                    "url('{{ asset('assets/media/svg/files/blank-image-dark.svg') }}')"
                                );
                                $(".imagesrc").attr("src",
                                    "{{ asset('assets/media/svg/files/blank-image-dark.svg') }}"
                                );
                            } else {
                                $('#image').css("background-image",
                                    "url('{{ asset('assets/media/svg/files/blank-image.svg') }}')"
                                );
                                $(".imagesrc").attr("src",
                                    "{{ asset('assets/media/svg/files/blank-image.svg') }}"
                                );
                            }
                            $('.image').removeClass('image-input-outline').addClass(
                                'image-input-empty');

                            toastcall('success', response.message);
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
                            $.each(errors, function(field, fieldErrors) {
                                var errorMessage = fieldErrors.join(", ");
                                if (field === 'status') {
                                    $('.error_msg_status').html(
                                        '<span><li class="mt-2 text-danger">' +
                                        errorMessage + '</li></span>');
                                } else if (field === 'user_image') {
                                    $('.error_msg_image').html(
                                        '<span><li class="mt-2 text-danger">' +
                                        errorMessage + '</li></span>');
                                } else if (field === 'user_name') {
                                    $('.error_msg_name').html(
                                        '<span><li class="mt-2 text-danger">' +
                                        errorMessage + '</li></span>');
                                } else if (field === 'user_email') {
                                    $('.error_msg_email').html(
                                        '<span><li class="mt-2 text-danger">' +
                                        errorMessage + '</li></span>');
                                }
                            });
                        } else {
                            console.log("Error: " + status + " - " + error);
                        }
                    }
                });
            });

            // $('#kt_modal').on('hidden.bs.modal', function () {
            //     $('.modal-title').html("Add User");
            //     $('#kt_block_ui_button').html("Add User");
            //     $('#kt_modal').removeData('update_id'); // Clear update_id data attribute

            //     // Reset form fields
            //     $('#unit_name').val("");
            //     // $('#unit_status').prop('checked', false);
            //     $('.text-danger').remove();
            // });
        });
    </script>
@endpush

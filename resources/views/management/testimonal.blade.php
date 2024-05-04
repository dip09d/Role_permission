@extends('master')

@section('title', 'New Admin | Admin')

@section('content')

<div class="app-main__outer">
    <div class="body-page-loader d-none">
        <div class="loader">
            <div class="line-scale-pulse-out">
                <div class="bg-warning"></div>
                <div class="bg-warning"></div>
                <div class="bg-warning"></div>
                <div class="bg-warning"></div>
                <div class="bg-warning"></div>
            </div>
        </div>
    </div>




    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-notebook icon-gradient bg-mixed-hopes"></i>
                    </div>
                    <div>Testimonial <div class="page-title-subheading">Testimonial Management &gt; All Testimonial List</div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=""> Home</a></li>
                        <li class="breadcrumb-item active">Testimonial</li>
                    </ol>
                </div>
            </div>
        </div>
        <div id="successMessageContainer"></div>
        <style>
            .advance-search-panel {
                background-color: #fff;
                box-shadow: 0 1px 3px rgb(0 0 0 / 10%);
                padding: 1rem;
                margin-top: 1rem;
            }
        </style>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="card-header p-0">
                    <i class="header-icon lnr-layers icon-gradient bg-plum-plate"> </i> Testimonial <div class="btn-actions-pane-right">

                        <div class="btn-group mr-2" id="global_action_btn" style="display:none">
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" onclick="deleteSelected()" data-original-title="Delete selected"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(1)" data-original-title="Make active"><i class="fa fa-thumbs-up"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(0)" data-original-title="Make inactive"><i class="fa fa-thumbs-down"></i></button>
                        </div>


                        <button type="button" class="btn btn-site btn-sm btn-success" onclick="add()">
                            <i class="fa fa-plus"></i>
                            <span class="d-none d-sm-inline">Add testimonial</span>
                        </button>
                    </div>
                </div>

                <div class="table-responsive" id="main_table">
                    <table class="mb-0 table">
                        <thead>
                            <tr>
                                <th style="width:3%">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-target=".check_all" id="all_item" class="custom-control-input check_all_main">
                                        <label class="custom-control-label" for="all_item"></label>
                                    </div>
                                </th>
                                <th style="width:10%">ID</th>
                                <th style="width:10%">Logo</th>
                                <th style="width:40%">Name</th>
                                <th style="width:10%">Order</th>
                                <th style="width:10%">Status</th>
                                <th class="text-right" style="padding-right:20px;">Action</th>
                            </tr>
                            <thead>
                                @foreach($testimonialdata as $data)
                            <tbody id="testimonialMain">
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="item_1" class="custom-control-input check_all" name="ID[]" value="1">
                                            <label class="custom-control-label" for="item_1"></label>
                                        </div>

                                    </td>
                                    <td>{{$data->testimonial_id}}</td>
                                    <td style="vertical-align: middle;"><img src="{{$image_path}}/{{$data->logo}}" class="rounded-circle mr-2" alt="User Image" height="32" width="32"></td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->display_order}}</td>
                                    <td>
                                        <input data-id="{{$data->testimonial_id}}" class="testimonial d-none" type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="mini" {{ $data->testimonial_status ? 'checked' : '' }}>

                                    </td>
                                    <td class="text-right">
                                        <a href="javascript:void(0)" data-id="{{$data->testimonial_id}}" data-toggle="tooltip" title="" onclick="edit(this)" data-original-title="Edit"><i class="fa fa-edit text-success fa-md"></i></a>
                                        &nbsp;
                                        <a href="javascript:void(0)" id="{{$data->testimonial_id}}" class="delete-testimonial" data-toggle="tooltip" title="" onclick="remove(this)" data-original-title="Delete"><i class="fa fa-trash text-danger fa-md"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade show" id="testimonialModel" tabindex="-1" role="dialog" aria-labelledby="testimonialEditModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testimonialAddEditModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <!-- Example form -->
                    <form id="testimonialData">
                        @csrf
                        <!-- Hidden input for user ID -->
                        <input type="text" class='d-none' id="testimonial_id">

                        <div class="form-group">
                            <label for="Name">Name (en)</label>
                            <input type="text" class="form-control reset_field" id="Name" name="Name" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="company_name_en">Sub Name (en)</label>
                            <input type="text" class="form-control reset_field" id="company_name" name="company_name" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="description_en">Description (en)</label>
                            <textarea rows="4" class="form-control reset_field" id="description" name="description" autocomplete="off"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="logo_upload" onchange="upload_file_logo(this.files[0])">
                                    <label class="custom-file-label" for="logo_upload">Choose file</label>
                                </div>
                            </div>
                            <a id="remove_image" style="display:none; position: absolute;" onclick="delete_image()">
                                <i class="fa fa-trash text-danger fa-md" style="margin-left: 64px; margin-top: 0px;"></i>
                            </a>

                            <div id="image_preview"></div>

                            <input type="hidden" name="logo" id="image_filename">
                        </div>


                        <div class="form-group">
                            <label for="display_order" class="form-label">Display Order</label>
                            <input type="text" class="form-control reset_field" id="display_order" name="display_order" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="radio-inline">
                                <input type="radio" name="status" value="1" class="magic-radio" id="status" checked="">
                                <label for="status_1">Active</label>
                            </div>
                            <div class="radio-inline">
                                <input type="radio" name="status" value="0" class="magic-radio" id="status">
                                <label for="status_0">Inactive</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="testimonialButton" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    @endsection
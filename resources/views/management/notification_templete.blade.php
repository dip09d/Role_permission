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
                    <div>Notification Template <div class="page-title-subheading">Notification Template Management &gt; All Notification Template List</div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="https://scriptlisting.com/selfgood-live/hackground/"> Home</a></li>
                        <li class="breadcrumb-item active">Notification Template</li>
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
        <form action="/notification_search" method="get">

            <section class="content-header mb-2">
                <div class="row">
                    <div class="offset-sm-8 col-sm-4">
                        <div class="input-group">
                            <input class="form-control" id="mailsearch" placeholder="Search..." name="term" value="">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-site btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="card-header p-0">
                    <i class="header-icon lnr-layers icon-gradient bg-plum-plate"> </i> Notification Template <div class="btn-actions-pane-right">

                        <div class="btn-group mr-2" id="global_action_btn" style="display:none">
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" onclick="deleteSelected()" data-original-title="Delete selected"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(1)" data-original-title="Make active"><i class="fa fa-thumbs-up"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(0)" data-original-title="Make inactive"><i class="fa fa-thumbs-down"></i></button>
                        </div>

                        <a href="/export_notification"><button type="button" class="btn btn-success btn-sm mr-2">
                                <i class="fa fa-download"></i>
                                Export CSV
                            </button></a>
                        <button type="button" class="btn btn-success btn-sm" id="notificationaddButton">
                            <i class="fa fa-plus"></i>
                            <span class="d-none d-sm-inline">Add Template</span>
                        </button>
                    </div>
                </div>

                <div class="table-responsive" id="main_table">
                    <table class="mb-0 table">
                        <thead>
                            <tr>
                                <th style="width:30px">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-target=".check_all" id="all_item" class="custom-control-input check_all_main">
                                        <label class="custom-control-label" for="all_item"></label>
                                    </div>
                                </th>
                                <th style="width:5%">ID</th>
                                <th style="width:35%">Name</th>
                                <th style="width:30%">Key</th>
                                <th style="width:10%">Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        @foreach ($notifications as $notification)
                        <tbody id="notification">
                            <tr>
                                <td>
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" id="item_1" class="custom-control-input check_all" name="ID[]" value="1">
                                        <label class="custom-control-label" for="item_1"></label>
                                    </div>
                                </td>
                                <td>{{$notification->notification_template_id}}</td>
                                <td>{{$notification->template_for}}</td>
                                <td>{{$notification->template_key}}</td>
                                <td>
                                <td>
                                    <input data-id="{{$notification->notification_template_id}}" class="notify_templete d-none" type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="mini" {{ $notification->status ? 'checked' : '' }}>
                                </td>
                                <td class="text-right">
                                    <a href="javascript:void(0)" data-id="{{$notification->notification_template_id}}" data-toggle="tooltip" title="" class="notificationEditButton" data-original-title="Edit"><i class="fa fa-edit text-success fa-md"></i></a>
                                    &nbsp;
                                    <a href="javascript:void(0)" id="{{$notification->notification_template_id}}" class="delete-noti" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-trash text-danger fa-md"></i></a>

                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade show" id="notificationModel" tabindex="-1" role="dialog" aria-labelledby="notificationEditModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationAddEditModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <!-- Example form -->
                    <form id="notificationData">
                        @csrf
                        <!-- Hidden input for user ID -->
                        <input type="text" class='d-none' id="template_id">


                        <div class="form-group">
                            <label for="notify_template_name">Template For</label>
                            <input type="text" name="notify_template_name" id="notify_template_name" class="form-control" required>
                            <div class="invalid-feedback" id="notify_template_name"></div>
                        </div>

                        <div class="form-group">
                            <label for="Template_Key">Template Key</label>
                            <input type="text" name="Template_Key" id="Template_Key" class="form-control" required>
                            <div class="invalid-feedback" id="Template_Type_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="Content">Content (en)</label>
                            <textarea class="form-control" name="Content" id="Content" rows="5" required></textarea>
                            <div class="invalid-feedback" id="Content_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="Template_Keys">Template Keys</label>
                            <input type="text" name="Template_Keys" id="Template_Keys" class="form-control" required>
                            <div class="invalid-feedback" id="Template_Keys_error"></div>
                        </div>


                        <div class="form-group">
                            <label for="Display_Order">Display Order</label>
                            <input type="text" name="display_order" id="display_order" class="form-control" required>
                            <div class="invalid-feedback" id="Display_Order_error"></div>
                        </div>


                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="radio-inline">
                                <input type="radio" name="status" value=1 class="magic-radio" id="status_1" checked required>
                                <label for="status_1">Active</label>
                                <input type="radio" name="status" value=0 class="magic-radio" id="status_2">
                                <label for="status_2">Inactive</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="notificationButton" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>


    @endsection